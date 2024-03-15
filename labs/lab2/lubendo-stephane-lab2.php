<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    
    echo $file["type"];
    if ($file["type"] !== "text/plain") {
        echo "Error: only text files can be uploaded";
        die();
    } else {
        $file = $_FILES["testfiles"];
        if (isset($_FILES["testfiles"])) {
            echo "File Name: " . $file["name"] . "<br>";
            echo "Temporary File: " . $file["tmp_name"] . "<br>";
            echo "File Type: " . $file["type"] . "<br>";
            echo "File Size: " . $file["size"] . "<br>";
        }
        move_uploaded_file($file["tmp_name"], "./uploads/" . $file["name"]);

    }
}


$dir = "./uploads";
$file_list = glob($dir . "/*");

if (count($file_list) == 0) {
    echo "no files have been uploaded";
} else {
    echo "<ul>";
    foreach ($file_list as $file_path) {
        $file_name = basename($file_path);
        echo "<li><a href='uploads/$file_name'>$file_name</a></li>";
        echo "<pre>" . file_get_contents($file_path) . "</pre>";
    }
    echo "</ul>";
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
        <label for="username" >File:</label>
        <input type="file" name="testfiles" id="testfiles">
        </p>
        <button type="Submit">Upload File</button>
    </form>
</body>
</html>
