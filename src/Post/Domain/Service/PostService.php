<?php

declare(strict_types=1);

namespace App\Post\Domain\Service;

use App\Post\Domain\Aggregate\PostAggregate;
use App\Post\Domain\Entity\Post;
use App\Post\Domain\Provider\CommentProvider;
use App\Post\Domain\Repository\PostRepositoryReadInterface;

final readonly class PostService implements PostServiceInterface
{
    public function __construct(
        private PostRepositoryReadInterface $postRepositoryRead,
        private CommentProvider $commentProvider,
    ) {
    }

    public function getPosts(array $filter = []): array
    {
        $posts = $this->postRepositoryRead->getItemsByFilter($filter);

        return array_map(function (Post $post)
        {
            $postAggregate = new PostAggregate($post);
            $postAggregate->setComments(
                $this->commentProvider->getCommentForPost($post->getId())
            );

            return $postAggregate;
        }, $posts);
    }
}
