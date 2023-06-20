<?php

namespace App\Core;

class Request
{
    /**
     * Removes a slash from a current URI
     * 
     * @return string
     */
    public static function uri(): string
    {
        return trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
    }

    /**
     * Returns the HTTP method used for the current request
     * 
     * @return string
     */
    public static function method(): string
    {
        return $_SERVER['REQUEST_METHOD'];
    }
}
