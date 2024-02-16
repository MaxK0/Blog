<?php

namespace App\Models;

use App\Kernel\Auth\User;

class Post
{

    public function __construct(
        private int $id,
        private string $title,
        private string $body,
        private ?string $thumbnail,
        private string $dateTime,
        private int $isFeatured,
        private User $author,
        private array $categories
    ) {
    }

    public function id(): int
    {
        return $this->id;
    }

    public function title(): string
    {
        return $this->title;
    }

    public function body(): string
    {
        return $this->body;
    }

    public function thumbnail(): ?string
    {
        return $this->thumbnail;
    }

    public function dateTime(): string
    {
        return $this->dateTime;
    }

    public function isFeatured(): int
    {
        return $this->isFeatured;
    }

    public function author(): User
    {
        return $this->author;
    }

    public function categories(): array
    {
        return $this->categories;
    }
}
