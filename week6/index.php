<?php

// Postman or Insomnia for testing lab 5

/*
    The MySQL PHP library is an older library for interacting with MySQL
    MySQLi (MySQLi, i for improved) updated, add new functionality (e.g. prepared statements)
    
    We will use PDO (PHP Data Objects) - PDO supports most types of databases (including file-based dbs like sqlite), and has an abstraction layer (i.e. regardless of the type of db used, the commands are the same)
*/

/*

    index.php (via .htaccess)
    
    [App] namespace App
        [Controllers] namespace App\Controllers
            StudentsController   --> new App\Controllers\StudentController
        [Models] namespace App\Models
        [Views] namespace App\Views
        Router.php

*/

/*   
If lab 4 or 5 generate 500 (application) errors, check the apache logs

/var/log/apache2/error.log              
tail -f /var/log/apache2/error.log   <-- interactive log output
*/

/*
    The connection string contains the db type, the host and database name


    $connectionString = "mysql:host=

*/


// new PDO($connectionString, $user, $password);
// new \PDO($connectionString, $user, $password); // inside namespace, the \ is required before the class name for built-in classes

$host = "localhost"; // 127.0.0.1
$dbname = "comp4515";
$connection = new PDO("mysql:host=$host;dbname=$dbname", "chris", "");


// try {
//     $connection = new PDO("mysql:host=$host;dbname=$dbname", "chris", "");
//     // var_dump($connection);
// }
// catch (PDOException $e) {
//     echo $e->getMessage(); // returns the error message
// }

/*
    Run a simple SQL query

    exec() is for statements that do not return a value (e.g. INSERTS)
    query() is for statements that *do* return a value (e.g. SELECT)
*/
// $sql = "SELECT * FROM students";
// $result = $connection->query($sql); // returns a PDOStatementObject
// $rows = $result->fetchAll(); // returns an associative array ([col] => val)
// // or use ->fetch() to return the next row

// foreach ($rows as $row) {
//     echo "<p>ID: {$row['id']} NAME: {$row['name']} EMAIL: {$row['email']}</p>";
// }


/*

    Prepared Statement - a parameterized SQL query
        Two reasons why to use prepared statements:
            Efficient (for queries that need to be run repeatedly)
            Prevents SQL injection

    $sql = "INSERT INTO $table VALUES (id, name, email)"

    replacing the column values with placeholders
    $sql = "INSERT INTO $table VALUES (?,?,?)"

    public static function create($id, $name, $email) {
        $sql = "INSERT INTO $table () VALUES (?,?,?)";
        
        self::$connection->prepare($sql)->execute($id, $name, $email);  // Not ok, execute expects a single argument

        self::$connection->prepare($sql)->execute([$id, $name, $email]);
    }
*/

function create($table, $cols, $values) {
    $columns = implode(",", $cols);
    $sql = "INSERT INTO $table ($columns) VALUES (?,?)";  

    // $connection->prepare($sql)->execute([...$values]);
}

/*
    create table students (
        id int not null unique primary_key
        name varchar(255)
        email varchar(255)
    )

*/

create("students", ['name', 'email'], ['jeremy', 'jholman@bcit.ca']);

?>