<?php

include 'koneksi.php';

// menghapus produj
$id = $_GET['id'];


$result = mysqli_query($koneksi, "DELETE FROM produk_kopi WHERE id=$id");

//Kondisi apakah berhasil atau tidak
if ($result)
{
    echo "<script>
            alert('produk anda berhasil di-update !');
    </script>";
    header("Location: ../tokoku.php");
}
else
{
    echo "<script>
    alert('Data anda gagal di-update !');
</script>";
}




?>