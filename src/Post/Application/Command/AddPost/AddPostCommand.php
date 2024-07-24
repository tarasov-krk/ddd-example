<?php

declare(strict_types=1);

namespace App\Post\Application\Command\AddPost;

use App\Post\Application\Command\AddPost\Dto\AddPostRequestDto;
use App\Shared\Application\Command\Command;

final readonly class AddPostCommand extends Command
{
    public function __construct(
        public AddPostRequestDto $requestDto
    ) {
    }
}
