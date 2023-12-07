
<?php
#nyambungin file ini ke database
include 'koneksi.php';

$first_name = $_POST['first_name'];
var_dump($first_name);
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$no_telp = $_POST['no_telp'];
$birth_date = $_POST['birth_date'];
$alamat = $_POST['alamat'];


$result = mysqli_query($koneksi, "UPDATE users SET first_name='$first_name', last_name='$last_name',email='$email', no_telp='$no_telp', birth_date='$birth_date', alamat='$alamat' WHERE email='$email'");

//Kondisi apakah berhasil atau tidak
if ($result)
{
    echo "<script>
            alert('Data anda berhasil di-update !');
            document.location='../profil.php';
            </script>";
}
else
{
    echo "<script>
    alert('Data anda gagal di-update !');
</script>";
}


?>