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

        $this->session->set($this->sessionField(), $user[$this->tableId()]);

        return true;
    }

    public function check(): bool
    {
        return $this->session->has($this->sessionField());
    }
    
    public function user(): ?User
    {
        if (!$this->check()) return null;
        
        $user =  $this->db->first($this->table(), [
            $this->tableId() => $this->session->get($this->sessionField()),
        ]);

        if ($user) {
            return new User(
                $user[$this->tableId()],
                $user[$this->username()],
                $user[$this->password()],
                $user['nick'],
                $user['name'],
                $user['surname'],
                $user['is_admin'],
                $user['avatar']
            );
        }

        return null;
    }    

    public function logout(): void
    {
        $this->session->remove($this->sessionField());
    }
    
    private function table(): string
    {
        return $this->config->get('auth.table', 'users');
    }

    private function tableId(): string
    {
        return $this->config->get('auth.table_id', 'user_id');
    }

    private function username(): string
    {
        return $this->config->get('auth.username', 'email');
    }

    private function password(): string
    {
        return $this->config->get('auth.password', 'password');
    }

    private function sessionField(): string
    {
        return $this->config->get('auth.session_field', 'user_id');
    }
}
