<?php

namespace App\Core;

/**
 * Class Response
 * @package App\Core
 */
class Response
{   
    public function setStatusCode(int $code) {
        http_response_code($code);
    }
}