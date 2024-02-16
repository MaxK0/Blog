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

    public function find(int $id): Category
    {
        $category = $this->db->first('categories', ['category_id' => $id]);

        return new Category(
            id: $category['category_id'],
            title: $category['title'],
            description: $category['description']
        );
    }

    public function insert(string $title, ?string $desc): void
    {
        $this->db->insert('categories', [
            'title' => $title,
            'description' => $desc
        ]);
    }

    public function update(int $id, string $title, ?string $desc): void
    {
        $values = [
            'title' => $title,
            'description' => $desc
        ];

        $conditions = [
            'category_id' => $id
        ];

        $this->db->update('categories', $values, $conditions);
    }

    public function delete(int $id): void
    {
        $this->db->delete('posts_has_categories', ['category_id' => $id]);
        $this->db->delete('categories', ['category_id' => $id]);
    }
}
