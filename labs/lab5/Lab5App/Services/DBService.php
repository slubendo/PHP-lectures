<?php

namespace Lab5App\Services;

class DBService {
    public static $connection;

    /*
        Ensure before proceeding that you have a 'students' table in a local mysql database.

        If not, issue the following command (either in the MySQL REPL, or your app of choice):
        create table students (id int not null primary key auto_increment, name varchar(255), email varchar(255));

        Once you have implemented the functionality described below, test your
        application using an HTML page or a RESTful API client (Postman is recommended)
        and send the following requests (with any necessary form data):

            GET students/all 
            POST students/create
            POST students/update
            POST students/delete
    */ 

    public static function connect($host, $database) {
        /*
            Use a try/catch block to create a new \PDO object, passing in the connection string
                "mysql:host=$host;dbname=$database;charset=UTF8"
            followed by the username and password

            In the try block, assign the PDO object to the static $connection property, then return true

            In the catch block, log/dump the error and return false

            e.g. 
            try {

            }
            catch (PDOException $e) {
                error_log($e);
                return false;
            }
        */
        $host = 'localhost';
        $database = 'phpLab5';
        try {
            self::$connection = new \PDO("mysql:host=$host;dbname=$database;charset=UTF8", "root", "root");
            return true;
        }
        catch (\PDOException $e) {
            error_log($e);
            return false;
        }
    }

    public static function insert($table, $cols, $vals) {{
        // Convert $cols array into a comma-separated string
        $columns = implode(", ", $cols);

        // Create parameterized SQL statement
        $sql = "INSERT INTO $table ($columns) VALUES (";
        $placeholders = array_fill(0, count($vals), '?');
        $sql .= implode(', ', $placeholders);
        $sql .= ")";

        try {
            // Prepare SQL statement
            $stmt = self::$connection->prepare($sql);

            // Execute statement with values
            $stmt->execute($vals);

            return true;
        } catch (\PDOException $e) {
            error_log($e);
            return false;
        }
    }
}

    public static function update($table, $cols, $vals)   {
        $columns = implode(',', $cols);
    
        $sql = "UPDATE $table SET $columns WHERE id = ?";
    
        try {
          $stmt = self::$connection->prepare($sql);
          $stmt->execute($vals);
          return true;
        } catch (\PDOException $e) {
          echo "Error: " . $e->getMessage();
          return false;
        }
    
        
        /*
                Create a parameterized UPDATE table statement using the $table, and column names in $cols,
                then call prepare() and execute() on the $connection property as above
            */
      }

    public static function delete($table, $val)  {
        $sql = "DELETE FROM $table WHERE id = ?";
        $stmt = self::$connection->prepare($sql);
        $stmt->execute([$val]);
        return true;
    
        /*
                Create a parameterized DELETE FROM table statement using $table, and the column names in $cols,
                then call prepare() and execute() on the $connection property as above
            */
      }

    public static function all($table)   {
        $sql = "SELECT * FROM $table";
        $statement = self::$connection->query($sql, \PDO::FETCH_ASSOC);
        $data = $statement->fetchAll();
        return $data;
        /*
                Create a SELECT * FROM $table statement,
                then call the query() method on the $connection property, passing in:
                    the sql string
                    the \PDO:FETCH_ASSOC constant, which ensures the results are returned as an associative array
                
                The query() method returns a PDO statement object - store that object in a variable, then
                call its fetchAll() method to get the actual array of rows
    
                Finally, return the array of rows
            */
      }
};

?>