<?php

declare(strict_types=1);

namespace App\Post\Application\Query\GetPosts;

use App\Post\Domain\Service\PostServiceInterface;
use App\Shared\Application\Command\CommandInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
final readonly class GetPostsQueryHandler implements CommandInterface
{
    public function __construct(
        private PostServiceInterface $postService,
    ) {
    }

    public function __invoke(GetPostsQuery $query): GetPostsQueryResult
    {
        return new GetPostsQueryResult(
            $this->postService->getPosts($query->filter)
        );
    }
}
