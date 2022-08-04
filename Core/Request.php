<?php

namespace App\Core;

/**
 * Class Request
 * @package App\Core
 */
class Request
{   
    public function getPath() {
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        $position = strpos($path, '?');

        \App\Core\Helper::dd($position);
    }

    public function getMethod() {
        
    }
}