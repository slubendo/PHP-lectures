<?php

namespace App;

class Router {
    /*

        Instructions for Router.php

        1. Create a new class called Router in the App namespace.
        2. Add a protected property called $routes and set it to an empty array.
        3. Add a public method called get() that takes three arguments: $route, $controller, and $action. The method should add a new route to the $routes array. The key should be the $route and the value should be an array with two keys: 'controller' and 'action'. The value of 'controller' should be the $controller argument and the value of 'action' should be the $action argument.
        4. Add a public method called dispatch() that does the following:
            - Gets the REQUEST_URI from the $_SERVER superglobal, passes it to the basename() function and stores it in a variable called $uri.
            - Gets the request method from the $_SERVER superglobal and stores it in a variable called $method.
            - Gets the route from the $routes array, using the $method and $uri variables and stores it in a variable called $route.
            - If $route is not set, echo "404 Not Found" and return. Otherwise, call the method specified in the $route['action'] key on the $route['controller'] object.
    
    */

    private $routes = [];

    public function get($route, $controller, $action) {
        // Add a new route to the $routes array
        $this->routes[$route] = [
            'controller' => $controller,
            'action' => $action
        ];

        return $this->routes[$route];
    }

    public function dispatch() {
        $uri = basename($_SERVER['REQUEST_URI']); // Gets the requested URI
        $method = $_SERVER['REQUEST_METHOD']; // Gets the request method (GET, POST, etc.)

        // Check if the route exists for the requested URI and method
        if (isset($this->routes[$uri])) {
            $route = $this->routes[$uri];
            $controller = new $route['controller']();
            $action = $route['action'];
            // Check if the method exists in the controller
            if (method_exists($controller, $action)) {
                // Call the method specified in the route
                $controller->$action();
            } else {
                echo "404 Not Found";
            }
        } else {
            echo "404 Not Found";
        }
    }

}


?>