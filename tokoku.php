<?php
include 'templates/header.php';
// Pastikan user sudah login sebagai admin sebelum mengakses halaman ini
if (!isset($_SESSION['email']) || ($_SESSION['role'] !== "1")) {
    header("Location: ./login.php");
    exit();
}
//nyambungin ke db
include 'database/koneksi.php';


?>


    <div class="sectionprofil">
      <div class="leftbarmenu">
        <div class="namaprofil">
          <i class="fa-regular fa-circle-user"><h5>Admin</h5></i>
        </div>
        <div class="menuleftbar">
          <div class="menu">
            <i class="fa-solid fa-shop"><h5>Toko Ku</h5></i>
          </div>
          <hr />
          <div class="menu">
            <a style="text-decoration:none; color:inherit" href="input_produk.php"> <i class="fa-solid fa-plus"><h5>Input Produk Kopi</h5></i></a>
          </div>
         
        </div>
      </div>

      <div class="isiprofil">
        <div class="alamat">
          <i class="fa-solid fa-list"></i>
          <h5>List Produk Kopi</h5>
        </div>
        <hr class="garis" />

        <div class="table">
          <table>
            <thead>
              <tr>
              <td>Gambar</td>
              <td>Nama Produk</td>
              <td>Harga</td>
              <td>Stok</td>
              <td>Slogan</td>
              <!-- <td>Deskripsi</td> -->
              <td>Aksi</td>
              </tr>
            </thead>

              
        <?php 
        $query3 = mysqli_query($koneksi, "SELECT * FROM produk_kopi");
        while($data = mysqli_fetch_assoc($query3)){
        ?>

        <tr>
          <td><img style="width:60px; height:auto" src="images/<?php echo $data["image"]?>" alt="" /> </td>
          <td><?php echo $data["nama"]?></td>
          <td><?php echo $data["harga"]?></td>
          <td><?php echo $data["stok"]?></td>
          <td><?php echo $data["slogan"]?></td>
          <!-- <td><?php echo $data['deskripsi']?></td> -->
          <td style="display:flex; gap: 8px">
            <div><a style="text-decoration: none; color:inherit" href="database/hapus_produk.php?id=<?php echo $data["id"];?>" onclick="hapus_produk()"><i class="fa-solid fa-trash"></i> </a></div>
            <div><a style="text-decoration: none; color:inherit"  href="update_produk.php?id=<?php echo $data["id"];?>"> <i class="fa-solid fa-edit"></i> </a></div>
          </td>
        </tr>

        <?php }?>
          </table>
          <script language="Javascript">
        function hapus_produk() {
          if (confirm("Yakin ingin menghapus dari daftar produk?") == true) {
            window.location.href = "database/hapus_produk.php";
            } else {
              return false;
            }
        }
      </script>
          
        </div> 
      </div>
    </div>
    <br />
    <br />
    <br />
    <br />
    <?php
include 'templates/footer.php';
?>