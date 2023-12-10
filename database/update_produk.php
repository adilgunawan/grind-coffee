<?php

//nyambungin ke db
include 'koneksi.php';

$id = $_POST['id'];

$nama = $_POST['nama'];
$slogan = $_POST['slogan'];
$deskripsi = $_POST['deskripsi'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];
$image = $_POST['image'];


$result = mysqli_query($koneksi, "UPDATE produk_kopi SET nama='$nama', harga='$harga', stok='$stok', deskripsi='$deskripsi', slogan='$slogan', image='$image' WHERE id='$id'");

//Kondisi apakah berhasil atau tidak
if ($result)
{
    echo "<script>
            alert('Data anda berhasil di-update !');
            document.location='../tokoku.php';
    </script>";
}
else
{
    echo "<script>
    alert('Data anda gagal di-update !');
</script>";
}

?>