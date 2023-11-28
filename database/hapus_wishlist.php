<?php

include 'koneksi.php';

// menghapus wishlist
$id = $_GET['id'];


$result = mysqli_query($koneksi, "DELETE FROM wishlist_produk WHERE id=$id");

//Kondisi apakah berhasil atau tidak
if ($result)
{
    echo "<script>
            alert('Data anda berhasil di-hapus !');
    </script>";
    header("Location: ../wishlist_produk.php");
}
else
{
    echo "<script>
    alert('Data anda gagal di-hapus !');
</script>";
}




?>