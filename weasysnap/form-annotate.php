<?php 
//passing this into a html script elsewhere into this script
//<form action="form-annotate.php" method="post">
//<input type="text" name="selfxpress"><br>
//<input type="submit">
//</form>


function annotateImage($imagePath, $strokeColor, $fillColor) {
	$imagick = new \Imagick(realpath($imagePath));
	$timestamp = date('D:H:i:s');
	move_uploaded_file($_FILES['webcam']['tmp_name'], $timestamp.".jpg");
	// old variable $webcam = $_FILES['webcam']['tmp_name'];
	
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
	
	$imagick->writeImage ($timestamp.".jpg");
	
}

//annotateImage("rose.jpg", black, white)  // old way of calling line.


if ($_POST["selfxpress"]) {
	annotateImage($timestamp, black, white);
	
}



//if ($_POST["meme"]) {
//	annotateImage("rose.jpg", black, white)
//
//}

//
//if ($_POST["selfxpress"]) {
//	annotateImage("rose.jpg", black, white);

//}
?>