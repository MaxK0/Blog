<?php

namespace App\Services;

use App\Kernel\Database\IDatabase;
use App\Models\Post;
use App\Services\CategoryService;
use App\Kernel\Auth\User;

class PostService
{

    public function __construct(
        private IDatabase $db
    ) {
    }

    /**
     * @return array<Post>
     */
    public function all(): array
    {
        $posts = $this->db->get('posts');

        $categoryService = new CategoryService($this->db);

        $categories = $categoryService->all();
        
        return array_map(function ($post) use ($categories) {

            $categoriesDb = $this->db->get('posts_has_categories', ['post_id' => $post['post_id']]);

            $categoriesDbId = array_map(fn ($category) => $category['category_id'], $categoriesDb);

            $author = $this->db->get('users', ['user_id' => $post['author_id']], limit: 1)[0]; // TODO: Сделать как User
            

            return new Post(
                id: $post['post_id'],
                title: $post['title'],
                body: $post['body'],
                thumbnail: $post['thumbnail'],
                dateTime: $post['date_time'],
                isFeatured: $post['is_featured'],
                author: ['id' => $author['user_id'], 'name' => $author['name'], 'surname' => $author['surname'], 'avatar' => $author['avatar']],
                categories: array_map(function ($category) use ($categoriesDbId) {
                    if (in_array($category->id(), $categoriesDbId)) return $category;
                }, $categories)
            );
        }, $posts);
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
