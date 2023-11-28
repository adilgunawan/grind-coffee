<?php
session_start();

//untuk penghubung dengan file koneksi
include "koneksi.php";

//cara memasukan data yang dikirim dari form
$email = $_POST['email'];
$password = $_POST['password'];

// cek apakah email user terdaftar pada database
$hasil = mysqli_query($koneksi, "SELECT * FROM users WHERE email = '$email' ");

// cek email
if (mysqli_num_rows ($hasil)===1){
    //cek pass
    $row = mysqli_fetch_assoc($hasil); 
 


    if (password_verify($password, $row['password'])){
        $_SESSION['email'] = $row['email'];
        $_SESSION['role'] = $row['is_admin'];
        $_SESSION['user_id'] = $row['id'];
        echo "<script>
        alert('Anda Berhasil Login !');
        document.location='../index.php';
        </script>";

    } 
    else
    {
        echo "<script>
        alert('Login Anda Gagal !');
        </script>";
    }
}