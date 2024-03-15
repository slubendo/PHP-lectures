<?php

require_once('Lab5App/Router.php');
require_once('Lab5App/Controllers/StudentsController.php');

use Lab5App\Router as Router;
use Lab5App\Controllers\StudentsController as StudentsController;

$router = new Router();

/* 
    NOTE: changes you will be making to the Router now require a URL to be registered with two path parts:
        the resource (e.g. students), and
        the action (e.g. all)

    Step 1: update the Router.php file
*/

$router->get('students/all', new StudentsController, 'index');
$router->post('students/create', new StudentsController, 'create');
$router->post('students/update', new StudentsController, 'update');
$router->post('students/delete', new StudentsController, 'delete');

$router->dispatch();

?>