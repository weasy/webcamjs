<!doctype html>

<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>WebcamJS Test Page</title>
	<style type="text/css">
		body { font-family: Helvetica, sans-serif; }
		h2, h3 { margin-top:0; }
		form { margin-top: 15px; }
		form > input { margin-right: 15px; }
		#results { float:right; margin:20px; padding:20px; border:1px solid; background:#ccc; }
	</style>
</head>
<body>
	<div id="results">Your captured image will appear here...</div>
	
	<h1>WebcamJS Test Page</h1>
	<h3>Demonstrates simple 320x240 capture &amp; display</h3>
	
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
	<script language="JavaScript">
function take_snapshot() {
   Webcam.snap( function(data_uri) {
            // snap complete, image data is in 'data_uri'
           Webcam.upload( data_uri, 'snap.php', function(code, text) {
                // Upload complete!
                // 'code' will be the HTTP response code from the server, e.g. 200
                // 'text' will be the raw response content
                alert( "Upload complete: " + code + ": " + text );
           } );
       } );
}
</script>
	
<?php
move_uploaded_file($_FILES['webcam']['tmp_name'], 'webcam.jpg') || die;

echo "success";

?>

</body>
</html>
