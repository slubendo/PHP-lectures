<?php

header("Content-Disposition: attachment; filename=test2.png"); // make the file available for download right away

$img = imagecreatetruecolor(400,400);
$red = imagecolorallocate($img,255,0,0);
// $transparent_red = imagecolorallocatealpha($img,255,0,0, 64);
$white = imagecolorallocate($img,255,255,255);