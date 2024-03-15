<?php

namespace Lab5App;

class Router {
    protected $routes = [];
    
    public function get($route, $controller, $action) {
        $this->routes["GET"][$route] = ["controller" => $controller, "action" => $action];
    }

    public function post($route, $controller, $action) {
        $this->routes["POST"][$route] = ["controller" => $controller, "action" => $action];
    }
    /*
        Add a post() method with the same function signature and logic as the get() method
        above, but change the method name from GET to POST
    */

    public function dispatch() {    
        /*
            Get the last two segments of the $_SERVER["REQUEST_URI"] as a string

            e.g. the URL http://localhost/week6/lab5/students/all should produce a string "students/all",
            matching the routes registered in index.php

            Use this string to index into the routes array, to get a $route array with 'controller'
            and 'action' values

            Finally, move on to:

            STEP 2: update the StudentsController.php file
        */
        /*
            Add code here
        */

        $uri = $_SERVER['REQUEST_URI']; // Gets the requested URI
        $segments = explode('/', trim($uri, '/'));
        $route_key = implode('/', array_slice($segments, -2));
        var_dump($route_key);
        $controller = implode('', array_slice($segments, -1));
        $action = $_SERVER['REQUEST_METHOD']; // Gets the request method (GET, POST, etc.)

        $this->routes[$route_key] = [$route_key];
        $this->routes[$controller] = $controller;
        $this->routes[$action] = $action;
    
        if (!isset($route)) {
            echo "404 Not Found";
            return;
        }
        else {
            $controller = $route["controller"];
            $action = $route["action"];
            $controller->$action();
        }
    }
}


?>