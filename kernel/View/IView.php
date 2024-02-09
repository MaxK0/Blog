<?php

namespace App\Kernel\View;

interface IView {

    public function page(string $name): void;
    public function component(string $name): void;
    public function setInvalid(string $key): string;
    public function error(string $key): void;
    public function input(string $name, string $placeholder = '', string $type = "text", string $value = ''): void;
    public function inputAndError(string $name, string $placeholder = '', string $type = "text", string $value = ''): void;

}