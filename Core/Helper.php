<?php

namespace App\Core;

/**
 * Class Helper
 * @package App\Core
 */
class Helper
{
    public static function dd($thingToDisplay) {
        echo '<pre>';
        var_dump($thingToDisplay);
        echo '</pre>';
        exit;
    }
}