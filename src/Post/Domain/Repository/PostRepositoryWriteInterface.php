<?php

declare(strict_types=1);

namespace App\Post\Domain\Repository;

use App\Post\Domain\Entity\Post;

interface PostRepositoryWriteInterface
{
    public function addPost(Post $post): Post;
}
