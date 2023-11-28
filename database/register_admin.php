<?php

//untuk penghubung dengan file koneksi
include "koneksi.php";

//cara memasukan data yang dikirim dari form
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$password = $_POST['password'];
$no_telp = $_POST['no_telp'];
$birth_date = $_POST['birth_date'];
$is_admin = $_POST['is_admin'];

$password = password_hash($password, PASSWORD_DEFAULT);



//Menginput data ke tabel
$hasil = mysqli_query($koneksi, "INSERT INTO users (id, first_name, last_name, email, no_telp, birth_date, password, is_admin)
VALUES (NULL, '$firstname', '$lastname', '$email', '$no_telp', '$birth_date', '$password', '$is_admin')");




//Kondisi apakah berhasil atau tidak
if ($hasil)
{
    echo "<script>
            alert('Anda Berhasil Register !');
            document.location='../login.php';
            </script>";
}
else
{
    echo "<script>
    alert('Registrasi Anda Gagal !');
    document.location='../register.html';
</script>";
}
?>