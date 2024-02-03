<?php

namespace App\Kernel\Config;

interface IConfig {

    public function get(string $key, mixed $default = null): mixed;
    
}