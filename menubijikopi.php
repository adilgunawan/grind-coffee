<?php
include 'templates/header.php';

// Pastikan user sudah login sebelum mengakses halaman ini
if (!isset($_SESSION['email'])) {
  header("Location: login.php");
  exit();
}


?>
    <div class="posisibannertengah">
      <div class="bannertengah">
        <img src="images/image 138.png" alt="" />
      </div>
    </div>

    <div class="pilihankategori">
      <div class="product1">
        <a href="menukopi.php">
          <div class="productbg">
            <img src="images/Rectangle 7.png" alt="" />
          </div>
        </a>
        <h1>KOPI</h1>
        <div class="rectanglemenu1"></div>
        <div class="triangledown1"></div>
      </div>
      <div class="product1">
        <a href="menubijikopi.php">
          <div class="productbg">
            <img src="images/Rectangle 7 (1).png" alt="" />
          </div>
        </a>
        <h1>BIJI KOPI</h1>
        <div class="rectanglemenu"></div>
        <div class="triangledown"></div>
      </div>
      <div class="product1">
        <a href="menumerch.php">
          <div class="productbg">
            <img src="images/Rectangle 7 (2).png" alt="" />
          </div>
        </a>
        <h1>MERCH</h1>
        <div class="rectanglemenu1"></div>
        <div class="triangledown1"></div>
      </div>
    </div>

    <div class="itemproducts">
      <?php
       include 'database/koneksi.php';

       $query = mysqli_query($koneksi, "SELECT * FROM produk_kopi WHERE jenis_produk='biji_kopi'");
       
       while($data = mysqli_fetch_assoc($query)){
       ?> 

        <div class="box">
          <div style="overflow:hidden">
            <img  src="images/<?php echo $data["image"]?>" alt="" />
          </div>
          <h1><?php echo $data['nama'];?></h1>
          <h5><?php echo $data['slogan'];?></h5>
          <h2 style="text-align: center">Rp <?php echo $data['harga'];?></h2>
          <div class="tersisa">
            <h6>Tersisa <?php echo $data['stok'];?> buah</h6>
            <i class="fa-regular fa-square-minus"></i>
            <i class="fa-regular fa-square-plus"></i>
          </div>
          <div class="posisirating">
            <div class="rating">
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
            </div>
            <div class="btnbeli">
              <a href='product_detail.php?id=<?php echo $data['id']?>'
                ><button class="btnbelis"><h3>Beli Sekarang</h3></button></a
              >
              <button class="btnkeranjang">
                <h3>Masukkan Keranjang</h3>
                <i class="fa-solid fa-cart-shopping"></i>
              </button>
            </div>
          </div>
        </div>

        <?php 
       }
      ?>
        <!-- <div class="box">
          <div>
            <img src="images/foto2.png" alt="" />
          </div>
          <h1>Biji Kopi Dark Roast</h1>
          <h5>100% Biji Kopi Panggang Pilihan</h5>
          <h2>RP. 30.000.00</h2>
          <div class="tersisa">
            <h6>Tersisa 20 buah</h6>
            <i class="fa-regular fa-square-minus"></i>
            <i class="fa-regular fa-square-plus"></i>
          </div>
          <div class="posisirating">
            <div class="rating">
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
            </div>
            <div class="btnbeli">
              <a href="product.html"
                ><button class="btnbelis"><h3>Beli Sekarang</h3></button></a
              >
              <button class="btnkeranjang">
                <h3>Masukkan Keranjang</h3>
                <i class="fa-solid fa-cart-shopping"></i>
              </button>
            </div>
          </div>
        </div>
        <div class="box">
          <div>
            <img src="images/foto3.png" alt="" />
          </div>
          <h1>Biji Kopi Luwak</h1>
          <h5>100% Biji Kopi Luwak Pilihan</h5>
          <h2>RP. 30.000.00</h2>
          <div class="tersisa">
            <h6>Tersisa 20 buah</h6>
            <i class="fa-regular fa-square-minus"></i>
            <i class="fa-regular fa-square-plus"></i>
          </div>
          <div class="posisirating">
            <div class="rating">
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
            </div>
            <div class="btnbeli">
              <a href="product.html"
                ><button class="btnbelis"><h3>Beli Sekarang</h3></button></a
              >
              <button class="btnkeranjang">
                <h3>Masukkan Keranjang</h3>
                <i class="fa-solid fa-cart-shopping"></i>
              </button>
            </div>
          </div>
        </div>
      </div>

      <div class="itemproducts">
        <div class="box">
          <div>
            <img src="images/foto4.png" alt="" />
          </div>
          <h1>Biji Kopi Excelsa</h1>
          <h5>100% Biji Kopi Excelsa Pilihan</h5>
          <h2>RP. 30.000.00</h2>
          <div class="tersisa">
            <h6>Tersisa 20 buah</h6>
            <i class="fa-regular fa-square-minus"></i>
            <i class="fa-regular fa-square-plus"></i>
          </div>
          <div class="posisirating">
            <div class="rating">
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
            </div>
            <div class="btnbeli">
              <a href="product.html"
                ><button class="btnbelis"><h3>Beli Sekarang</h3></button></a
              >
              <button class="btnkeranjang">
                <h3>Masukkan Keranjang</h3>
                <i class="fa-solid fa-cart-shopping"></i>
              </button>
            </div>
          </div>
        </div>
        <div class="box">
          <div>
            <img src="images/foto5.png" alt="" />
          </div>
          <h1>Biji Kopi Robusta</h1>
          <h5>100% Biji Kopi Robusta Pilihan</h5>
          <h2>RP. 30.000.00</h2>
          <div class="tersisa">
            <h6>Tersisa 20 buah</h6>
            <i class="fa-regular fa-square-minus"></i>
            <i class="fa-regular fa-square-plus"></i>
          </div>
          <div class="posisirating">
            <div class="rating">
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
            </div>
            <div class="btnbeli">
              <a href="product.html"
                ><button class="btnbelis"><h3>Beli Sekarang</h3></button></a
              >
              <button class="btnkeranjang">
                <h3>Masukkan Keranjang</h3>
                <i class="fa-solid fa-cart-shopping"></i>
              </button>
            </div>
          </div>
        </div>
        <div class="box">
          <div>
            <img src="images/foto6.png" alt="" />
          </div>
          <h1>Biji Kopi Liberika</h1>
          <h5>100% Biji Kopi Liberika Pilihan</h5>
          <h2>RP. 30.000.00</h2>
          <div class="tersisa">
            <h6>Tersisa 20 buah</h6>
            <i class="fa-regular fa-square-minus"></i>
            <i class="fa-regular fa-square-plus"></i>
          </div>
          <div class="posisirating">
            <div class="rating">
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
            </div>
            <div class="btnbeli">
              <a href="product.html"
                ><button class="btnbelis"><h3>Beli Sekarang</h3></button></a
              >
              <button class="btnkeranjang">
                <h3>Masukkan Keranjang</h3>
                <i class="fa-solid fa-cart-shopping"></i>
              </button>
            </div>
          </div>
        </div>
      </div>

      <div class="itemproducts">
        <div class="box">
          <div>
            <img src="images/foto7.png" alt="" />
          </div>
          <h1>Biji Kopi Toraja</h1>
          <h5>
            100% Biji Kopi Arabika Klaten Kopi nya Berasal Dari Dataran Tinggi
          </h5>
          <h2>RP. 30.000.00</h2>
          <div class="tersisa">
            <h6>Tersisa 20 buah</h6>
            <i class="fa-regular fa-square-minus"></i>
            <i class="fa-regular fa-square-plus"></i>
          </div>
          <div class="posisirating">
            <div class="rating">
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
            </div>
            <div class="btnbeli">
              <a href="product.html"
                ><button class="btnbelis"><h3>Beli Sekarang</h3></button></a
              >
              <button class="btnkeranjang">
                <h3>Masukkan Keranjang</h3>
                <i class="fa-solid fa-cart-shopping"></i>
              </button>
            </div>
          </div>
        </div>
        <div class="box">
          <div>
            <img src="images/foto8.png" alt="" />
          </div>
          <h1>Biji Kopi Gayo</h1>
          <h5>
            100% Biji Kopi Arabika Klaten Kopi nya Berasal Dari Dataran Tinggi
          </h5>
          <h2>RP. 30.000.00</h2>
          <div class="tersisa">
            <h6>Tersisa 20 buah</h6>
            <i class="fa-regular fa-square-minus"></i>
            <i class="fa-regular fa-square-plus"></i>
          </div>
          <div class="posisirating">
            <div class="rating">
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
            </div>
            <div class="btnbeli">
              <a href="product.html"
                ><button class="btnbelis"><h3>Beli Sekarang</h3></button></a
              >
              <button class="btnkeranjang">
                <h3>Masukkan Keranjang</h3>
                <i class="fa-solid fa-cart-shopping"></i>
              </button>
            </div>
          </div>
        </div>
        <div class="box">
          <div>
            <img src="images/foto9.png" alt="" />
          </div>
          <h1>KOPI JOS YOGYAKARTA</h1>
          <h5>
            100% Biji Kopi Arabika Klaten Kopi nya Berasal Dari Dataran Tinggi
          </h5>
          <h2>RP. 30.000.00</h2>
          <div class="tersisa">
            <h6>Tersisa 20 buah</h6>
            <i class="fa-regular fa-square-minus"></i>
            <i class="fa-regular fa-square-plus"></i>
          </div>
          <div class="posisirating">
            <div class="rating">
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
            </div>
            <div class="btnbeli">
              <a href="product.html"
                ><button class="btnbelis"><h3>Beli Sekarang</h3></button></a
              >
              <button class="btnkeranjang">
                <h3>Masukkan Keranjang</h3>
                <i class="fa-solid fa-cart-shopping"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <div class="posisiselanjutnya">
        <button>Selanjutnya --></button>
      </div>
    </div> -->
    <br />
    <br />
    
    <?php
    include 'templates/footer.php';
    ?>