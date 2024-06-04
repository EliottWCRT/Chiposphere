<?php
namespace App;
class Router
{
   private $routes = []; // Tableau pour stocker les routes
   public function addRoute($method, $path, $controller, $action)
    {
        $this->routes[] = [
            'method' => $method,
            'path' => $path,
            'controller' => $controller,
            'action' => $action
        ];
    }


    public function route()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $uri = $_SERVER['REQUEST_URI'];
        foreach ($this->routes as $route) {
            if ($route['method'] == $method && $route['path'] == $uri) {
                $controller = new $route['controller']();
                $controller->{$route['action']}();
                return;
            } 
        }
       echo "404 - Page not found";
   }
}