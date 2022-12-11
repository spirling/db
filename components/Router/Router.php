<?php

namespace Spirling\Components\Router;

class Router
{

    private array $routes = [];

    public function __construct(array $routes = [])
    {
        $this->routes = $routes;
    }

    public function match(string $uri, string $method = 'GET')
    {
        foreach ($this->routes as $path => $route) {
            if (preg_match('~^' . $path . '~', $uri)) {
                $controller = $route['controller'];
                if (is_callable($controller)) {

                } elseif (is_array($controller)) {

                } elseif (is_string($controller)) {

                }
            }
        }

        return $controller;
    }

}