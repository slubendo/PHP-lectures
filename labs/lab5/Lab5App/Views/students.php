<?php

include('includes/header.php');

foreach ($students as $student) {
    echo "<tr><td>{$student['id']}</td><td>{$student['name']}</td><td>{$student['email']}</td></tr>";
}

include('includes/footer.php');

?>