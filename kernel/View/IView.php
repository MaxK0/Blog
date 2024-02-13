<?php

namespace App\Kernel\View;

interface IView {

    public function page(string $name, array $data = [], string $title = 'Blog'): void;

    public function component(string $name, array $data = []): void;

    public function setInvalid(string $key): string;

    public function error(string $key): void;

    public function input(string $name, string $placeholder = '', string $type = "text", string $value = ''): void;

    public function inputAndError(string $name, string $placeholder = '', string $type = "text", string $value = ''): void;
    
    public function title(): string;

}