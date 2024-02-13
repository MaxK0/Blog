<?php

namespace App\Kernel\View;

use App\Kernel\Auth\IAuth;
use App\Kernel\Exceptions\ViewNotFoundException;
use App\Kernel\Session\ISession;
use App\Kernel\Storage\IStorage;

class View implements IView
{

    private string $title;

    public function __construct(
        private ISession $session,
        private IAuth $auth,
        private IStorage $storage
    ) {
    }

    public function page(string $name, array $data = [], string $title = 'Blog'): void
    {
        $this->title = $title;

        $viewPath = APP_PATH . "/views/pages/$name.php";

        if (!file_exists($viewPath)) {
            throw new ViewNotFoundException("Представление $name не было найдено");
        }

        extract(array_merge($this->defaultData(), $data));

        include_once $viewPath;
    }

    public function component(string $name, array $data = []): void
    {
        $componentPath = APP_PATH . "/views/components/$name.php";

        if (!file_exists($componentPath)) {
            echo "Компонент $name не был найден";
            return;
        }

        extract(array_merge($this->defaultData(), $data));

        include_once $componentPath;
    }

    private function defaultData(): array
    {
        return [
            'view' => $this,
            'session' => $this->session,
            'auth' => $this->auth,
            'user' => $this->auth->user(),
            'storage' => $this->storage
        ];
    }

    public function setInvalid(string $key): string
    {
        return $this->session->has($key) ? 'is-invalid' : '';
    }

    public function error(string $key): void
    {
        if ($this->session->has($key)) {
            $errors = $this->session->getFlash($key);
            foreach ($errors as $error) {
                echo "<small class='form__error'>$error</small>";
            }
        }
    }

    public function input(string $name, string $placeholder = '', string $type = "text", string $value = ''): void
    {
        if ($value == 'old') $value = $this->session->getFlash('old_' . $name, '');
        echo "<input class='{$this->setInvalid($name)}' type='$type' name='$name' placeholder='$placeholder' value='$value'>";
    }

    public function inputAndError(string $name, string $placeholder = '', string $type = "text", string $value = ''): void
    {
        $this->input($name, $placeholder, $type, $value);
        $this->error($name);
    }

    public function title(): string
    {
        return $this->title;
    }
}
