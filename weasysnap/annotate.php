<?php

// convert flower.jpg -rotate 45 flower_rotate45.jpg

$resource = NewMagickWand();
MagickReadImage( $resource, 'small_flower.jpg' );

MagickRotateImage( $resource, null, -45 );

header( 'Content-Type: image/gif' );
MagickEchoImageBlob( $resource );

?>
