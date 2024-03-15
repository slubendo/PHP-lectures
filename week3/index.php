<?php

// PHP built-in server
// php -S localhost:3000 in wsl

/*
    Depending on the form submission method any data will be available through one of the following super globals
    $_Post
    $_Get
    $_Server["REQUEST_METHOD"]

    note: all of the above are associate arrays. Arrays with keys like an object
    

*/

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Example: Display previously uploaded files
    // If the method is GET, we can output
    // echo <form></form>
    echo "<p>All Files:</p>";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Example: Display previously uploaded files
    // If the method is POST, we can output
    // echo <form></form>
    $user = $_POST["username"];
    echo "<p>Hey $user</p>";

    $file = $_FILES["testfiles"];
    if (isset($_FILES["testfiles"])) {
        echo "File Name: " . $file["name"] . "<br>";
        echo "Temporary File: " . $file["tmp_name"] . "<br>";
        echo "File Type: " . $file["type"] . "<br>";
        echo "File Size: " . $file["size"] . "<br>";
    }

    echo $file["type"];
    if ($file["type"] !== "text/plain") {
        echo "Error: only text files can be uploaded";
        die();
    } else {
        move_uploaded_file($file["tmp_name"], "./" . $file["name"]);
        // uniqid(); To create uniqueId for file
    }
    // Contains all the data of the uploaded files in an associative array. Has keys like: name, tmp_name, type, size
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST" enctype="multipart/form-data">
        <p>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username">
        </p>
        <p>
        <label for="username" >Username:</label>
        <input type="file" name="testfiles" id="testfiles">
        </p>
        <button type="Submit">Submit</button>
    </form>
</body>
</html>
