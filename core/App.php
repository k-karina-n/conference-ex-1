<?php

namespace App\Core;

class App
{
    /**
     * An empty associative array to hold bindings for the registry
     * 
     * @var array 
     */
    protected static $registry = [];

    /**
     * Bind the given key and value to the registry
     * 
     * @param string $key
     * @param array|object $value
     * 
     * @return void 
     */
    public static function bind(string $key, array|object $value): void
    {
        static::$registry[$key] = $value;
    }

    /**
     * Retrieve the value bound to the given key from the registry
     * 
     * @param string $key
     * 
     * @return mixed 
     */
    public static function get(string $key): mixed
    {
        if (!array_key_exists($key, static::$registry)) {
            throw new \Exception("No {$key} is bound in the container");
        }

        return static::$registry[$key];
    }
}
