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
    $min = 0;
    $max = 255;
    $currentDate = date("l F jS Y");

    $dateMessage = "Today is $currentDate";
    $messageArr = explode(" ", $dateMessage);

    for ($i = 0; $i < count($messageArr); $i++) {
        $r = mt_rand($min, $max);
        $g = mt_rand($min, $max);
        $b = mt_rand($min, $max);

    echo "<p class='fz-l' style='color: rgb($r, $g, $b);'>" . $messageArr[$i] . "</p>";
    }
?>

</body>
</html>