<?php

declare(strict_types=1);

namespace App\Comment\Application\Query;


use App\Comment\Application\Query\GetComments\GetCommentsQuery;
use App\Comment\Application\Query\GetComments\GetCommentsQueryResult;
use App\Shared\Application\Query\QueryBusInterface;

final readonly class QueryInteractor implements CommentQueryInteractor
{
    public function __construct(
        private QueryBusInterface $queryBus,
    ) {
    }

    public function getComments(string $entityType, int $entityId): GetCommentsQueryResult
    {
        return $this->queryBus->execute(new GetCommentsQuery($entityType, $entityId));
    }
}
