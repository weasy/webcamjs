<?php 

function annotateImage($imagePath, $strokeColor, $fillColor) {
	$imagick = new \Imagick(realpath($imagePath));

	$draw = new \ImagickDraw();
	$draw->setStrokeColor($strokeColor);
	$draw->setFillColor($fillColor);

	$draw->setStrokeWidth(1);
	$draw->setFontSize(36);
	 
	$text = "NO!!!!!";

	$draw->setFont("/usr/share/fonts/msttcorefonts/impact.ttf");
	$draw->setgravity(imagick::GRAVITY_SOUTH);
	$imagick->annotateimage($draw, 0, 0, 0, $text);

	header("Content-Type: image/jpg");
	echo $imagick->getImageBlob();
	//setting saved file type here
	$imagick->setimageformat("jpeg");
	//unlink($your_file);
	$imagick->imageWriteFile (fopen ("test_2.jpg", "wb"));
}
//outside of function I have to save the image file
annotateImage("rose.jpg", black, white);

?>