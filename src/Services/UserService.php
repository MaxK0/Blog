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
        $user = $this->db->first('users', ['user_id' => $id]);

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

    public function insert(string $name, string $surname, string $nick, string $email, string $password, int $isAdmin, ?string $avatar): void
    {
        $this->db->insert('users', [
            'name' => $name,
            'surname' => $surname,
            'nick' => $nick,
            'email' => $email,
            'password' => $password,
            'is_admin' => $isAdmin,
            'avatar' => $avatar
        ]);
    }

    public function update(int $id, string $name, string $surname, string $nick, string $email, ?string $password, ?string $avatar, int $isAdmin): void
    {
        $values = [
            'name' => $name,
            'surname' => $surname,
            'nick' => $nick,
            'email' => $email,
            'is_admin' => $isAdmin
        ];

        if (!empty($password)) $values['password'] = $password;
        if (!empty($avatar)) $values['avatar'] = $avatar;

        $conditions = ['user_id' => $id];

        $this->db->update('users', $values, $conditions);
    }

    public function delete(int $id): bool
    {
        return $this->db->delete('users', ['user_id' => $id]);
    }
}
