<?php

declare(strict_types=1);

namespace App\Comment\Infrastructure\Persistanse\Repository;

use App\Comment\Domain\Entity\Comment;
use App\Comment\Domain\Repository\CommentRepositoryReadInterface;

final class CommentRepository implements CommentRepositoryReadInterface
{
    public function getItemsByEntity(string $entityType, int $id): array
    {
        $data = [
            new Comment(null, 'Comment 103', 'Петров A.A.'),
            new Comment(null, 'Comment 501', 'Васильев В.П.'),
            new Comment(null, 'Comment 10009', 'Сергеева Т.Р.'),
        ];

        shuffle($data);

        return $data;
    }
}
