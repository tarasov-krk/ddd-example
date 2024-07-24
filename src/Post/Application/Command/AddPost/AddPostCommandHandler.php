<?php

declare(strict_types=1);

namespace App\Post\Application\Command\AddPost;

use App\Post\Domain\Entity\Post;
use App\Post\Domain\Repository\PostRepositoryWriteInterface;
use App\Shared\Application\Command\CommandInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
final readonly class AddPostCommandHandler implements CommandInterface
{
    public function __construct(
        private PostRepositoryWriteInterface $postRepository,
    ) {
    }

    public function __invoke(AddPostCommand $command): AddPostCommandResult
    {
        $post = $this->postRepository->addPost(new Post(
            id: null,
            title: $command->requestDto->title,
            content: $command->requestDto->content
        ));

        return new AddPostCommandResult(
            $post->getId(),
            $post->getTitle(),
            $post->getContent()
        );
    }
}
