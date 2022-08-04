<?php

namespace App\Core;

/**
 * Class Application
 * @package App\Core
 */
class Application
{
    public \App\Core\Router $router;
    public \App\Core\Request $request;

    public function __construct() {
        $this->request = new Request();
        $this->router = new Router($this->request);
    }

    public function run() {
        $this->router->resolve();
    }
}