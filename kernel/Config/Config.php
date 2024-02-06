<?php

namespace App\Kernel\Config;

class Config implements IConfig {

    public function get(string $key, mixed $default = null): mixed
    {
        [$file, $key] = explode('.', $key);

        $configPath = APP_PATH . "/config/$file.php";

        if (!file_exists($configPath)) {
            return $default; 
        }

        $config = require $configPath;

        return $config[$key] ?? $default;
    }

}