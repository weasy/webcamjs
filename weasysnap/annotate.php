<?php 

function annotateImage($imagePath, $strokeColor, $fillColor) {
	$imagick = new \Imagick(realpath($imagePath));

	$draw = new \ImagickDraw();
	$draw->setStrokeColor($strokeColor);
	$draw->setFillColor($fillColor);

	$draw->setStrokeWidth(1);
	$draw->setFontSize(36);
	 
	$text = "today's quote";

	$draw->setFont("/usr/share/fonts/msttcorefonts/impact.ttf");
	$imagick->setgravity(8);
	$imagick->annotateimage($draw, 40, 0, 0, $text);

	header("Content-Type: image/jpg");
	echo $imagick->getImageBlob();
}

annotateImage("rose.jpg", black, white)

?>