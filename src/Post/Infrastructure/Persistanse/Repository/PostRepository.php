<?php

declare(strict_types=1);

namespace App\Post\Infrastructure\Persistanse\Repository;

use App\Post\Domain\Entity\Post;
use App\Post\Domain\Repository\PostRepositoryReadInterface;
use App\Post\Domain\Repository\PostRepositoryWriteInterface;

final class PostRepository implements PostRepositoryReadInterface, PostRepositoryWriteInterface
{
    public function getItemsByFilter(array $filter): array
    {
        return [
            new Post(null, 'Post 1', 'Post 1 content'),
            new Post(null, 'Post 2', 'Post 2 content'),
        ];
    }

    public function addPost(Post $post): Post
    {
        return new Post(null, $post->getTitle(), $post->getContent());
    }
}
