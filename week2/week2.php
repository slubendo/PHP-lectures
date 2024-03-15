<?php 

/*

    Variables

    Variable names must start with $, can contain letters, numbers, underscore, but cannot start with a number
    PHP is weakly typed

    In PHP constants are created using the define() function

    define("MIN", 0);
    define("MAX", 255);

    Data Types:
    string
        single quotes and double quotes are treated differently
        strlen()
        explode() - split a string into an array based on a delimiter
        is_numeric()
        ctype_alpha() - checking if a character is alphabetic
        str_contains() - check if a substring is in a given string

    int
    float
    bool
    null

    Operator:
    . used for string concatenation

    Useful Functions:
    gettype() - get the data type currently stored in a variable
    
    Conversion functions:
    is_string()
    is_int()
    is_float()
    is_bool()

    is_null() / isset() / empty()

*/
$day = "Thursday";
/* 
    PHP_EOL - predefined constant that prints a new line
    In HTML, typically use <br> instead \n or PHP_EOL
*/
// echo 'Today is $day' . PHP_EOL; // print Today is $day
// echo "Today is $day\n"; // print Today is Thursday
// echo "Today is {$day}\n";  // {} is the 'complex' string syntax, allows us to also output array keys and object properties

$today = "Today is Thursday January 18th 2024";
echo gettype($today) . PHP_EOL;

$today = explode(" ", $today); // returns an array
// for debugging, printing values
// var_dump()
// print_r()
// print_r($today);

echo ctype_alpha('é'); // if false, no output - if true 1 is output
echo ctype_alpha('t') . PHP_EOL;

/*
    Arrays can optionally have keys in PHP (but generally you should avoid mixing string/numeric indices)
*/
$cities = ['Vancouver', 'Richmond', 'Burnaby'];
// access values using square bracket notation and numeric indices

$schools = [
    "Vancouver" => "BCIT",
    "North Vancouver" => "Capilano",
    "Burnaby" => "BCIT",
    2 => "UBC"
];
echo $schools['Vancouver'] . PHP_EOL;

print_r($schools);

echo $schools[2] . PHP_EOL;

$courses = [
    'COMP 4515',
    'COMP 3456',
    'COMP 4567'
];
$courses[6] = 'COMP 6789';
print_r($courses);

array_push($courses, "COMP 1234");
print_r($courses);

// count() - returns the length of an array
// implode() - joins array elements with a string
$course_string = implode(" ", $courses);
echo $course_string . PHP_EOL;

/*
    Loops

    for ($i = 0; $i < count($courses); $i++) {

    }
    foreach ($courses as $course) {

    }
    while () {

    }

    Conditional statements
    if () {

    }
    else if () {

    }
    else {

    }

    Ternary conditional statement
    $passed = $grade > 50 ? "yes" : "no";

*/

/*
    Functions

*/
function f($param, $param2 = "default", ...$args) {
    echo "$param $param2 " . implode(" ", $args) . PHP_EOL;
};
f("1", "2", "3", "4", "5");

/*
    PHP is pass-by-value
*/
$number = 12;

$double = function($num) {
    $num = $num * 2;
    echo $num . PHP_EOL;
};
$double($number); // print 24

/* because the VALUE of $number is passed into the function by default, not the entire variable,
it is not permanently changed */
echo $number . PHP_EOL; // prints 12

/*
    How to pass a variable by reference, not value
*/
$number2 = 10;
$triple = function(&$num) {
    $num = $num * 3;
    echo $num . PHP_EOL;
};
$triple($number2);
echo $number2 . PHP_EOL;

/*
    Arrow function syntax
*/
$g = fn($param1) => $param1 * $param1;

/*
    To get user input from the terminal, use readline()
*/
$favorite = readline("Please enter your favorite number: ");
echo $favorite, gettype($favorite);

echo "End of script";

?>