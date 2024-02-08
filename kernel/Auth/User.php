<?php

namespace App\Kernel\Auth;

class User
{
    public function __construct(
        private int $id,
        private string $email,
        private string $password,
        private string $nick,
        private string $name,
        private string $surname,
        private bool $isAdmin,
        private ?string $avatarPath
    ) {
    }

    public function id(): int
    {
        return $this->id;
    }

    public function email(): string
    {
        return $this->email;
    }

    public function password(): string
    {
        return $this->password;
    }

    public function nick(): string
    {
        return $this->nick;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function surname(): string
    {
        return $this->surname;
    }

    public function isAdmin(): bool
    {
        return $this->isAdmin;
    }

    public function avatarPath(): string
    {
        return $this->avatarPath;
    }   
}
