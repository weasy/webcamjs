<?php 
$imagepath = 'rose.jpg';

function annotateImage($imagePath, $strokeColor, $fillColor) {
	$imagick = new \Imagick(realpath($imagePath));

	$draw = new \ImagickDraw();
	$draw->setStrokeColor($strokeColor);
	$draw->setFillColor($fillColor);

	$draw->setStrokeWidth(1);
	$draw->setFontSize(36);
	 
	$text = "TESTING";

	$draw->setFont("/usr/share/fonts/msttcorefonts/verdanai.ttf");
	$imagick->annotateimage($draw, 40, 40, 0, $text);

	header("Content-Type: image/jpg");
	echo $imagick->getImageBlob();
}

?>