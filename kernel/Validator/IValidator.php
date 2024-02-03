<?php

namespace App\Kernel\Validator;

interface IValidator {

    public function validate(array $data, array $rules): bool;
    public function errors(): array;

}