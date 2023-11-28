
<?php
session_start();

// Pastikan user sudah login sebelum mengakses halaman ini
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

$id = $_GET["id"];

//nyambungin ke db
include 'database/koneksi.php';

$query = mysqli_query($koneksi, "SELECT * FROM produk_kopi WHERE id='$id'");
while($data = mysqli_fetch_assoc($query)){
  $produk_id = $id;
  $nama = $data["nama"];
  $harga = $data["harga"];
  $stok = $data["stok"];
  $image = $data["image"];
  $slogan = $data["slogan"];

  var_dump($data);

  $query2 = mysqli_query($koneksi, "INSERT INTO wishlist_produk VALUES(NULL, '$produk_id', '$nama', '$harga','$stok', '$image', '$slogan' )");
  

  if ($query2){
    echo "Data Berhasil Disimpan";
    header("Location: wishlist_produk.php");
    exit();
  }
  else{
      echo"Gagal Disimpan";
  }

}


include 'templates/header.php';
?>


    <div class="sectionprofil">
      <div class="leftbarmenu">
        <div class="namaprofil">
          <i class="fa-regular fa-circle-user"><h5>Adil Gunawan</h5></i>
        </div>
        <div class="menuleftbar">
          <div class="menu">
            <i class="fa-regular fa-circle-user"><h5>Profil</h5></i>
          </div>
          <div class="menu">
            <i class="fa-solid fa-address-book"><h5>Daftar Alamat</h5></i>
          </div>
          <div class="menu">
            <i class="fa-solid fa-clipboard-list"><h5>Pesanan Saya</h5></i>
          </div>
          <div class="menu">
            <i class="fa-solid fa-clipboard-list"><h5>Wishlist Produk </h5></i>
          </div>
          <hr />
        </div>
      </div>

      <div class="isiprofil">
        <div class="alamat">
          <i class="fa-solid fa-clipboard-list"></i>
          <h5>Wishlist Produk Saya</h5>
        </div>
        <hr class="garis" />

        
        <?php 
        $query3 = mysqli_query($koneksi, "SELECT * FROM wishlist_produk");
        while($data3 = mysqli_fetch_assoc($query3)){
        ?>
        <div class="boxpesanan">
          <div class="jarakiconshop">
            <div class="iconshop">
              <i class="fa-solid fa-shop"></i>
              <h3>Grind Coffee</h3>
            </div>
            <div class="belumbayar">
              <h3>Produk Detail</h3>
            </div>
          </div>
          <div></div>
          <div class="garispesanan"></div>
          <div class="productpesanan">
            <div class="imageproductpesanan">
            <img src="images/<?php echo $data3["image"]?>" alt="" />
              <div class="textproductpesanan">
                <h3><?php echo $data3["nama"]?></h3>
                <h5>x1</h5>
              </div>
            </div>
            <div class="hargaitem">
              <h3>Rp. <?php echo $data3["harga"]?></h3>
            </div>
          </div>
          <div class="garispesanan"></div>
          <div class="totalharga">
            <h3>Total Wishlist: Rp <?php echo $data3["harga"]?></h3>
            <a href="product_detail.php?id=<?php echo $data3['produk_id']?>"><button class="button1">Lihat Detail</button></a>
            <a href="database/hapus_wishlist.php?id=<?php echo $data3['id'];?>" onclick="hapus_wishlist()"><button class="button2">Batalkan Wishlist</button></a>
          </div>
        </div>
        <?php }?>

      <script language="Javascript">
        function hapus_wishlist() {
          if (confirm("Yakin ingin menghapus dari daftar wishlist?") == true) {
            window.location.href = "database/hapus_wishlist.php";
            } else {
              return false;
            }
        }
      </script>
    
      </div>


    </div>
    <br />
    <br />
    <br />
    <br />
    <?php
include 'templates/footer.php';
?>