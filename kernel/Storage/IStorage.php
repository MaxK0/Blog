<?php

namespace App\Kernel\Storage;

interface IStorage
{

    public function url($path): string;

    public function get($path): string;

    public function storagePath($path): string;
}
