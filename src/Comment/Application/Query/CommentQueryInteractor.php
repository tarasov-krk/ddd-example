<?php

declare(strict_types=1);

namespace App\Comment\Application\Query;

use App\Comment\Application\Query\GetComments\GetCommentsQueryResult;

interface CommentQueryInteractor
{
    public function getComments(string $entityType, int $entityId): GetCommentsQueryResult;
}
