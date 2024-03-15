<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@800&display=swap" rel="stylesheet"> 
    <style>
        body {
            font-family: 'Barlow', sans-serif;
        }
        .fz-l {
            font-size: 4em;
            margin: 10px;
            line-height: 1;
        }
    </style>
</head>
<body>
<?php
        $name;

        while (true) {
            $name = readline("Enter a name: ");

            if (!empty($name) && preg_match('/[a-zA-Z]/', $name) && !ctype_digit($name)) {
                echo "Valid name entered: $name" . PHP_EOL;
                break;
            } else {
                echo "Invalid name. Please enter a name containing a mix of alphabet and numeric characters, but not consisting only of numeric characters." . PHP_EOL;
            }
        }

        $userInput;

        while (true) {
            $userInput = readline("Please enter a single alphabet character:");

            if (ctype_alpha($userInput) && strlen($userInput) === 1) {
                break;
            } else {
                echo "Invalid input! Please enter a single alphabet character." . PHP_EOL;
            }
        }

        echo "You entered: $userInput" . PHP_EOL;

        if (strpos($name, $userInput) !== false) {
            echo "The letter '$userInput' is found in the entered name." . PHP_EOL;
        } else {
            echo "The letter '$userInput' is not found in the entered name." . PHP_EOL;
        }

        $quote;

        while (true) {
            $quote = readline("Enter a quote: ");

            if (!empty($quote)) {
                echo "Valid quote entered: $quote" . PHP_EOL;
                $wordsArray = explode(' ', $quote);
                echo "Array of words: ";
                print_r($wordsArray);
                break;
            } else {
                echo "Invalid quote. Please enter a non-empty quote." . PHP_EOL;
            }
        }
?>

</body>
</html>