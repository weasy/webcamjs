<?php
move_uploaded_file($_FILES['webcam']['tmp_name'], 'webcam.jpg') || die;

echo "success";

?>