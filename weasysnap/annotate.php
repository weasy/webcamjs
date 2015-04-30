<?php
$resource = NewMagickWand();
MagickReadImage( $resource, ‘image_1.jpg’ );

header( ‘Content-Type: image/jpeg’ );
MagickEchoImageBlob( $resource );

?>