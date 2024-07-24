<?php

declare(strict_types=1);

namespace App\Post\Presentation\Api\V1;

use App\Post\Application\Query\PostQueryInteractor;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

final class PostQueryController extends AbstractController
{
    public function __construct(
        private readonly PostQueryInteractor $queryInteractor,
    ) {
    }

    #[Route('/posts', methods: ['GET'])]
    public function getPosts(): JsonResponse
    {
        return $this->json(
            $this->queryInteractor->getPost()
        );
    }
}
