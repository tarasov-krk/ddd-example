<?php

declare(strict_types=1);

namespace App\Post\Presentation\Api\V1;

use App\Post\Application\Command\AddPost\Dto\AddPostRequestDto;
use App\Post\Application\Command\PostCommandInteractor;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\Routing\Attribute\Route;

final class PostCommandController extends AbstractController
{
    public function __construct(
        private readonly PostCommandInteractor $commandInteractor,
    ) {
    }

    #[Route('/posts', methods: ['POST'])]
    public function addPost(#[MapRequestPayload] AddPostRequestDto $requestDto): JsonResponse
    {
        return $this->json(
            $this->commandInteractor->addPost($requestDto)
        );
    }
}
