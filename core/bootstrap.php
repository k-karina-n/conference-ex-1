<?php

use App\Core\App;

App::bind('config', require 'config.php');

App::bind('database', new QueryBuilder(
    Connection::make(App::get('config')['database'])
));

function urlIS($value)
{
    return $_SERVER['REQUEST_URI'] === $value;
}

function view($name, $data = [])
{
    extract($data);

    return require "app/views/{$name}.view.php";
}

function redirect($path)
{
    header("Location: /{$path}");
}

function dd($value)
{
    echo "<pre>";
    die(var_dump($value));
    echo "</pre>";
}
