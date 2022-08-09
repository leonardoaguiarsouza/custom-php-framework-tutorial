<?php

namespace App\Core;

use App\Core\Application;
use App\Core\Request;
use App\Core\Response;

/**
 * Class Router
 * @package App\Core
 */
class Router
{
    protected array $routes = [];
    public Request $request;
    public Response $response;

    public function __construct(
        Request $request,
        Response $response
    ) {
        $this->request = $request;
        $this->response = $response;
    }

    public function get($path, $callback) {
        $this->routes['get'][$path] = $callback;
    }

    public function post($path, $callback) {
        $this->routes['post'][$path] = $callback;
    }

    public function resolve() {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;

        if ($callback === false) {
           $this->response->setStatusCode(404);
           return $this->renderView("_404");;
        }

        if (is_string($callback)) {
            return $this->renderView($callback);
        }

        return call_user_func($callback);
    }

    protected function layoutContent() {
        ob_start();
        include_once Application::$ROOT_DIR."/Views/Layouts/main.phtml";
        return ob_get_clean();
    }

    protected function renderOnlyView($view) {
        ob_start();
        include_once Application::$ROOT_DIR."/Views/{$view}.phtml";
        return ob_get_clean();
    }

    public function renderView($view) {
        $layoutContent = $this->layoutContent();
        $viewContent = $this->renderOnlyView($view);

        return str_replace('{{ content }}', $viewContent, $layoutContent);
    }
}