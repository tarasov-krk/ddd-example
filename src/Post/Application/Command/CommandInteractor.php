<?php

declare(strict_types=1);

namespace App\Post\Application\Command;


use App\Post\Application\Command\AddPost\AddPostCommand;
use App\Post\Application\Command\AddPost\AddPostCommandResult;
use App\Post\Application\Command\AddPost\Dto\AddPostRequestDto;
use App\Shared\Application\Command\CommandBusInterface;

final readonly class CommandInteractor implements PostCommandInteractor
{
    public function __construct(
        private CommandBusInterface $commandBus,
    ) {
    }

    public function addPost(AddPostRequestDto $requestDto): AddPostCommandResult
    {
        return $this->commandBus->execute(new AddPostCommand($requestDto));
    }
}
