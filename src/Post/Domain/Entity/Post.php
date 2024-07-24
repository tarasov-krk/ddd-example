<?php

declare(strict_types=1);

namespace App\Post\Domain\Entity;

final class Post
{
    public function __construct(
        private ?int $id = null,
        private ?string $title = null,
        private ?string $content = null,
    ) {
        $this->id = random_int(1, 10000);
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): void
    {
        $this->title = $title;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(?string $content): void
    {
        $this->content = $content;
    }
}
