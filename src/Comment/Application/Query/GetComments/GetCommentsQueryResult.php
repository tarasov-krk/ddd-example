<?php

declare(strict_types=1);

namespace App\Comment\Application\Query\GetComments;

final readonly class GetCommentsQueryResult
{
    public function __construct(
        public array $comments,
    ) {
    }
}
