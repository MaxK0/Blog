<?php

namespace App\Kernel\Auth;

use App\Kernel\Config\IConfig;
use App\Kernel\Database\IDatabase;
use App\Kernel\Session\ISession;

class Auth implements IAuth
{

    public function __construct(
        private IDatabase $db,
        private ISession $session,
        private IConfig $config,
    ) {
    }

    public function attempt(string $username, string $password): bool
    {
        $user = $this->db->first('users', [
            $this->username() => $username
        ]);

        if (!$user) {
            return false;
        }

        if (!password_verify($password, $user[$this->password()])) {
            return false;
        }

        $this->session->set($this->sessionField(), $user['user_id']);

        return true;
    }

    public function logout(): void
    {
    }

    public function user(): ?array
    {
    }

    public function check(): bool
    {
    }

    public function table(): string
    {
        return $this->config->get('auth.table', 'users');
    }

    public function username(): string
    {
        return $this->config->get('auth.username', 'email');
    }

    public function password(): string
    {
        return $this->config->get('auth.password', 'password');
    }

    public function sessionField(): string
    {
        return $this->config->get('auth.session_field', 'user_id');
    }
}
