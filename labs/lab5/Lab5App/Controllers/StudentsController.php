<?php

namespace Lab5App\Controllers;

require_once('Controller.php');
require_once(__DIR__ . '/../Models/Students.php');

use Lab5App\Controllers\Controller as Controller;
use Lab5App\Models\Students as Students;

class StudentsController extends Controller {
    public function index() {
        $this->render('students', ['students' => Students::all()]);
    }

    /* 
        Implement the functionality described in the create(), update(), and delete() methods below.

        Then move on to:

        Step 3: update the Students.php file
    */

    public function create() {
        /*
            create() should extract 'name' and 'email' values from the $_POST superglobal

            If both values are set, call the static create() method of the Students model, 
            passing in the name and email

            Finally, call $this->render('students', ['students' => Students:all()]); to render the view
        */

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['name']) && isset($_POST['email'])) {
            // Extract 'name' and 'email' values from $_POST
            $name = $_POST['name'];
            $email = $_POST['email'];
            // Call the static create() method of the Students model
            Students::create($name, $email);
        }

        $this->render('students', ['students' => Students::all()]);
    }

    public function update() {
        /*
            update() should extract 'id', 'name' and 'email' values from the $_POST superglobal

            If all values are set, call the static update() method of the Students model, 
            passing in the id, name and email

            Finally, call $this->render('students', ['students' => Students:all()]); to render the view
        */

        if (isset($_POST["id"]) && isset($_POST['name']) && isset($_POST['email'])) {

            $id = $_POST['id'];
            $name = $_POST['name'];
            $email = $_POST['email'];

            Students::update($id, $name, $email);
        }

        $this->render('students', ['students' => Students::all()]);
    }   

    public function delete() {
        /*
            delete() should extract the 'id' value from the $_POST superglobal

            If the value is set, call the static delete() method of the Students model, 
            passing in the id

            Finally, call $this->render('students', ['students' => Students:all()]); to render the view
        */

        if (isset($_POST["id"])) {

            $id = $_POST['id'];
            Students::delete($id);
        }

        $this->render('students', ['students' => Students::all()]);

    }
}

?>