<?php

namespace App\Controllers;

use App\Kernel\Controller\Controller;
use App\Services\UserService;

class SignupController extends Controller
{

    private UserService $userService;

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
        $this->userService = new UserService($this->db());

        $user = $this->userService->find($this->request()->input('id'));

        $this->view('admin/edit-user-admin', ['userEdit' => $user]);
    }

    public function manage(): void
    {
        $this->userService = new UserService($this->db());

        $this->view('admin/manage-users', ['users' => $this->userService->all()]);
    }

    public function add(): void
    {
        $this->view('admin/add-user');
    }

    public function delete(): void
    {
        $this->userService = new UserService($this->db());

        $this->userService->delete($this->request()->input('id'));

        $this->redirect('/admin/dashboard/users');
    }


    public function signup(): void
    {
        $this->userValidate(['/signup', '/admin/user/add']);

        $name = $this->request()->input('name');
        $surname = $this->request()->input('surname');
        $nick = $this->request()->input('nick');
        $email = $this->request()->input('email');
        $password = password_hash($this->request()->input('password'), PASSWORD_DEFAULT);
        $isAdmin = $this->request()->input('isAdmin', 0);
        $avatar = null;

        if (!empty($this->request()->file('avatar'))) $avatar = $this->request()->file('avatar')->move('avatars');        

        $this->userService->insert($name, $surname, $nick, $email, $password, $isAdmin, $avatar);

        $this->redirect('/home');
    }

    public function editUser(): void
    {
        $this->userValidate(['/user/edit'], true);

        $id = $this->auth()->user()->id();
        $name = $this->request()->input('name');
        $surname = $this->request()->input('surname');
        $nick = $this->request()->input('nick');
        $email = $this->request()->input('email');
        $isAdmin = $this->request()->input('isAdmin', 0);
        $password = $this->request()->input('password');
        $avatar = null;

        if (!empty($this->request()->file('avatar'))) $avatar = $this->request()->file('avatar')->move('avatars');
        if (!empty($password)) password_hash($password, PASSWORD_DEFAULT);

        $this->userService->update($id, $name, $surname, $nick, $email, $password, $avatar, $isAdmin);

        $this->redirect('/home');
    }

    public function editUserByAdmin(): void
    {
        $this->userValidate(["/admin/user/edit?id={$this->request()->input('id')}"], true);

        $id = $this->request()->input('id');
        $name = $this->request()->input('name');
        $surname = $this->request()->input('surname');
        $nick = $this->request()->input('nick');
        $email = $this->request()->input('email');
        $isAdmin = $this->request()->input('isAdmin', 0);
        $password = $this->request()->input('password');
        $avatar = null;

        if (!empty($this->request()->file('avatar'))) $avatar = $this->request()->file('avatar')->move('avatars');
        if (!empty($password)) $password = password_hash($password, PASSWORD_DEFAULT);

        $this->userService->update($id, $name, $surname, $nick, $email, $password, $avatar, $isAdmin);

        $this->redirect('/admin/dashboard/users');
    }

    private function userValidate(array $redirectPaths, bool $isEdit = false): void
    {
        $id = $this->request()->input('id', 0);
        $data = [
            'name' => ['required', 'min:2', 'max:45'],
            'surname' => ['required', 'min:2', 'max:45'],
            'nick' => ['required', "unique:users:user_id:$id", 'min:2', 'max:45'],
            'email' => ['email', "unique:users:user_id:$id", 'max:100'],
            'password' => ['min:6', 'max:45'],
            'passwordRepeat' => ['passwordRepeat'],
            'avatar' => ['fileSize:3']
        ];

        if (!$isEdit) {
            $data['password'][] = 'required';
        }

        $validate = $this->request()->validate($data);

        if (!$validate) {
            foreach ($this->request()->errors() as $field => $error) {
                $this->session()->set($field, $error);
            }

            foreach ($redirectPaths as $path) {
                if ($this->request()->uri() == strtok($path, '?')) $this->redirect($path);
            }
        };

        $this->userService = new UserService($this->db());
    }
}
