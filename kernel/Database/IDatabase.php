<?php

namespace App\Kernel\Database;

interface IDatabase {

    public function insert(string $table, array $data): int|false;

    public function isExist(string $table, string $key, mixed $data): bool;
    

}