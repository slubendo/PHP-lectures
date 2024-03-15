<?php

namespace App\Controllers;

class Controller {
    /*
        Instructions for the Controller class

        1. Create a protected method named render that takes two arguments:
            - $template (a string)
            - $data (an associative array with a default value of an empty array)

        2. Inside the render method, pass the $data array to the extract function. This will create variables from the keys in the array.

        3. Include the template file using the include statement. Use the __DIR__ magic constant to help specify the relative path to the Views directory, and target the file ending in .php whose name is the value of the $template argument.
            e.g. /Views/$template.php

    */

    protected function render($template, $data = []) {
        // Extract data to variables
        extract($data);

        // Include the template file
        $path = __DIR__ . "/../Views/{$template}.php";
        if (file_exists($path)) {
            include($path);
        } else {
            echo "Template file not found: $template";
        }
    }
}

?>
