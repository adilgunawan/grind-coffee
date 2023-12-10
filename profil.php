<?php

include 'templates/header.php';
// Pastikan user sudah login sebelum mengakses halaman ini
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

$email = $_SESSION['email'];

//nyambungin ke db
include 'database/koneksi.php';

// get data dari tabel users bedasarkan email yang sedang login
$query = mysqli_query($koneksi, "SELECT * FROM users WHERE email='$email'");
$profil = mysqli_fetch_assoc($query);

// var_dump($profil["first_name"]);


?>

    <section class="content_profil">
        <div class="sectionprofil">
          <div class="leftbarmenu">
            <div class="namaprofil">
              <i class="fa-regular fa-circle-user"><h5><?php echo $profil["first_name"]; echo " "; echo $profil["last_name"]?></h5></i>
            </div>
            <div class="menuleftbar">
              <div class="menu">
                <a  style="text-decoration:none; color:inherit" href="profil.php"><i class="fa-regular fa-circle-user"><h5>Profil</h5></i></a>
              </div>
              <hr />
              <div class="menu">
                <a style="text-decoration:none; color:inherit" href="daftaralamat.php"><i class="fa-solid fa-address-book"><h5>Daftar Alamat</h5></i></a>
              </div>
              <div class="menu">
                <a style="text-decoration:none; color:inherit" href="pesanansaya.php"> <i class="fa-solid fa-clipboard-list"><h5>Pesanan Saya</h5></i> </a>
              </div>
              <div class="menu">
                <a style="text-decoration:none; color:inherit" href="wishlist_produk.php"> <i class="fa-solid fa-heart"><h5>Daftar wishlist</h5></i> </a>
              </div>
            </div>
          </div>

          <div class="isiprofil">
            <div class="myprofil">
              <h5>My profil</h5>
            </div>
            <hr />
            <div class="uploadimage">
              <div class="iconimage">
                <img src="images/addimage.png" alt="" />
                <div class="iconimageupload">
                  <img src="images/addphoto.png" alt="" />
                  <h5>Upload foto</h5>
                </div>
              </div>

              
              
              <form action="database/update_profil.php" method="POST" onsubmit="return validasi()">
              <div class="inputprofil">
                <div class="fullname">
                  <label>First Name</label>
                  <input name="first_name" value="<?php echo $profil["first_name"] ?>" type="text" />
                </div>
                <div class="fullname">
                  <label>Last Name</label>
                  <input name="last_name" value="<?php echo $profil["last_name"] ?>" type="text" />
                </div>
                <div class="fullname">
                  <label>Email</label>
                  <input readonly name="email" value="<?php echo $profil["email"] ?>" type="text" />
                </div>
                <div class="notelp">
                  <div class="fullname">
                    <label for="">No.Telp</label>
                    <input name="no_telp" value="<?php echo $profil["no_telp"] ?>" type="text" />
                  </div>
                  <!-- <div class="fullname">
                    <label for="">Password</label>
                    <input name="password" value="" type="password" />
                  </div> -->
                  <div class="fullname">
                  <label>Birth Date</label>
                  <input name="birth_date" value="<?php echo $profil["birth_date"] ?>" type="date" />
                </div>
                <div class="fullname">
                  <label></label>
                  <input name="first_name" hidden value="<?php echo $profil["first_name"] ?>" type="text" />
                </div>
                </div>
                <div class="" style="margin-top: -10px">
                    <div class="boxcontactus" style="width:90%;">
                    <label style="font-weight: 800">Masukkan Alamat</label>
                          <textarea name="alamat" style="padding:1rem" class="pesan" type="text" placeholder="Alamat" ><?php echo $profil['alamat']?></textarea>
                    </div>
                </div>

                
                <button>Update Data</button>
              </div>
              </form>
            </div>
          </div>
        </div>
    </section>

<?php 
include 'templates/footer.php';
?>
