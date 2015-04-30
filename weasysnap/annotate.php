<?php // script_2.php

$resource = NewMagickWand();
MagickReadImage( $resource, ‘image_1.jpg’ );

$width = MagickGetImageWidth( $resource );
$height = MagickGetImageHeight( $resource );
echo “Image size, in pixels, is:  width $width x height $height”;

?>