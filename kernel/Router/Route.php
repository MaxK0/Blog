<?php

namespace App\Kernel\Router;

/**
 * Класс для создания объектов маршрутов
 */
class Route {

    public function __construct(
        private string $uri,
        private string $method,
        private $action
    )
    {        
    }

    /** Возвращает объект, присваивая ему метод GET */
    public static function get(string $uri, $action): static {
        return new static($uri, 'GET', $action);
    }

    /** Возвращает объект, присваивая ему метод POST */
    public static function post(string $uri, $action): static {
        return new static($uri, 'POST', $action);
    }

    public function getUri(): string {
        return $this->uri;
    }
    
    public function getMethod(): string {
        return $this->method;
    }

    public function getAction(): mixed {
        return $this->action;
    }

}