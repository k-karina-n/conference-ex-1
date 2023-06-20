<?php

use App\Core\App;

App::bind('config', require 'config.php');

App::bind('database', new QueryBuilder(
    Connection::make(App::get('config')['database'])
));

/**
 * Check if the current URI matches the given one
 * 
 * @param string $uri
 * 
 * @return bool 
 */
function isURI(string $uri): bool
{
    return $_SERVER['REQUEST_URI'] === $uri;
}

/**
 * Renders a view file and passes data to it.
 * 
 * @param string $name
 * @param array $data
 * 
 * @return mixed
 */
function view(string $name, array $data = []): mixed
{
    extract($data);
    return require "app/views/{$name}.view.php";
}

/**
 * Redirects a user.
 * 
 * @param string $path
 * 
 * @return void
 */
function redirect(string $path): void
{
    die(header("Location: /{$path}"));
}

/**
 * Dumps information about a value
 * 
 * @param mixed $value
 * 
 * @return void
 */
function dd(mixed $value): void
{
    echo "<pre>";
    die(var_dump($value));
    echo "</pre>";
}
