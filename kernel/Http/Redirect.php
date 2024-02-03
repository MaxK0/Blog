<?php

namespace App\Kernel\Http;

class Redirect implements IRedirect {
    
    public function to(string $url): void {
        header("Location: $url");
        exit;
    }

}