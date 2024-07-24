<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\Transformer;

use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\Attribute\AsEventListener;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;
use Symfony\Component\Validator\Exception\ValidationFailedException;

#[AsEventListener(event: 'kernel.exception', method: 'onKernelException', priority: 100)]
final readonly class ExceptionListener
{
    public function __construct(
        private LoggerInterface $logger
    ) {
    }

    public function onKernelException(ExceptionEvent $event): void
    {
        $exception = $event->getThrowable();
        $response = new JsonResponse();
        $response->setContent($this->getExceptionContent($exception));

        $statusCode = $exception instanceof HttpExceptionInterface
            ? $exception->getStatusCode()
            : $exception->getCode();

        $response->setStatusCode(!$this->isInvalidCode($statusCode) ? $statusCode : Response::HTTP_INTERNAL_SERVER_ERROR);
        $event->setResponse($response);

        if (!$exception->getPrevious() instanceof ValidationFailedException) {
            $this->logger->error($this->loggerMessage($exception));
        }
    }

    public function isInvalidCode(int $code): bool
    {
        return $code < 100 || $code >= 600;
    }

    private function getExceptionContent(\Throwable $exception): string
    {
        $errorMessage = [];

        $previousExc = $exception->getPrevious();
        if ($previousExc instanceof ValidationFailedException) {
            $violations = $previousExc->getViolations();
            for ($i = 0; $i < $violations->count(); ++$i) {
                $violation = $violations->get($i);

                $errorMessage[] = [
                    'field'   => $violation->getPropertyPath(),
                    'message' => $violation->getMessage(),
                ];
            }

            return $this->exceptionToJson($previousExc, $errorMessage);
        }

        $errorMessage = array_map(
            fn($message) => ['message' => $message],
            explode(PHP_EOL, $exception->getMessage())
        );

        return $this->exceptionToJson($exception, $errorMessage);
    }

    private function exceptionToJson(\Throwable $exception, array $errorMessage): string
    {
        return json_encode(
            [
                'errors' => $errorMessage,
            ]
        );
    }

    private function loggerMessage(\Throwable $exception): string
    {
        return sprintf('%s, in %s:%s' . PHP_EOL . 'Trace:%s',
            $exception->getMessage(),
            $exception->getFile(),
            $exception->getLine(),
            $exception->getTraceAsString(),
        );
    }
}
