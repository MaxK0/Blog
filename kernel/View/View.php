<?php

namespace App\Kernel\View;

use App\Kernel\Exceptions\ViewNotFoundException;
use App\Kernel\Session\Session;

class View {

    public function __construct(
        private Session $session
    )
    {        
    }

    public function page(string $name): void {
        $viewPath = APP_PATH . "/views/pages/$name.php";

        if (!file_exists($viewPath)) {
            throw new ViewNotFoundException("Представление $name не было найдено");
        }

        extract(['view' => $this, 'session' => $this->session]);        

        include_once $viewPath;
    }
    
    public function component(string $name): void {       
        $componentPath = APP_PATH . "/views/components/$name.php";

        if (!file_exists($componentPath)) {
            echo "Компонент $name не был найден";
            return;
        }

        extract(['view' => $this, 'session' => $this->session]);

        include_once $componentPath;
    }

    public function errorInForm(string $key): void {
        if ($this->session->has($key)) {
            $errors = $this->session->getFlash($key);
            foreach ($errors as $error) {
                echo "<small class='form__error'>$error</small>";
            }
        }
    }

}