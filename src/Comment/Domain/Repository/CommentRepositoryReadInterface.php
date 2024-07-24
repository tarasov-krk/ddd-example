<?php

declare(strict_types=1);

namespace App\Comment\Domain\Repository;

interface CommentRepositoryReadInterface
{
    public function getItemsByEntity(string $entityType, int $id): array;
}
