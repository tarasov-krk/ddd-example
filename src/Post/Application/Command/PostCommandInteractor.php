<?php

declare(strict_types=1);

namespace App\Post\Application\Command;


use App\Post\Application\Command\AddPost\AddPostCommandResult;
use App\Post\Application\Command\AddPost\Dto\AddPostRequestDto;

interface PostCommandInteractor
{
    public function addPost(AddPostRequestDto $requestDto): AddPostCommandResult;
}
