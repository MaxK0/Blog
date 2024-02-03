<?php

namespace App\Kernel\Validator;

use App\Kernel\Database\IDatabase;

interface IValidator {

    public function validate(array $data, array $rules): bool;
    public function errors(): array;

}