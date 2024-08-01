<?php

declare(strict_types=1);

namespace App\Comment\Application\Query\GetComments;

use App\Shared\Application\Query\Query;

final readonly class GetCommentsQuery extends Query
{
    public function __construct(
        public string $entityType,
        public int $entityId,
    ) {
    }
}
