<?php

declare(strict_types=1);

namespace App\Post\Domain\Entity;

final class PostComment
{
    public function __construct(
        private ?int $id = null,
        private ?string $text = null,
        private ?string $author = null,
    ) {
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(?string $text): void
    {
        $this->text = $text;
    }

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function setAuthor(?string $author): void
    {
        $this->author = $author;
    }
}
