<?php

header("Content-Type: image/png"); //telling the browser that we want to serve a file instead of a html/text

$img = imagecreatefrompng("test.png");
$w = imagesx($img);
$h = imagesy($img);

$red = imagecolorallocate($img,255,0,0);
$white = imagecolorallocate($img,255,255,255);

$img2 =  imagecreatetruecolor($w,$h);
imagefill($img,$startX,$startY, $red); //fill the canvas with color


// $img = imagerotate($img,45, $white);

/*
imagecopy(
    GdImage $dst_image,
    GdImage $src_image,
    int $dst_x,
    int $dst_y,
    int $src_x,
    int $src_y,
    int $src_width,
    int $src_height
): bool
*/

imagecopy($img, $img2, 0,0,0,0, $w, $h);

imagepng($img);
imagedestroy($img);