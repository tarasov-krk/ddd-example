<?php

declare(strict_types=1);

namespace App\Post\Application\Command\AddPost;

use App\Shared\Application\Command\Command;

final readonly class AddPostCommandResult extends Command
{
    public function __construct(
        public int $id,
        public string $title,
        public string $content,
    ) {
    }
}
