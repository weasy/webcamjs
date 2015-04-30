
<?php
   $picin = new Imagick(rose.jpg);
   $picin->scaleimage(800,0);
   $height = $picin->getimageheight();

   $draw = new ImagickDraw();
   $draw->setFillColor('#ffff00');
   $draw->setFont('Eurostile');
   $draw->setFontSize(21);
   $draw->setTextUnderColor('#ff000088');
   $picin->annotateImage($draw,40,$height-10,0,"Hallo");

   $picin->writeimage($pic6);
?>
