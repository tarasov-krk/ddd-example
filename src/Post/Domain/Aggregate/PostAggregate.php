<?php

declare(strict_types=1);

namespace App\Post\Domain\Aggregate;

use App\Post\Domain\Entity\Post;

final class PostAggregate
{
    public function __construct(
        private Post $post,
        /** @var \App\Post\Domain\Entity\PostComment[] */
        private ?array $comments = [],
    ) {
    }

    public function getPost(): Post
    {
        return $this->post;
    }

    public function setPost(Post $post): void
    {
        $this->post = $post;
    }

    public function getComments(): ?array
    {
        return $this->comments;
    }

    public function setComments(?array $comments): void
    {
        $this->comments = $comments;
    }
}
