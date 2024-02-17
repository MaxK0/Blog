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

            $categoriesDbId = array_column($categoriesDb, 'category_id');

            $author = $userService->find($post['author_id']);

            $postCategories = array_filter($categories, function ($category) use ($categoriesDbId) {
                if (in_array($category->id(), $categoriesDbId)) return $category;
            });

            return new Post(
                id: $post['post_id'],
                title: $post['title'],
                body: $post['body'],
                thumbnail: $post['thumbnail'],
                dateTime: $post['date_time'],
                isFeatured: $post['is_featured'],
                author: $author,
                categories: $postCategories
            );
        }, $posts);
    }

    public function find(int $id): Post
    {
        $post = $this->db->first('posts', ['post_id' => $id]);

        $userService = new UserService($this->db);
        $author = $userService->find($post['author_id']);

        $categoryService = new CategoryService($this->db);
        $categories = $categoryService->all();

        $categoriesDb = $this->db->get('posts_has_categories', ['post_id' => $post['post_id']]);

        $categoriesDbId = array_column($categoriesDb, 'category_id');

        $postCategories = array_filter($categories, function ($category) use ($categoriesDbId) {
            if (in_array($category->id(), $categoriesDbId)) return $category;
        });

        return new Post(
            id: $post['post_id'],
            title: $post['title'],
            body: $post['body'],
            thumbnail: $post['thumbnail'],
            dateTime: $post['date_time'],
            isFeatured: $post['is_featured'],
            author: $author,
            categories: $postCategories
        );
    }

    public function findByAuthors(string $nick): array
    {
        $posts = $this->all();

        return array_map(function ($post) use ($nick) {
            if ($post->author()->nick() === $nick) return $post;
        }, $posts);
    }

    public function findByCategory(int $id): array
    {
        $posts = $this->db->get('posts');

        $categoryService = new CategoryService($this->db);
        $userService = new UserService($this->db);

        $categories = $categoryService->all();

        return array_map(function ($post) use ($categories, $userService, $id) {

            $categoriesDb = $this->db->get('posts_has_categories', ['post_id' => $post['post_id']]);

            $author = $userService->find($post['author_id']);

            $categoriesDbId = array_column($categoriesDb, 'category_id');

            $postCategories = array_filter($categories, function ($category) use ($categoriesDbId) {
                if (in_array($category->id(), $categoriesDbId)) return $category;
            });

            if (in_array($id, $categoriesDbId)) {
                return new Post(
                    id: $post['post_id'],
                    title: $post['title'],
                    body: $post['body'],
                    thumbnail: $post['thumbnail'],
                    dateTime: $post['date_time'],
                    isFeatured: $post['is_featured'],
                    author: $author,
                    categories: $postCategories
                );
            }
        }, $posts);
    }

    public function search(string $text)
    {
        $posts = $this->db->get('posts', like: ['body' => "%$text%", 'title' => "%$text%"]);

        $categoryService = new CategoryService($this->db);
        $userService = new UserService($this->db);

        $categories = $categoryService->all();

        return array_map(function ($post) use ($categories, $userService) {

            $categoriesDb = $this->db->get('posts_has_categories', ['post_id' => $post['post_id']]);

            $categoriesDbId = array_column($categoriesDb, 'category_id');

            $author = $userService->find($post['author_id']);

            $postCategories = array_filter($categories, function ($category) use ($categoriesDbId) {
                if (in_array($category->id(), $categoriesDbId)) return $category;
            });

            return new Post(
                id: $post['post_id'],
                title: $post['title'],
                body: $post['body'],
                thumbnail: $post['thumbnail'],
                dateTime: $post['date_time'],
                isFeatured: $post['is_featured'],
                author: $author,
                categories: $postCategories
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

    public function update(int $id, string $title, string $body, ?string $thumbnail, string $dateTime, int $isFeatured, array $categories)
    {
        $values = [
            'title' => $title,
            'body' => $body,
            'date_time' => $dateTime,
            'is_featured' => $isFeatured
        ];

        if (!empty($thumbnail)) $values['thumbnail'] = $thumbnail;

        $valuesCategories = ['category_id' => (int) $categories[0]];

        $conditions = ['post_id' => $id];

        $this->db->update('posts', $values, $conditions);
        $this->db->update('posts_has_categories', $valuesCategories, $conditions);
    }

    public function delete(int $id): void
    {
        $this->db->delete('posts_has_categories', ['post_id' => $id]);
        $this->db->delete('posts', ['post_id' => $id]);
    }
}
