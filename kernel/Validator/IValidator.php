<?php

namespace App\Kernel\Validator;

use App\Kernel\Database\IDatabase;

interface IValidator {

    public function setDatabase(IDatabase $database): void;
    public function validate(array $data, array $rules): bool;
    public function errors(): array;

}