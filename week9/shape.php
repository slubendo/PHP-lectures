<?php

header("Content-Type: image/png"); //telling the browser that we want to serve a file instead of a html/text


$img = imagecreatetruecolor(400,400);

$red = imagecolorallocate($img,255,0,0);
$white = imagecolorallocate($img,255,255,255);

imagefill($img,$startX,$startY, $white); //fill the canvas with color

/*
imagefilledarc(
    GdImage $image,
    int $center_x,
    int $center_y,
    int $width,
    int $height,
    int $start_angle,
    int $end_angle,
    int $color,
    int $style
): bool
*/

imagefilledarc($img, 200, 200, 200, 200, 180, 0, $red, 0);
imagePNG($img); //create the png 

