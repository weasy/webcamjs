
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
           Webcam.upload( data_uri, 'index.php', function(code, text) {
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
	
	
	Meme Text: <form action="annotate.php" method="post">
<input type="text" name="selfxpressify"><br>
<input type="submit">
</form>
	
	<?php

	$type= $_FILES["tmp_name"]["type"];
	$error= $_FILES["tmp_name"]["error"];
	
	if($type!="image/jpg")
		{
			die();
			error_log("Not jpg");
		}
		
	else 
	{
		move_uploaded_file($_FILES['webcam']['tmp_name'], 'webcam.jpg'); //|| die;
	}

	
?>

</body>
</html>
