<?php

namespace App\Kernel\View;

use App\Kernel\Auth\IAuth;
use App\Kernel\Exceptions\ViewNotFoundException;
use App\Kernel\Session\ISession;

class View implements IView {

    public function __construct(
        private ISession $session,
        private IAuth $auth,
    )
    {        
    }

    public function page(string $name): void {
        $viewPath = APP_PATH . "/views/pages/$name.php";

        if (!file_exists($viewPath)) {
            throw new ViewNotFoundException("Представление $name не было найдено");
        }

        extract(['view' => $this, 'session' => $this->session, 'auth' => $this->auth]);        

        include_once $viewPath;
    }
    
    public function component(string $name): void {       
        $componentPath = APP_PATH . "/views/components/$name.php";

        if (!file_exists($componentPath)) {
            echo "Компонент $name не был найден";
            return;
        }

        extract(['view' => $this, 'session' => $this->session, 'auth' => $this->auth]);

        include_once $componentPath;
    }

    public function setInvalid(string $key): string {
        return $this->session->has($key) ? 'is-invalid' : '';
    }

    public function error(string $key): void {
        if ($this->session->has($key)) {
            $errors = $this->session->getFlash($key);
            foreach ($errors as $error) {
                echo "<small class='form__error'>$error</small>";
            }
        }
    }

    public function input(string $name, string $placeholder = '', string $type = "text", string $value = ''): void {
        if ($value == 'old') $value = $this->session->getFlash('old_' . $name, '');
        echo "<input class='{$this->setInvalid($name)}' type='$type' name='$name' placeholder='$placeholder' value='$value'>";
    }

    public function inputAndError(string $name, string $placeholder = '', string $type = "text", string $value = ''): void {
        $this->input($name, $placeholder, $type, $value);
        $this->error($name);
    }

}