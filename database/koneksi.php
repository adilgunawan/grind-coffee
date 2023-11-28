<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "grind_coffee";

    $koneksi = mysqli_connect($host, $user, $pass, $db);
    if (!$koneksi){
        echo "Gagal connect" . die(mysqli_error($koneksi));
    }
?>
