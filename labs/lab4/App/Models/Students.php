<?php

namespace App\Models;

class Students {
    /*
        Instructions for the Students class

        1. Create a public static method named all that returns an array of associative arrays.
            Each associative array should have the following keys and values:
                - id: a unique integer
                - name: a string
                - email: a string
    */

    public static function all() {
        return [
            ["id" => 1, "name" => "Stephane", "email" => "slubendo@bcit.ca"],
            ["id" => 2, "name" => "Chris", "email" => "charris@bcit.ca"],
            ["id" => 3, "name" => "Jerry", "email" => "jfan@bcit.ca"]
        ];
    }



}

?>

