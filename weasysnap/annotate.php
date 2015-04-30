
<?php

// convert flower.jpg -font courier -fill white -pointsize 20 -annotate +50+50 Flower flower_annotate1.jpg

$resource = NewMagickWand();
$dwand = NewDrawingWand();
$pwand = NewPixelWand();

PixelSetColor($pwand, "black");
DrawSetFont($dwand, "/usr/share/fonts/msttcorefonts/verdana.ttf");
DrawSetFontSize($dwand, 20);
DrawSetFillColor($dwand, $pwand);

MagickReadImage( $resource, 'small_flower.jpg' );

if( MagickAnnotateImage( $resource, $dwand, 0, 0, 0, "Text" ) )
{
  header( 'Content-Type: image/gif' );
  MagickEchoImageBlob( $resource );
}
else
{
  echo MagickGetExceptionString($resource);
}

?>
