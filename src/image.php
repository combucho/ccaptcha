<?php

require_once 'Card.php';

session_start();
define('FILENAME', 'res/cards.png');
define('W', 91);
define('H', 137);

$i = $_GET['card'];
$cards = array();
$cards = $_SESSION['cards'];

$info = getimagesize(FILENAME);
$width = $info[0];
$height = $info[1];
$type = $info[2];

switch ($type) {
    case 1:
        $image = imagecreatefromgif(FILENAME);
        imagesavealpha($image, true);
        break;
    case 2:
        $image = imagecreatefromjpeg(FILENAME);
        break;
    case 3:
        $image = imagecreatefrompng(FILENAME);
        imagesavealpha($image, true);
        break;
}

switch ($cards[$i]->getFace()) {
    case 'six':
        $x = W * 0;
        break;
    case 'seven':
        $x = W * 1;
        break;
    case 'eight':
        $x = W * 2;
        break;
    case 'nine':
        $x = W * 3;
        break;
    case 'ten':
        $x = W * 4;
        break;
    case 'jack':
        $x = W * 5;
        break;
    case 'queen':
        $x = W * 6;
        break;
    case 'king':
        $x = W * 7;
        break;
    case 'ace':
        $x = W * 8;
        break;
}

switch ($cards[$i]->getSuit()) {
    case '&#9825':  // hearts
        $y = H * 0;
        break;
    case '&#9826':  // diamonds
        $y = H * 1;
        break;
    case '&#9827':  // clubs
        $y = H * 2;
        break;
    case '&#9824':  // spades
        $y = H * 3;
        break;
}

$tmp = imagecreatetruecolor(W, H);

if ($type == 1 || $type == 3) {
    imagealphablending($tmp, true);
    imagesavealpha($tmp, true);
    $transparent = imagecolorallocatealpha($tmp, 0, 0, 0, 127);
    imagefill($tmp, 0, 0, $transparent);
    imagecolortransparent($tmp, $transparent);
}

imageCopyResampled($tmp, $image, 0, 0, $x, $y, $width, $height, $width, $height);
header("Content-type: image/png");
imagepng($tmp);
imagedestroy($image);
imagedestroy($tmp);