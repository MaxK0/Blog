<?php

namespace App\Kernel\Database;

interface IDatabase {

    public function insert(string $table, array $data): int|false;
    

}