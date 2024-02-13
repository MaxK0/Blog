<?php

namespace App\Kernel\Storage;

use App\Kernel\Config\IConfig;

class Storage implements IStorage
{

    public function __construct(
        private IConfig $config
    )
    {        
    }

    public function url($path): string
    {
        return $this->config->get('app.url') . "/storage/$path";
    }

    public function get($path): string
    {
        return file_get_contents($this->storagePath($path));
    }

    public function storagePath($path): string
    {
        return APP_PATH . "/storage/$path";
    }
}
