<?php

use App\Models\Students; 


/*

    Instructions for students.php

    1. Use include to include the header.php file from the includes directory.
    2. Use a foreach loop to iterate over the $students array.
        For each iteration, use echo to output the name and email of the student.
    3. Use include to include the footer.php file from the includes directory.

*/

// 1. Include the header.php file
include('includes/header.php'); 

// 2. Populate the $students array from the Students class
require_once '../Models/Students.php'; // Adjust the path as needed

// Retrieve the student data
$students = Students::all(); 

// Loop through the $students array and echo name and email
foreach ($students as $student) {
    echo "Name: {$student['name']}<br>";
    echo "Email: {$student['email']}<br><br>";
}

// 3. Include the footer.php file
include('includes/footer.php');
?>
