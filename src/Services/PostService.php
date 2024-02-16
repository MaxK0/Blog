<?php

namespace App\Services;

use App\Kernel\Database\IDatabase;
use App\Models\Post;
use App\Services\CategoryService;
use App\Services\UserService;
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
        $userService = new UserService($this->db);

        $categories = $categoryService->all();

        return array_map(function ($post) use ($categories, $userService) {

            $categoriesDb = $this->db->get('posts_has_categories', ['post_id' => $post['post_id']]);

            $categoriesDbId = array_map(fn ($category) => $category['category_id'], $categoriesDb);

            $author = $userService->find($post['author_id']);

            return new Post(
                id: $post['post_id'],
                title: $post['title'],
                body: $post['body'],
                thumbnail: $post['thumbnail'],
                dateTime: $post['date_time'],
                isFeatured: $post['is_featured'],
                author: $author,
                categories: array_map(function ($category) use ($categoriesDbId) {
                    if (in_array($category->id(), $categoriesDbId)) return $category;
                }, $categories)
            );
        }, $posts);
    }

    public function find(int $id): Post
    {
        $post = $this->db->first('posts', ['post_id' => $id]);

        $userService = new UserService($this->db);
        $author = $userService->find($post['post_id']);

        $categoryService = new CategoryService($this->db);
        $categories = $categoryService->all();

        $categoriesDb = $this->db->get('posts_has_categories', ['post_id' => $post['post_id']]);

        $categoriesDbId = array_map(fn ($category) => $category['category_id'], $categoriesDb);

        return new Post(
            id: $post['post_id'],
            title: $post['title'],
            body: $post['body'],
            thumbnail: $post['thumbnail'],
            dateTime: $post['date_time'],
            isFeatured: $post['is_featured'],
            author: $author,
            categories: array_map(function ($category) use ($categoriesDbId) {
                if (in_array($category->id(), $categoriesDbId)) return $category;
            }, $categories)
        );
    }

    public function findByAuthors(string $nick): array
    {
        $posts = $this->all();

        return array_map(function ($post) use ($nick) {
            if ($post->author()->nick() === $nick) return $post;
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
