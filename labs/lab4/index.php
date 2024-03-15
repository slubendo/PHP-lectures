<?php

/*
    Instructions for index.php

    1. require() the Router.php file and the StudentsController.php file
    
    2. Use two 'use' statements to import the Router and StudentsController classes so that you can use your classes as Router and StudentsController (rather than the fully qualified names)

    3. Create a new instance of the Router class and store it in a variable called $router

    4. Use the get() method of the $router object to create a new route. The first argument is the route ('students'), the second argument is a new instance of the StudentsController class, and the third argument is the name of the method that should be called when the route is matched ('index').

    5. Use the dispatch() method of the $router object to dispatch the request to the appropriate controller and method.
*/


// 1. Require the necessary files
require('App/Router.php');
require('App/Controllers/StudentsController.php');

// 2. Import the Router and StudentsController classes
use App\Router;
use App\Controllers\StudentsController;

// 3. Create a new instance of the Router class
$router = new Router();

// 4. Define routes
$router->get('students', new StudentsController(), 'index');

// 5. Dispatch the request
$router->dispatch();

?>


<!-- Routing, Model, View, Controllers MVC app -->