<?php

declare(strict_types=1);

namespace App\Post\Application\Query\GetPosts;

final readonly class GetPostsQueryResult
{
    public function __construct(
        public array $data,
    ) {
    }
}
