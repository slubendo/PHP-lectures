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
?>
