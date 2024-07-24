<?php

declare(strict_types=1);

namespace App\Post\Domain\Repository;

interface PostRepositoryReadInterface
{
    public function getItemsByFilter(array $filter): array;
}
