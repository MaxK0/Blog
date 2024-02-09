<?php

namespace App\Kernel\Database;

use App\Kernel\Config\IConfig;

class Database implements IDatabase {

    private \PDO $pdo;

    public function __construct(
        private IConfig $config
    )
    {
        $this->connect();
    }

    private function connect(): void {
        $driver = $this->config->get('database.driver');
        $host = $this->config->get('database.host');
        $port = $this->config->get('database.port');
        $database = $this->config->get('database.database');
        $username = $this->config->get('database.username');
        $password = $this->config->get('database.password');
        $charset = $this->config->get('database.charset');

        try {
            $this->pdo = new \PDO(
                "$driver:host=$host;port=$port;dbname=$database;charset=$charset",
                $username,
                $password
            );
        } catch (\PDOException $exception) {
            exit("Соединение с базой данной провалено {$exception->getMessage()}");
        }
        
    }


    public function insert(string $table, array $data): int|false
    {
        $fields = array_keys($data);

        $columns = implode(', ', $fields);
        $binds = implode(', ', array_map(fn ($field) => ":$field", $fields));

        $sql = "INSERT INTO $table ($columns) VALUES ($binds)";

        $stmt = $this->pdo->prepare($sql);

        try {
            $stmt->execute($data);
        } catch (\PDOException $exception) {
            return false;
        }

        return (int) $this->pdo->lastInsertId();        
    }

    public function isExist(string $table, string $key, mixed $value): bool {        
        $sql = "SELECT * FROM $table WHERE $key = :$key";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":$key", $value);        
        
        try {
            $stmt->execute();
        } catch (\PDOException $exception) {
            echo $exception->getMessage();
        }

        if ($stmt->rowCount() > 0) return true;
        return false;
    }

    public function first(string $table, array $conditions = []): ?array
    {
        $where = '';

        if (count($conditions) > 0) {
            $where = 'WHERE ' . implode(' AND ', array_map(fn ($field) => "$field = :$field", array_keys($conditions)));
        }         

        $sql = "SELECT * FROM $table $where LIMIT 1";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute($conditions);        
        
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);

        return $result ?: null;
    }

    public function update(string $table, array $values, array $conditions): bool
    {
        $set = "SET " . implode(', ', array_map(fn ($field) => "$field = :$field", array_keys($values)));
        $where = 'WHERE ' . implode(' AND ', array_map(fn ($field) => "$field = :$field", array_keys($conditions)));

        $sql = "UPDATE $table $set $where";

        $stmt = $this->pdo->prepare($sql);

        $params = array_merge($values, $conditions);

        try {
            $stmt->execute($params);
        } catch (\PDOException $exception) {
            return false;
        }

        return true;


    }

}