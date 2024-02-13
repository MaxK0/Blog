<?php

namespace App\Services;

use App\Kernel\Database\IDatabase;
use App\Models\Category;

class CategoryService
{

    public function __construct(
        private IDatabase $db
    ) {
    }

    /**
     * @return array<Category>
     */
    public function all(): array
    {
        $categories = $this->db->get('categories');

        return array_map(function ($category) {
            return new Category(
                id: $category['category_id'],
                title: $category['title'],
                description: $category['description']
            );
        }, $categories);
    }

    public function insert(string $title, ?string $desc)
    {
        $this->db->insert('categories', [
            'title' => $title,
            'description' => $desc
        ]);
    }
}
