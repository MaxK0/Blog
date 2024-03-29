<?php

namespace App\Kernel\Router;

use App\Kernel\Auth\IAuth;
use App\Kernel\Controller\Controller;
use App\Kernel\Database\IDatabase;
use App\Kernel\Http\IRedirect;
use App\Kernel\Http\IRequest;
use App\Kernel\Session\ISession;
use App\Kernel\View\IView;

/**
 * Класс, который отвечает за маршрутизацию
 */
class Router implements IRouter {

    private array $routes = [
        'GET' => [],
        'POST' => []
    ];

    public function __construct(
        private IView $view,
        private IRequest $request,
        private IRedirect $redirect,
        private ISession $session,
        private IDatabase $database,
        private IAuth $auth,
        ) {
        $this->initRoutes();
    }

    public function dispatch(string $uri, string $method): void {
        $route = $this->findRoute($uri, $method);

        if (!$route) $this->notFound();

        if ($route->hasMiddlewares()) {
            foreach ($route->getMiddleware() as $middleware) {
                /** @var AbstractMiddleware $middleware */
                $middleware = new $middleware($this->request, $this->auth, $this->redirect);

                $middleware->handle();
            }
        }

        if (is_array($route->getAction())) {
            [$controller, $action] = $route->getAction();

            /** @var Controller $controller */
            $controller = new $controller();

            call_user_func([$controller, 'setView'], $this->view);
            call_user_func([$controller, 'setRequest'], $this->request);
            call_user_func([$controller, 'setRedirect'], $this->redirect);
            call_user_func([$controller, 'setSession'], $this->session);
            call_user_func([$controller, 'setDatabase'], $this->database);
            call_user_func([$controller, 'setAuth'], $this->auth);

            call_user_func([$controller, $action]);
        }
        else $route->getAction()();
        
    }

    private function notFound(): void {
        echo '404 | Not Found';
        exit;
    }

    private function findRoute(string $uri, string $method): Route|false {
        if (!isset($this->routes[$method][$uri])) {
            return false;
        }

        return $this->routes[$method][$uri];
    }

    private function initRoutes(): void {
        $routes = $this->getRoutes();

        foreach ($routes as $route) {
            $this->routes[$route->getMethod()][$route->getUri()] = $route;
        }
    }

    /**
     * @return Route[]
     */
    private function getRoutes() : array {
        return require_once APP_PATH . '/config/routes.php';
    }

}