<!doctype html>

<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Selfxpress</title>
	<style type="text/css">
		body { font-family: Helvetica, sans-serif; }
		h2, h3 { margin-top:0; }
		form { margin-top: 15px; }
		form > input { margin-right: 15px; }
		#results { float:right; margin:20px; padding:20px; border:1px solid; background:#ccc; }
	</style>
</head>
<body>
	<div id="results">Preview your image here:</div>
	
	<h1>Selfxpress, meme your face!</h1>
	<h3>Take a photo, then type out your meme on your face!</h3>
	
	<div id="my_camera"></div>
	
	<!-- First, include the Webcam.js JavaScript Library -->
	<script type="text/javascript" src="../webcam.js"></script>
	
	<!-- Configure a few settings and attach camera -->
	<script language="JavaScript">
		Webcam.set({
			width: 320,
			height: 240,
			image_format: 'jpeg',
			jpeg_quality: 90
		});
		Webcam.attach( '#my_camera' );
	</script>
	
	
	<!--  putting script in now! -->
	
	<form>
    <input type=button value="Take Snapshot" onClick="take_snapshot()">
</form>

	<script language="JavaScript">
function take_snapshot() {
   Webcam.snap( function(data_uri) {
            // snap complete, image data is in 'data_uri'
           Webcam.upload( data_uri, 'upload2.php', function(code, text) {
                // Upload complete!
                // 'code' will be the HTTP response code from the server, e.g. 200
                // 'text' will be the raw response content
               // alert( "Upload complete: " + code + ": " + text );     
           } );
           document.getElementById('results').innerHTML = 
				'<h2>Here is your image:</h2>' + 
				'<img src="'+data_uri+'"/>';         
       } );
}
</script>
	
	
	Meme Text: <form action="upload2.php" method="post">
<input type="text" name="selfxpress"><br>
<input type="submit">
</form>
	
	<?php
move_uploaded_file($_FILES['webcam']['tmp_name'], 'webcam.jpg');

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

</body>
</html>
