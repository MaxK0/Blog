<?php

namespace App\Models;

class Post
{

    public function __construct(
        private int $id,
        private string $title,
        private string $body,
        private string $thumbnail,
        private string $dateTime,
        private bool $isFeatured,
        private int $authorId
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

    public function thumbnail(): string
    {
        return $this->thumbnail;
    }

    public function dateTime(): string
    {
        return $this->dateTime;
    }

    public function isFeatured(): bool
    {
        return $this->isFeatured;
    }

    public function authorId(): int
    {
        return $this->authorId;
    }
}
