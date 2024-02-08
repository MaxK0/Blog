<?php

namespace App\Kernel\Http;

use App\Kernel\Upload\IUploadedFile;
use App\Kernel\Validator\IValidator;

interface IRequest {

    public static function createFromGlobals(): static;
    public function uri(): string;
    public function method(): string;
    public function input(string $key, mixed $default = null): mixed;
    public function setvalidator(IValidator $validator): void;
    public function validate(array $rules): bool;
    public function errors(): array;
    public function file(string $key): ?IUploadedFile;

}