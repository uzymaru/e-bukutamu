<?php

$nama_file = 'fau_'.time().'.jpg';
$direktori = 'upload/guest/';
$target = $direktori.$nama_file;

move_uploaded_file($_FILES['webcam']['tmp_name'], $target);

echo "<pre>";
print_r($_FILES);
echo "</pre>";

?>