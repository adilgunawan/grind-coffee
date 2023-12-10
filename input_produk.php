<?php
include 'templates/header.php';

// Pastikan user sudah login sebagai admin sebelum mengakses halaman ini
if (!isset($_SESSION['email']) || ($_SESSION['role'] !== "1")) {
  header("Location: ./login.php");
  exit();
}



?>


    <div class="sectionprofil">
      <div class="leftbarmenu">
        <div class="namaprofil">
          <i class="fa-regular fa-circle-user"><h5>Admin</h5></i>
        </div>
        <div class="menuleftbar">
          <div class="menu">
           <a href="tokoku.php"><i class="fa-solid fa-shop"><h5>Toko Ku</h5></i></a> 
          </div>
          <div class="menu">
          <a href="input_produk.php"> <i class="fa-solid fa-plus"><h5>Input Produk Kopi</h5></i></a>
          </div>
          <hr />
          
        </div>
      </div>

      <div class="isiprofil">
        <div class="alamat">
          <i class="fa-solid fa-plus"></i>
          <h5>Input Produk Kopi</h5>
        </div>
        <hr class="garis" />

        <div class="" style="margin-top:1px;">
          <form action="database/input_produk.php" method="POST" onsubmit="return validasi()">
              <div class="uploadimage">
                <div class="iconimage">
                  <img src="images/addimage.png" alt="" />
                  <div class="iconimageupload">
                    <img src="images/addphoto.png" alt="" />
                    <h5>Upload foto</h5>
                  </div>
                </div>
              </div>

              <div>
                  <div class="inputprofil">
                    <div class="boxcontactus">
                      <label for="">Nama Produk*</label>
                      <input name="nama" type="text" placeholder="Nama Produk" />
                    </div>
                    <div class="boxcontactus">
                      <label for="">Slogan Produk*</label>
                      <input name="slogan" type="text" placeholder="Slogan Produk" />
                    </div>
                    <div class="boxcontactus">
                      <label for="">Deskripsi*</label>
                      <textarea name="deskripsi" class="pesan" type="text" placeholder="Deskripsi Produk" ></textarea>
                    </div>
                    <div style="display: flex; width:60%; gap:10px">
                      <div class="boxcontactus" >
                        <label for="">Harga Produk*</label>
                        <input name="harga" type="number" placeholder="Harga Produk" />
                      </div>
                      <div class="boxcontactus" >
                        <label for="">Stok Produk*</label>
                        <input name="stok" type="number" placeholder="Stok Produk" />
                      </div>
                      <div class="boxcontactus" >
                        <label for="">Image*</label>
                        <input name="image" s type="file" placeholder="Nama image" />
                      </div>
                    </div>
                    <div class="boxcontactus"> 
                    <label for="">Jenis Produk*</label>
                      <select name="category" style="background-color:#31452c; color:white; padding:15px; border-radius:10px">
                          <option value="minuman">Minuman</option>
                          <option value="biji_kopi">Biji Kopi</option>
                          <option value="merchandise">Merchandise</option>
                      </select>
                    </div>
                
                    <button style="background-color: #c56e33">Update Data</button>
                  </div>
              </div>
          </form>   
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