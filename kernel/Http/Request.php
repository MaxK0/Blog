<?php

namespace App\Kernel\Http;

use App\Kernel\Session\ISession;
use App\Kernel\Upload\IUploadedFile;
use App\Kernel\Upload\UploadedFile;
use App\Kernel\Validator\IValidator;

class Request implements IRequest
{

    private IValidator $validator;
    private ISession $session;

    public function __construct(
        public readonly array $get,
        public readonly array $post,
        public readonly array $server,
        public readonly array $files,
        public readonly array $cookies
    ) {
    }

    public static function createFromGlobals(): static
    {
        return new static($_GET, $_POST, $_SERVER, $_FILES, $_COOKIE);
    }

    public function setSession(ISession $session): void
    {
        $this->session = $session;
    }

    public function uri(): string
    {
        return strtok($this->server['REQUEST_URI'], '?');
    }

    public function method(): string
    {
        return $this->server['REQUEST_METHOD'];
    }

    public function input(string $key, mixed $default = null): mixed
    {
        $value = $this->post[$key] ?? $this->get[$key] ?? $default;
        $this->session->set("old_$key", $value);
        return $value;
    }

    public function file(string $key): ?IUploadedFile
    {
        if (empty($this->files[$key]['name'])) return null;

        return new UploadedFile(
            $this->files[$key]['name'],
            $this->files[$key]['type'],
            $this->files[$key]['tmp_name'],
            $this->files[$key]['error'],
            $this->files[$key]['size'],
        );
    }

    public function setvalidator(IValidator $validator): void
    {
        $this->validator = $validator;
    }

    public function validate(array $rules): bool
    {
        $data = [];

        foreach ($rules as $field => $rule) {
            $data[$field] = $this->input($field) ?? $this->file($field);
        }

        return $this->validator->validate($data, $rules);
    }

    public function errors(): array
    {
        return $this->validator->errors();
    }
}
