
<?php
session_start();

// Pastikan user sudah login sebelum mengakses halaman ini
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
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
            <hr />
          </div>
          <div class="menu">
            <i class="fa-solid fa-heart"><h5>Wishlist Produk</h5></i>
          </div>
        </div>
      </div>

      <div class="isiprofil">
        <div class="alamat">
          <i class="fa-solid fa-clipboard-list"></i>
          <h5>Pesanan Saya</h5>
        </div>
        <hr class="garis" />
        <div class="roundeditem">
          <button class="rounded">Semua</button>
          <button class="rounded1">Belum Bayar</button>
          <button class="rounded2">Menunggu Pengiriman</button>
          <button class="rounded">Dikemas</button>
          <button class="rounded">Dikirim</button>
          <button class="rounded">Selesai</button>
        </div>
        <div class="boxpesanan">
          <div class="jarakiconshop">
            <div class="iconshop">
              <i class="fa-solid fa-shop"></i>
              <h3>Grind Coffee</h3>
            </div>
            <div class="belumbayar">
              <h3>BELUM BAYAR</h3>
            </div>
          </div>
          <div></div>
          <div class="garispesanan"></div>
          <div class="productpesanan">
            <div class="imageproductpesanan">
              <img src="images/matcha.png" alt="" />
              <div class="textproductpesanan">
                <h3>Matcha Latte-Grind Coffee</h3>
                <h5>x1</h5>
              </div>
            </div>
            <div class="hargaitem">
              <h3>RP.30.000,00</h3>
            </div>
          </div>
          <div class="garispesanan"></div>
          <div class="totalharga">
            <h3>Total Pesanan: RP.30.000,00</h3>
            <button class="button1">Bayar Sekarang</button>
            <button class="button2">Batalkan Pesanan</button>
          </div>
        </div>
        <div class="boxpesanan">
          <div class="jarakiconshop">
            <div class="iconshop">
              <i class="fa-solid fa-shop"></i>
              <h3>Grind Coffee</h3>
            </div>
            <div class="belumbayar">
              <h3>BELUM BAYAR</h3>
            </div>
          </div>
          <div></div>
          <div class="garispesanan"></div>
          <div class="productpesanan">
            <div class="imageproductpesanan">
              <img src="images/matcha.png" alt="" />
              <div class="textproductpesanan">
                <h3>Matcha Latte-Grind Coffee</h3>
                <h5>x1</h5>
              </div>
            </div>
            <div class="hargaitem">
              <h3>RP.30.000,00</h3>
            </div>
          </div>
          <div class="garispesanan"></div>
          <div class="totalharga">
            <h3>Total Pesanan: RP.30.000,00</h3>
            <button class="button1">Bayar Sekarang</button>
            <button class="button2">Batalkan Pesanan</button>
          </div>
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