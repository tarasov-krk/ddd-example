<?php

declare(strict_types=1);

namespace App\Post\Application\Command\AddPost\Dto;

final class AddPostRequestDto
{
    public function __construct(
        public string $title,
        public string $content,
    ) {
    }
}
