<?php
session_start();

// Pastikan user sudah login sebelum mengakses halaman ini
if (!isset($_SESSION['email'])) {
  // kalau belum login, biarkan style kosong
    $buttonLoginStyle = ''; 
   
} else {
  // kalau sudah login, maka hilangkan button
  $buttonLoginStyle = 'display:none'; 
}

if (!isset($_SESSION['email'])){
  $buttonLogoutStyle = 'display:none';
} else {
  $buttonLogoutStyle = '';
}

if ($_SESSION['role'] !== "1"){
  $buttonTokokuStyle = 'display:none';
}

$email = $_SESSION['email'];

//nyambungin ke db
include 'database/koneksi.php';

// get data dari tabel users bedasarkan email yang sedang login
$query = mysqli_query($koneksi, "SELECT * FROM users WHERE email='$email'");
$profil = mysqli_fetch_assoc($query);
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="assets/style.css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Rufina&display=swap"
      rel="stylesheet"
    />
    <script
      src="https://kit.fontawesome.com/aa225e1aa6.js"
      crossorigin="anonymous"
    ></script>

    <title>Grind Coffe</title>
  </head>
  <body>
    <nav>
      <div class="posisilogo">
        <a href="index.php"
          ><img
            src="images/grindcoffee-high-resolution-logo-white-on-transparent-background.png"
            alt=""
            class="gambarlogo"
          />
        </a>
      </div>
      <div class="textheader">
        <a href="aboutus.php"><h3>About Us</h3></a>
        <a href="menukopi.php"><h3>Menu</h3></a>
        <a href="contactus.php"><h3>Kontak</h3></a>
        <a href="profil.php"><h3>Profil</h3></a>
        <a href="tokoku.php" style="<?php echo $buttonTokokuStyle; ?>"><h3>TokoKu</h3></a>
        <a href="wishlist_produk.php"><i class="fa-solid fa-heart" style="color: white"></i></a>
        <a href="keranjang.php"
          ><i class="fa-solid fa-cart-shopping" style="color: white"></i
        ></a>
        <a id="btnLogin" style="<?php echo $buttonLoginStyle; ?>" href="login.php"><h3>Login</h3></a>
        <a href="profil.php"><h3><?php echo $profil["first_name"];?><span style="margin-left:17px">|</span></h3></a>
        <a href="#" style="<?php echo $buttonLogoutStyle;?>" onclick="logout()" ><h3>Logout </h3></a>
      </div>
    </nav>

    <script language="Javascript">
      function logout() {
        if (confirm("Yakin ingin logout?") == true) {
          window.location.href = "./database/logout.php";
          } else {
            return false;
          }
      }
    </script>



