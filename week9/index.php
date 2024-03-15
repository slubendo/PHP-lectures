<?php

// Generating Images in PHP and Laravel
// GD is the image/graphics library in php

// Need to edit your php.ini
// To find the loaded configuration you can type php --ini


header("Content-Type: image/png"); //telling the browser that we want to serve a file instead of a html/text

$img = imagecreatetruecolor(400,400);

$red = imagecolorallocate($img,255,0,0);
// $transparent_red = imagecolorallocatealpha($img,255,0,0, 64);
$white = imagecolorallocate($img,255,255,255);

// imagestring(imgHandle, fontsize, startx, starty string, color)
imagestring($img,5,5,5, "Comp4515", $white);

$startX = 0;
$startY = 0;
imagefill($img,$startX,$startY, $red); //fill the canvas with color
imagePNG($img); //create the png 
imagePNG($img, "test.png");
imagedestroy($img); // free up space 

// _________________ Drawing

