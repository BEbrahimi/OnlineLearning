<?php
//session_start();
//header('Content-text:image/png');
//$_SESSION['captcha'] = rand(1000,9999);
//
//if (isset($_SESSION['captcha'])){
//    $nums = $_SESSION['captcha'];
//    $width = 200;
//    $height = 30;
//    $image = imagecreate($width,$height);
//    imagecolorallocate($image,255,255,255);
//    $number_color = imagecolorallocate($image,0,0,0);
//    $number_size = 22;
//    $angle = 10;
//    $font = './times.ttf';
//    imagettftext($image,$number_size,$angle,10,10,$number_color,$font,$nums);
//    imagepng($image);
//    imagedestroy($image);
//
//}
header('Content-Type: image/png');

// Create the image
$im = imagecreatetruecolor(400, 30);

// Create some colors
$white = imagecolorallocate($im, 255, 255, 255);
$grey = imagecolorallocate($im, 128, 128, 128);
$black = imagecolorallocate($im, 0, 0, 0);
imagefilledrectangle($im, 0, 0, 399, 29, $white);

// The text to draw
$text = 'Testing...';
// Replace path by your own font path
$font = 'arial.ttf';

// Add some shadow to the text
imagettftext($im, 20, 0, 11, 21, $grey, $font, $text);

// Add the text
imagettftext($im, 20, 10, 10, 10, $black, $font, $text);

// Using imagepng() results in clearer text compared with imagejpeg()
imagepng($im);
imagedestroy($im);