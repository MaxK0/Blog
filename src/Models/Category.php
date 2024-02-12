<?php

namespace App\Models;

class Category
{

    public function __construct(
        private int $id,
        private string $title,
        private string $description
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

    public function description(): string
    {
        return $this->description;
    }
}
