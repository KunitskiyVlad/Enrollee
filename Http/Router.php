<?php

namespace App\Http;

class Router
{
    public $routes;

    public function __construct(RouteCollection $routes)
    {
        $this->routes = $routes;
    }

    public function match(Request $request)
    {
        foreach ($this->routes->rout as $route){
            if($route->match($request)){
                return $route;
            }
        }
    }
}