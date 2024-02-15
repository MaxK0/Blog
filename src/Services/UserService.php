<?php

namespace App\Services;

use App\Kernel\AUth\User;
use App\Kernel\Database\IDatabase;

class UserService
{

    public function __construct(
        private IDatabase $db
    ) {
    }

    public function all(): array
    {
        $users = $this->db->get('users');

        return array_map(function ($user) {
            return new User(
                id: $user['user_id'],
                email: $user['email'],
                password: $user['password'],
                nick: $user['nick'],
                name: $user['name'],
                surname: $user['surname'],
                isAdmin: $user['is_admin'],
                avatarPath: $user['avatar']
            );
        }, $users);
    }

    public function find(int $id): User
    {
        $user = $this->db->get('users', ['user_id' => $id])[0];

        return new User(
            id: $user['user_id'],
            email: $user['email'],
            password: $user['password'],
            nick: $user['nick'],
            name: $user['name'],
            surname: $user['surname'],
            isAdmin: $user['is_admin'],
            avatarPath: $user['avatar']
        );
    }
}
