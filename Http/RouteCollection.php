<?php
namespace App\Http;
use App\Http\Route;
class RouteCollection
{
    public $rout = [];

    public function createRoute($route)
    {
        $this->rout[] = $route;
    }

    public function get($name, $pattern, $handler)
    {
        $this->createRoute(new Route($name,$pattern,$handler,['GET']));
    }
    public function post($name,$pattern, $handler)
    {
        $this->createRoute(new Route($name,$pattern,['POST'],$handler));
    }
    public function delete($name,$pattern, $handler)
    {
        $this->createRoute(new Route($name,$pattern,['DELETE'],$handler));
    }
    public function put($name,$pattern, $handler)
    {
        $this->createRoute(new Route($name,$pattern,['PUT'],$handler));
    }
    public function all($name,$pattern, $handler)
    {
        $this->createRoute(new Route($name,$pattern,[],$handler));
    }

    public function match(array $methods,$name,$pattern,$handler){
        $this->createRoute(new Route($name,$pattern,$methods,$handler));
    }
}