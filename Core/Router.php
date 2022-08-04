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
        $this->request->getPath();
    }
}