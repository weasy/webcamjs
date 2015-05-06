<?php 
echo "test";

function annotateImage($imagePath, $strokeColor, $fillColor) {
	$imagick = new \Imagick(realpath($imagePath));

	
	$draw = new \ImagickDraw();
	$draw->setStrokeColor($strokeColor);
	$draw->setFillColor($fillColor);

	$draw->setStrokeWidth(1);
	$draw->setFontSize(36);
	 
	$text = $_POST["selfxpress"];

	$draw->setFont("/usr/share/fonts/msttcorefonts/impact.ttf");
	$draw->setgravity(imagick::GRAVITY_SOUTH);
	$imagick->annotateimage($draw, 0, 0, 0, $text);
	header("Content-Type: image/jpg");
	echo $imagick->getImageBlob();
	//setting saved file type here. Use date(); to save file with timestamp.jpg
	$imagick->setimageformat("jpeg");
	$timestamp = date('D:H:i');
	$fileToWrite = "tmp/".$timestamp.".jpg";
	$imagick->writeImage ($fileToWrite);
	return $fileToWrite;
	//$imagick->writeImage ("tmp/".$timestamp.".jpg");
	
}

    //if ($_POST["selfxpress"]) {
	//annotateImage("webcam.jpg", black, white);
	//echo "tmp/" . $timestamp . ".jpg";
//}

if ($_POST["selfxpress"]) {
	$imageLocation = annotateImage("webcam.jpg", black, white);
	echo '<img src="' . $imageLocation . '" />';
}
echo "test!!!";

?>