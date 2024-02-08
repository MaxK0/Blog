<?php

namespace App\Middleware;

use App\Kernel\Middleware\AbstractMiddleware;

class AdminMiddleware extends AbstractMiddleware
{

    public function handle(): void
    {
        if ($this->auth->check()) {
            if (!$this->auth->user()->isAdmin()) {
                $this->redirect->to('/home');
            }
        }
    }
}
