<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    // If you mix html and php it must be in a file with a file.php extension
    // When a interpreter executes a file it looks only for opening and closing tags.

    // Syntax: EVERY STATEMENT ends with a semi-colon
    // variable names and functions are case sensitive. Nothing else is case sensitive
    // variable names must start with a $
    // variable names can contain letters numbers and underscores but cannot start with a number

    // echo - not a function. Make sure you use echo, allows multiple values. echo does not return a value
    // print - print you can only print one thing not multiple values. Print returns a value

    // Single and double quotes are not treated the same
        // single quotes print literally what is there
        // double quotes prints out the value
    ?>
    <h1>
        <?php echo "COMP 4515PHP"; "On Thursday"; ?>
    </h1>
    <?php echo "<h2>Hello</h2>"?>
    <?php
    $day = 'Thursday';
    echo '$day';
    echo "$day";
    echo $day;
    echo "<div>$day</div>";
// useful for debugging
    var_dump($day);
    print_r($day);
// operators
    // -, +, *, /, %
    // =, ==, ===
    // &&, || 
    // !, ?, ??
    ?>

<?php
// predifined variables
// super global (used without declarring) https://www.php.net/manual/en/reserved.variables.php
    // $_SERVER[] 

?>

</body>
</html>