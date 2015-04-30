<?php 
$draw = new \ImagickDraw();
$outputImage = new \Imagick('meme.jpg');

$draw->setFillColor('#fff');
$draw->setFont('impact.ttf');
$draw->setFontSize(40);
$draw->setGravity(\Imagick::GRAVITY_NORTH);
$draw->setStrokeColor('#000');
$draw->setStrokeWidth(1);
$draw->setStrokeAntialias(true);
$draw->setTextAntialias(true);

$outputImage->annotateImage($draw, 0, 5, 0, 'Sample text');

$outputImage->setFormat('png');
$outputImage->writeimage('tmp/meme.png');



?>