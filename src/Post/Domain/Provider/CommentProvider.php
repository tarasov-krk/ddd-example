<?php

declare(strict_types=1);

namespace App\Post\Domain\Provider;

interface CommentProvider
{
    public function getCommentForPost(int $postId): array;
}
