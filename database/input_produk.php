
<?php

//nyambungin ke db
include 'koneksi.php';

  $nama = $_POST["nama"];
  $harga = $_POST["harga"];
  $stok = $_POST["stok"];
  $image = $_POST["image"];
  $slogan = $_POST["slogan"];
  $deskripsi = $_POST["deskripsi"];
  $category = $_POST["category"];

  
  $query = mysqli_query($koneksi, "INSERT INTO produk_kopi VALUES(NULL, '$nama', '$harga', '$stok','$deskripsi', '$slogan', '$image', '$category' )");
  

  if ($query){
    echo "Data Berhasil Disimpan";
    header("Location: ../tokoku.php");
    // exit();
  }
  else{
      echo"Gagal Disimpan";
  }

?>