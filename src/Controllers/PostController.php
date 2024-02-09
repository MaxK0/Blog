<?php

namespace App\Controllers;

use App\Kernel\Controller\Controller;
use DateTime;

class PostController extends Controller
{

    public function index(): void
    {
        $this->view('post');
    }

    public function add(): void
    {
        $this->view('add-post');
    }

    public function edit(): void
    {
        $this->view('edit-post');
    }

    public function store(): void
    {
        $validate = $this->request()->validate([
            'title' => ['required', 'min:2', 'max:255'],
            'category' => ['required'],
            'text' => ['required']
        ]);

        if (!$validate) {
            foreach ($this->request()->errors() as $field => $error) {
                $this->session()->set($field, $error);
            }

            $this->redirect('/post/add');
        }

        $post = $this->db()->insert('posts', [
            'title' => $this->request()->input('title'),
            'body' => $this->request()->input('text'),
            'thumbnail' => $this->request()->file('thumbnail')->move('posts'),
            'date_time' => date_format(new \DateTime(), 'Y-m-d h:i:s'),
            'is_featured' => 0,
            'author_id' => $this->auth()->user()->id()
        ]);

        $this->db()->insert('posts_has_categories', [
            'post_id' => $post,
            'category_id' => $this->request()->input('category')
        ]);

        $this->redirect('/home');
    }
}
