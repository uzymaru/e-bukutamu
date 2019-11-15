<?php

$nama_file = 'fau_'.time().'.jpg';
$direktori = 'upload/guest/';
$target = $direktori.$nama_file;

// move_uploaded_file($_FILES['webcam']['tmp_name'], $target);
if(move_uploaded_file($_FILES['webcam']['tmp_name'],$target))
        echo "Upload file berhasil...<br>
        Nama file: {$_FILES['webcam']['name']}<br>
        Ukuran: {$_FILES['webcam']['size']} byte";

    else

    echo "Upload file gagal...<br><a href=\"upload.html\">Kembali</a>";
?>