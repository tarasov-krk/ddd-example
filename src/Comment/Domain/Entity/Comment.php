<?php

declare(strict_types=1);

namespace App\Comment\Domain\Entity;

final class Comment
{
    public function __construct(
        private ?int $id = null,
        private ?string $text = null,
        private ?string $author = null,
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
