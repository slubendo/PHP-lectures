<?php

namespace Lab5App\Models;

require_once(__DIR__ . '/../Services/DBService.php');

use Lab5App\Services\DBService as DBService;

class Students {
    /*
        Implement the functionality described below for the static all(), create(), update(),
        and delete() functions, then move on to:

        Step 4: update the DBService.php file
    */

    public static function all() {
        /*
            Call the static connect() method of the DBService class, passing in the host (likely 'localhost')
            and name of your database

            *If* the connect() method returns true, return the result of calling the static all()
            method of the DBService class, passing in the table name ('students')
        */

         $connected = DBService::connect('localhost', 'phpLab5');

         // Check if connection is successful
         if ($connected) {
             // If connection is successful, call the static all() method of the DBService class, passing in the table name ('students')
             return DBService::all('students');
         } 
    }

    public static function create($name, $email) {
        /*
            Call the static connect() method of the DBService class, passing in the host (likely 'localhost')
            and name of your database

            *If* the connect() method returns true, call the static insert()
            method of the DBService class, passing in three arguments:
                The table name, i.e. 'students'
                An array of two column names (strings), 'name' and 'email'
                An array of two values, $name, and $email   
        */
        $connected = DBService::connect('localhost', 'phpLab5');

        if ($connected) {
            DBService::insert('students', ['name', 'email'], [$name, $email]);
        } 

    }

    public static function update($id, $name, $email) {
        /*
            Call the static connect() method of the DBService class, passing in the host (likely 'localhost')
            and name of your database

            *If* the connect() method returns true, call the static update()
            method of the DBService class, passing in three arguments:
                The table name, i.e. 'students'
                An array of three column names (strings), 'name' and 'email'
                An array of three values *IN ORDER*, $name, $email, and $id
        */

        $connected = DBService::connect('localhost', 'phpLab5');
        if ($connected) {
            DBService::update('students', ['name', 'email', 'id'], [$name, $email, $id]);
        } 

    }
    
    public static function delete($id) {
        /*
            Call the static connect() method of the DBService class, passing in the host (likely 'localhost')
            and name of your database

            *If* the connect() method returns true, call the static delete()
            method of the DBService class, passing in two arguments:
                The table name, i.e. 'students'
                The $id
        */

        $connected = DBService::connect('localhost', 'phpLab5');

        if ($connected) {
        DBService::delete('students', $id);
        }
    }
}

?>