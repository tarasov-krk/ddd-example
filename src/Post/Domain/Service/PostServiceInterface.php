<?php

declare(strict_types=1);

namespace App\Post\Domain\Service;

interface PostServiceInterface
{
    public function getPosts(array $filter = []): array;
}
