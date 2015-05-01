


<?php 

function annotateImage($imagePath, $strokeColor, $fillColor) {
	$imagick = new \Imagick(realpath($imagePath));

	$draw = new \ImagickDraw();
	$draw->setStrokeColor($strokeColor);
	$draw->setFillColor($fillColor);

	$draw->setStrokeWidth(1);
	$draw->setFontSize(36);
	 
	$text = $_POST["meme"];

	$draw->setFont("/usr/share/fonts/msttcorefonts/impact.ttf");
	$draw->setgravity(imagick::GRAVITY_SOUTH);
	$imagick->annotateimage($draw, 0, 0, 0, $text);

	header("Content-Type: image/jpg");
	echo $imagick->getImageBlob();
}

//annotateImage("rose.jpg", black, white)

if ($_POST["meme"]) {
	annotateImage("rose.jpg", black, white);
	
}

?>

<html>
<body>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
Name: <input type="text" name="meme"><br>
<input type="submit">
</form>
</body>
</html>