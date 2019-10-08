<?php
session_start();
$_SESSION['captcha'] = mt_rand(1000,9999);
$img = imagecreate(60,30);
$bg=imagecolorallocate($img,0,0,0);
$font='hard.ttf';
$textcolor=imagecolorallocate($img, 255, 255, 255);
imagettftext($img, 20, 10, 10, 30, $textcolor,$font, $_SESSION['captcha']);
header('content_type:image/jpeg');
imagejpeg($img);
imagedestroy($img);



?>