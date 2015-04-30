<?php

$draw = new \ImagickDraw();
$outputImage = new \Imagick('meme.jpg');
$draw->setFillColor('#fff');
$draw->setFont('impact.ttf');
$draw->setFontSize(100); //use a large font-size
$draw->setGravity(\Imagick::GRAVITY_NORTH);
$draw->setStrokeColor('#000');
$draw->setStrokeWidth(1);
$draw->setStrokeAntialias(true);
$draw->setTextAntialias(true);

$outputImage->annotateImage($draw, 0, 5, 0, 'Sample text');
$outputImage->setFormat('png');
$outputImage->writeimage('tmp/meme.png');


//Create text
$draw->setFillColor('#fff');
$textOnly = new Imagick();
$textOnly->newImage(1400,400, "transparent");  //transparent canvas/
$textOnly->annotateImage($draw, 21, 101, 0, 'STOP ME FROM MEMEING');  //parameters depend of stroke and text size
//Create stroke
$draw->setFillColor('#000'); //same as stroke color
$draw->setStrokeColor('#000');
$draw->setStrokeWidth(8);
$strokeImage = new Imagick();
$strokeImage->newImage(1400,400, "transparent");
$strokeImage->annotateImage($draw, 20, 100, 0, 'STOP ME FROM MEMEING');

//Composite text over stroke
$strokeImage->compositeImage($textOnly, imagick::COMPOSITE_OVER, 0, 0, Imagick::CHANNEL_ALPHA );
$strokeImage->trimImage(0);  //cut transparent border
$strokeImage->resizeImage(300,0, imagick::FILTER_CATROM, 0.9, false); //resize to final size
/*
 Now you can compositve over the image
*/
//Clean up
$draw->clear();
$draw->destroy();
$strokeImage->clear();
$strokeImage->destroy();
$textOnly->clear();
$textOnly->destroy();