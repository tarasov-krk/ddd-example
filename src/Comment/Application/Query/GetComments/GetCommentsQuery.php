<?php

declare(strict_types=1);

namespace App\Comment\Application\Query\GetComments;

use App\Shared\Application\Query\QueryInterface;

final readonly class GetCommentsQuery implements QueryInterface
{
    public function __construct(
        public string $entityType,
        public int $entityId,
    ) {
    }
}
