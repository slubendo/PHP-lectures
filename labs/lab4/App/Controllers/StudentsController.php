<?php

namespace App\Controllers;

require_once('Controller.php');
require_once(__DIR__ . '/../Models/Students.php');

use App\Models\Students;
use App\Controllers\Controller as Controller;

/*

    Instructions for StudentsController.php

    1. Use the 'use' keyword to alias the Controller class to 'Controller' and the Students class to 'Students'.
    2. Create a class named StudentsController that extends the Controller class.
    3. Create a method named index that calls the inherited render method and passes two arguments:
        - The first argument is the view
        - The second argument is an associative array
            The array should have one key: 'students'
            The value of the 'students' key should be the result of calling the static all() method of the Students model.

*/

class StudentsController extends Controller {

    public function index() {
        // Get all students from the Students model
        $students = Students::all();

        // Pass students data to the view
        $this->render('students', ['students' => $students]);
    }
}

?>
