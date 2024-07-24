<?php

declare(strict_types=1);

namespace App\Post\Infrastructure\Adapter\CommentService;

use App\Comment\Application\Query\CommentQueryInteractor;
use App\Post\Domain\Provider\CommentProvider;

final readonly class CommentAdapter implements CommentProvider
{
    public function __construct(
        private CommentQueryInteractor $commentQueryInteractor
    ) {
    }

    public function getCommentForPost(int $postId): array
    {
        return $this->commentQueryInteractor->getComments(
            entityType: 'post',
            entityId: $postId
        )->comments;
    }
}
