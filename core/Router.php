<?php

namespace App\Core;

class Router
{
    /**
     * An associative array with HTTP request methods 
     * 
     * @var array
     */
    protected $routes = [
        'GET' => [],
        'POST' => []
    ];

    /**
     * Loads a router file and create a new instance of the router class.
     *
     * @param string $file The path to the router file to be loaded.
     *
     * @return Router
     */
    public static function load(string $file): Router
    {
        $router = new static;
        require $file;
        return $router;
    }

    /**
     * Assigns a GET route to a corresponding controller.
     *
     * @param string $uri The URI path of the route.
     * @param string $controller Class name of the controller with a method handling the request.
     *
     * @return void
     */
    public function get(string $uri, string $controller): void
    {
        $this->routes['GET'][$uri] = $controller;
    }

    /**
     * Assigns a POST route to a corresponding controller.
     *
     * @param string $uri The URI path of the route.
     * @param string $controller Class name of the controller with a method handling the request.
     *
     * @return void
     */
    public function post(string $uri, string $controller): void
    {
        $this->routes['POST'][$uri] = $controller;
    }

    /**
     * Gets the appropriate response for a URI and request method.
     *
     * @param string $uri The URI to be evaluated.
     * @param string $requestType The HTTP request method (GET, POST).
     *
     * @throws Exception If no route is defined for the provided URI and request type.
     *
     * @return mixed The response generated by calling the associated controller action.
     */
    public function direct(string $uri, string $requestType): mixed
    {
        if (array_key_exists($uri, $this->routes[$requestType])) {
            return $this->callAction(
                ...explode('@', $this->routes[$requestType][$uri])
            );
        }

        throw new \Exception('No route  defined');
    }

    /**
     * Creates an instance of a controller and verifies a method.
     *
     * @param string $controller
     * @param string $method
     *
     * @throws Exception If the specified controller does not have a matching method.
     *
     * @return mixed The response generated by calling the specified controller action.
     */
    protected function callAction(string $controller, string $method): mixed
    {
        $controller = "App\\Controllers\\{$controller}";
        $controller = new $controller;

        if (!method_exists($controller, $method)) {
            throw new \Exception(
                "{$controller} does not respond to the {$method} method."
            );
        }

        return $controller->$method();
    }
}
