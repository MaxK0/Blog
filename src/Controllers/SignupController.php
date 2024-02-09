<?php

namespace App\Controllers;

use App\Kernel\Controller\Controller;

class SignupController extends Controller
{

    public function index(): void
    {
        $this->view('signup');
    }

    public function edit(): void
    {
        $this->view('edit-user');
    }

    public function editByAdmin(): void
    {
        $this->view('admin/edit-user-admin');
    }

    public function add(): void
    {
        $this->view('admin/add-user');
    }

    public function manage(): void
    {
        $this->view('admin/manage-users');
    }

    public function signup(): void
    {


        $validate = $this->request()->validate(
            [
                'name' => ['required', 'min:2', 'max:45'],
                'surname' => ['required', 'min:2', 'max:45'],
                'nick' => ['required', 'unique:users', 'min:2', 'max:45'],
                'email' => ['email', 'unique:users', 'max:100'],
                'password' => ['required', 'min:6', 'max:45'],
                'passwordRepeat' => ['required', 'passwordRepeat'],
                'avatar' => ['fileSize:3']
            ]
        );

        if (!$validate) {
            foreach ($this->request()->errors() as $field => $error) {
                $this->session()->set($field, $error);
            }

            $this->redirect('/signup');
        };

        $uesrId = $this->db()->insert('users', [
            'name' => $this->request()->input('name'),
            'surname' => $this->request()->input('surname'),
            'nick' => $this->request()->input('nick'),
            'email' => $this->request()->input('email'),
            'password' => password_hash($this->request()->input('password'), PASSWORD_DEFAULT),
            'is_admin' => 0,
            'avatar' => $this->request()->file('avatar')->move('avatars') ?? null
        ]);

        $this->redirect('/home');
    }

    public function editUser(): void
    {
        $validate = $this->request()->validate(
            [
                'name' => ['required', 'min:2', 'max:45'],
                'surname' => ['required', 'min:2', 'max:45'],
                'nick' => ['required', 'unique:users', 'min:2', 'max:45'],
                'email' => ['email', 'unique:users', 'max:100'],
                'password' => ['min:6', 'max:45'],
                'passwordRepeat' => ['passwordRepeat'],
                'avatar' => ['fileSize:3']
            ]
        );

        if (!$validate) {
            foreach ($this->request()->errors() as $field => $error) {
                $this->session()->set($field, $error);
            }

            $this->redirect('/user/edit');
        };

        $values = [
            'name' => $this->request()->input('name'),
            'surname' => $this->request()->input('surname'),
            'nick' => $this->request()->input('nick'),
            'email' => $this->request()->input('email'),
        ];

        $conditions = ['user_id' => $this->auth()->user()->id()];

        if (!empty($this->request()->input('password'))) $values['password'] = $this->request()->input('password');
        if (!empty($this->request()->file('avatar'))) $values['avatar'] = $this->request()->file('avatar')->move('avatars');

        $this->db()->update('users', $values, $conditions);
        $this->redirect('/home');
    }
}
