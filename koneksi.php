<?php
    $con=mysqli_connect('localhost', 'root', '', 'pertanianbeta');
    if (!$con) {
        echo "Error: " . mysqli_connect_error();
        exit();
    }
    //echo 'Koneksi berhasil';
?>