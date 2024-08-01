<?php

declare(strict_types=1);

namespace App\Comment\Application\Query\GetComments;

use App\Comment\Domain\Repository\CommentRepositoryReadInterface;
use App\Shared\Application\Query\QueryHandlerInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
final readonly class GetCommentsQueryHandler implements QueryHandlerInterface
{
    public function __construct(
        private CommentRepositoryReadInterface $commentRepositoryRead
    ) {
    }

    public function __invoke(GetCommentsQuery $query): GetCommentsQueryResult
    {
        return new GetCommentsQueryResult(
            $this->commentRepositoryRead->getItemsByEntity(
                $query->entityType,
                $query->entityId,
            )
        );
    }
}
