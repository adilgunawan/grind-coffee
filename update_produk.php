<?php
include 'database/koneksi.php';

$id = $_GET["id"];
include 'templates/header.php';
// get data dari tabel users bedasarkan email yang sedang login
$query = mysqli_query($koneksi, "SELECT * FROM produk_kopi WHERE id='$id'");
$data = mysqli_fetch_assoc($query);

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
          <i class="fa-solid fa-edit"></i>
          <h5>Edit Produk Kopi</h5>
        </div>
        <hr class="garis" />

        <div class="" style="margin-top:1px;">
          <form action="database/update_produk.php" method="POST" onsubmit="return validasi()">
              <!-- <div class="uploadimage">
                <div class="iconimage">
                  <img src="images/addimage.png" alt="" />
                  <div class="iconimageupload">
                    <img src="images/addphoto.png" alt="" />
                    <h5>Upload foto</h5>
                  </div>
                </div>
              </div> -->

              <div>
                  <div class="inputprofil">
                      <input type="hidden" name="id" value="<?php echo $data["id"] ?>" type="text"  />
                    <div class="boxcontactus">
                      <label for="">Nama Produk*</label>
                      <input name="nama"value="<?php echo $data["nama"] ?>" type="text" placeholder="Nama Produk" />
                    </div>
                    <div class="boxcontactus">
                      <label for="">Slogan Produk*</label>
                      <input name="slogan" value="<?php echo $data["slogan"] ?>" type="text" placeholder="Nama Produk" />
                    </div>
                    <div class="boxcontactus">
                      <label for="">Deskripsi*</label>
                      <textarea name="deskripsi" value="" class="pesan" type="text" placeholder="Deskripsi Produk" ><?php echo $data["deskripsi"] ?></textarea>
                    </div>
                    <div style="display: flex; width:60%; gap:10px">
                      <div class="boxcontactus" >
                        <label for="">Harga Produk*</label>
                        <input name="harga" value="<?php echo $data["harga"] ?>" type="number" placeholder="Harga Produk" />
                      </div>
                      <div class="boxcontactus" >
                        <label for="">Stok Produk*</label>
                        <input name="stok" value="<?php echo $data["stok"] ?>" type="number" placeholder="Stok Produk" />
                      </div>
                      <div class="boxcontactus" >
                        <label for="">Image*</label>
                        <input name="image" value="<?php echo $data["image"] ?>" type="text" placeholder="Nama Image" />
                      </div>
                    </div>
                
                    <a><button style="background-color: #c56e33">Update Data</button></a>
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
       