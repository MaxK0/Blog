<?php

namespace App\Services;

use App\Kernel\Database\IDatabase;

class PostService
{

    public function __construct(
        private IDatabase $db
    ) {
    }

    public function insert(string $title, string $body, string $thumbnail, string $dateTime, int $isFeatured, int $authorId, array $categories)
    {
        $post = $this->db->insert('posts', [
            'title' => $title,
            'body' => $body,
            'thumbnail' => $thumbnail,
            'date_time' => $dateTime,
            'is_featured' => (int) $isFeatured,
            'author_id' => $authorId,
        ]);

        $this->db->insert('posts_has_categories', [
            'post_id' => $post,
            'category_id' => (int) $categories[0] // TODO: сделать добавление множества категорий
        ]);
    }
}
