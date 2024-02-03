<?php

namespace App\Kernel\Http;

interface IRedirect {

    public function to(string $url): void;

}