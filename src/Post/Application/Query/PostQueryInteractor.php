<?php

declare(strict_types=1);

namespace App\Post\Application\Query;

use App\Post\Application\Query\GetPosts\GetPostsQueryResult;

interface PostQueryInteractor
{
    public function getPost(array $filters = []): GetPostsQueryResult;
}
