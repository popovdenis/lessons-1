<?php
/**
 * Created by PhpStorm.
 * User: Denis
 * Date: 21.10.2015
 * Time: 1:21
 */
session_start();

$image = imagecreatefromjpeg('images.jpg');
$color = imagecolorallocate($image, 65, 65, 65);
imageantialias($image, true);
$nChars = 7;
$randStr = substr(md5(uniqid()), 0, $nChars);

$_SESSION['randStr'] = $randStr;

$x = 35;
$y = 95;
$deltaX = 40;
for ($j = 0; $j < $nChars; $j++) {
    $size = rand(19, 50);
    $angle = -25 + rand(0, 75);
    imagettftext($image, $size, $angle, $x, $y, $color, 'ariaLn.ttf', $randStr[$j]);
    $x += $deltaX;
}
header('Content-Type: image/jpeg');
imagejpeg($image, null, 50);