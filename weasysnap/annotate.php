
<?php

// convert flower.jpg -fill white -box "#00770080" -gravity South -pointsize 20 -annotate +0+5 "   Flower  " flower_annotate2.jpg

$resource = NewMagickWand();
$dwand = NewDrawingWand();
$pwand = NewPixelWand();

PixelSetColor($pwand, "white");
DrawSetFont($dwand, "/usr/share/fonts/msttcorefonts/verdana.ttf");
DrawSetFontSize($dwand, 20);
DrawSetFillColor($dwand, $pwand);

DrawSetGravity($dwand, MW_SouthGravity);

MagickReadImage( $resource, 'small_flower.jpg' );

if( MagickAnnotateImage( $resource, $dwand, 0, 0, 0, "Flower" ) )
{
  header( 'Content-Type: image/gif' );
  MagickEchoImageBlob( $resource );
}
else
{
  echo MagickGetExceptionString($resource);
}

?>
