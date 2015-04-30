<?php
  $magick_wand=NewMagickWand();
  MagickReadImage($magick_wand,'rose.jpg');
  $drawing_wand=NewDrawingWand();
  DrawSetFont($drawing_wand,"/usr/share/fonts/bitstream-vera/Vera.ttf");
  DrawSetFontSize($drawing_wand,20);
  DrawSetGravity($drawing_wand,MW_CenterGravity);
  $pixel_wand=NewPixelWand();
  PixelSetColor($pixel_wand,"white");
  DrawSetFillColor($drawing_wand,$pixel_wand);
  if (MagickAnnotateImage($magick_wand,$drawing_wand,0,0,0,"Rose") != 0)
    {
      MagickEchoImageBlob( $magick_wand );
    }
  else
    {
      echo MagickGetExceptionString($magick_wand);
    }
?>
