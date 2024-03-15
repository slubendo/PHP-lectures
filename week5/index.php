<?php

/*
    Object Oriented PHP
        Apache Logs - under /var/log/apache2 on nix/mac
            cat error.log
            tail -n 10 error.log
            tail -f error.log

        .htaccess (apache configuration files)

        error_log()

    Namespaces
    Lab - MVC (Model View Controller)
*/

// classes in PHP are defined using the 'class' keyword
class Student {
    private $studentId; // instance variables must start with $
    
    // php has visibility modifiers; public, protected, private
    // by default, without specifying, you get public visibility
    
    // to define a class constructor, create a function called __construct
    public function __construct($studentId) {

        // -> object operator, used to access object properties/methods
        $this->studentId = $studentId;
    }
    function getStudentId() {
        return $this->studentId;
    }
    protected function render() {

    }
};
$student1 = new Student('A12345678');
echo $student1->getStudentId();

/*
    PHP has inheritance, interfaces
*/
class FourthTermStudent extends Student {
    function doSomething() {
        $this->render(); // inherited from Student
    }
};

/*
    PHP has type checking, but ONLY for class methods, instance variables
*/
class Teacher {
    private int $salary; // must be an int
    private string $id; // must be a string

    // only accepts a string parameter and must return an int
    private function getSalary(string $salary): int {

    }
};

/*
    PHP has static methods and static properties - static methods and properties belong to the class itself, not instances
    Use the 'static' and :: (scope resolution operator)

    PHP has a 'parent' keyword and it can be used with :: to access properties/methods of the parent
*/
class Account {
    public static string $institutionNumber = '003';
    public string $type;

    function __construct() {
        // parent::__construct();
        $this->type = 'chequing';
    }
    function getType() {
        // Warning: undefined property - cannot access static variables from an instance context
        echo $this->institutionNumber; 
        echo $this::$institutionNumber; 
    }
};
echo "<br>" . Account::$institutionNumber; 

$account1 = new Account();
$account1->getType();


/*
    Namespaces

    If you have a long path, you can use the 'use' keyword to alias it to something shorter

    include
    include_once
    require
    require_once

    require_once('App/Program/Term/TermOne/Courses/Web.php');
    
    use App\Program\Term\TermOne\Courses\Web as Web;
    
    new Web();

    *If you are having trouble with include/require-ing relative paths, use __DIR__

    require_once(__DIR__ . '/../Models/Student.php)
    */
?>