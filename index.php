<?php
require_once 'vendor/autoload.php';

use Colorizzar\ChangeColor;

$changeColor = new ChangeColor('icon.png');
if(!isset($_REQUEST['color'])){
    $color = '#e74c3c';
    $name = 'icon-e74c3c';
}else{
    $color = '#' . $_REQUEST['color'];
    $name = 'icon-' . $_REQUEST['color'];
}

//From Red Hexadecimal
$changeColor->setFromHex('#000000');
$changeColor->setToHex($color);
// Will create 'blue.png' in new_cars/ folder
$changeColor->colorizeKeepAplhaChannnel('icons/' . $name . '.png');

$im = imagecreatefrompng('icons/' . $name . '.png');
header('Content-Type: image/png');
imagealphablending($im, false);
imagesavealpha($im, true);
$transparent = imagecolorallocatealpha($im, 255, 255, 255, 127);
imagepng($im);
imagedestroy($im);

