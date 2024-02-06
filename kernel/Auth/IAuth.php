<?php

namespace App\Kernel\Auth;

interface IAuth {

    public function attempt(string $username, string $password): bool;

    public function logout(): void;

    public function check(): bool;

    public function user(): ?array;

}