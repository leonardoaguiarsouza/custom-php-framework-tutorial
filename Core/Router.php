<?php

namespace App\Core;

/**
 * Class Router
 * @package App\Core
 */
class Router
{
    protected array $routes = [];
    public \App\Core\Request $request;

    public function __construct(Request $request) {
        $this->request = $request;
    }

    public function get($path, $callback) {
        $this->routes['get'][$path] = $callback;


    }

    public function resolve() {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;
        
        if ($callback === false) {
            echo "Not found";
            exit;
        }

        echo call_user_func($callback);
    }
}