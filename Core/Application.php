<?php

namespace App\Core;

use App\Core\Request;
use App\Core\Response;
use App\Core\Router;

/**
 * Class Application
 * @package App\Core
 */
class Application
{
    public static Application $app;
    public static string $ROOT_DIR;
    public Router $router;
    public Request $request;
    public Response $response;

    public function __construct($rootPath) {
        self::$app = $this;
        self::$ROOT_DIR = $rootPath;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
    }

    public function run() {
        echo $this->router->resolve();
    }
}