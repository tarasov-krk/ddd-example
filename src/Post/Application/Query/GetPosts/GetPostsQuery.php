<?php

declare(strict_types=1);

namespace App\Post\Application\Query\GetPosts;

use App\Shared\Application\Query\Query;

final readonly class GetPostsQuery extends Query
{
    public function __construct(
        public array $filter = [],
    ) {
    }
}
