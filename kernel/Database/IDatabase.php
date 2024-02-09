<?php

namespace App\Kernel\Database;

interface IDatabase {

    public function insert(string $table, array $data): int|false;

    public function isExist(string $table, string $key, mixed $data): bool;
    
    public function first(string $table, array $conditions = []): ?array; 

    public function update(string $table, array $values, array $conditions): bool;

}