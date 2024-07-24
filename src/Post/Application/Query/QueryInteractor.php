<?php

declare(strict_types=1);

namespace App\Post\Application\Query;


use App\Post\Application\Query\GetPosts\GetPostsQuery;
use App\Post\Application\Query\GetPosts\GetPostsQueryResult;
use App\Shared\Application\Query\QueryBusInterface;

final readonly class QueryInteractor implements PostQueryInteractor
{
    public function __construct(
        private QueryBusInterface $queryBus,
    ) {
    }

    public function getPost(array $filters = []): GetPostsQueryResult
    {
        return $this->queryBus->execute(new GetPostsQuery($filters));
    }
}
