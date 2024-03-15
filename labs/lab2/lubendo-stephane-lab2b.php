<?php

// File IO for command-line or web

// scandir()
// readdir()
// glob($pattern)
// $contents = scandir("./)
// var_dump($contents)

// basename(//fileName)

// is_file()
// is_dir()
// file_exist()
// $p = path
// file_get_contents($p)
// file_put_contents($p, data)
        // By default overwrites the entire file 
        // By default creates file if it doesn't exist
// file_put_contents($p, data, FILE_APPEND)
// rename($oldP, $newP)

// fopen()
// fread()
// fwrite()
// fread()



// command-line arguments
// php file.php --dir "./" -p


// php has command called argv that contains all the arguments passed when running the file 
// $argv[0]
// $argv[1]

// getopt($short, $long)
// if no : does not accept a value
// followed by : has a required value
// followed by :: has optional value
// $short("ab:c::)

// getopt vs argv

while (true) {
    $input = readline("Please choose from the menu below: \n 1. List Files \n 2. View file \n 3. Create File \n 4. Rename File \n Type 'Exit' to quit the program: ");

    if (strtolower($input) === 'exit') {
        echo "Exiting program...\n";
        break;
    } elseif ($input == "1") {
        $files = scandir('./'); 
        foreach ($files as $file) {
            echo "$file\n";
        }
    } elseif ($input == '2') {

        $fileName = readline("Enter the name of the file you want to view: ");
        if (file_exists($fileName)) {
            echo file_get_contents($fileName);
        } else {
            echo "File not found.\n";
        }
    } elseif ($input == '3') {

        $fileName = readline("Enter the name of the file you want to create: ");
        if (!file_exists($fileName)) {
            fopen($fileName, 'w');
            echo "File '$fileName' created successfully.\n";
        } else {
            echo "File '$fileName' already exists.\n";
        }
    } elseif ($input == '4') {

        $currentFileName = readline("Enter the name of the file you want to rename: ");
        $newFileName = readline("Enter the new name for the file: ");
        if (file_exists($currentFileName)) {
            if (!file_exists($newFileName)) {
                rename($currentFileName, $newFileName);
                echo "File '$currentFileName' renamed to '$newFileName'.\n";
            } else {
                echo "A file with the name '$newFileName' already exists.\n";
            }
        } else {
            echo "File '$currentFileName' not found.\n";
        }
    } else {
        echo "Invalid input. Please choose a valid option.\n";
    }
}


?>
