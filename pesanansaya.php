<?php
include 'templates/header.php';

// Pastikan user sudah login sebelum mengakses halaman ini
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}



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
        <div class="sectionbox">
            <div class="roundedbox"><button>Semua</button></div>
            <!-- <div class="roundedbox1"><button>Belum Bayar</button></div> -->
            <div class="roundedbox2"><button>Menunggu Pengiriman</button></div>
            <div class="roundedbox"><button>Dikemas</button></div>
            <div class="roundedbox"><button>Dikirim</button></div>
            <div class="roundedbox"><button>Selesai</button></div>
        </div>

        <!-- Add code to display orders based on their status -->
        <?php
        include "koneksi.php"; // Include your database connection file

        // Fetch all orders for the logged-in user
        $user_id = $_SESSION['user_id'];
        $query_orders = mysqli_query($koneksi, "SELECT * FROM orders WHERE user_id = '$user_id'");

        while ($order = mysqli_fetch_assoc($query_orders)) {
            // You can customize the display based on your requirements
        ?>
            <div class="boxpesanan">
                <div class="jarakiconshop">
                    <div class="iconshop">
                        <i class="fa-solid fa-shop"></i>
                        <h3>Grind Coffee</h3>
                    </div>
                    <div class="belumbayar">
                        <h3><?php echo $order['status']; ?></h3>
                    </div>
                </div>
                <div></div>
                <div class="garispesanan"></div>

                <!-- Display products for each order -->
                <?php
                $order_id = $order['id'];
                $query_order_items = mysqli_query($koneksi, "SELECT * FROM checkout WHERE order_id = '$order_id'");

                while ($item_checkout = mysqli_fetch_assoc($query_order_items)) {
                    // Fetch product details based on the checkout item
                    $produk_id = $item_checkout['produk_id'];
                    $query_produk_detail = mysqli_query($koneksi, "SELECT * FROM produk_kopi WHERE id = '$produk_id'");
                    $data_produk = mysqli_fetch_assoc($query_produk_detail);
                ?>
                    <div class="productpesanan">
                        <div class="imageproductpesanan">
                            <img src="images/<?php echo $data_produk['image']; ?>" alt="" />
                            <div class="textproductpesanan">
                                <h3><?php echo $data_produk['nama']; ?></h3>
                                <h5>x<?php echo $item_checkout['quantity']; ?></h5>
                            </div>
                        </div>
                        <div class="hargaitem">
                            <h3>Rp. <?php echo $item_checkout['total_harga']; ?></h3>
                        </div>
                    </div>
                    <div class="garispesanan"></div>
                <?php } ?>

                <!-- Display total order price and buttons -->
                <div class="totalharga">
                    <h3>Total Pesanan: Rp. <?php echo $order['final_price']; ?></h3>
                  <a href="invoice.php?id=<?php echo $order['id']?>"><button class="button1" style="color:white">Lihat Invoice</button></a>  
                    <!-- <button class="button2">Batalkan Pesanan</button> -->
                </div>
            </div>
        <?php } ?>
        <!-- End of orders loop -->
    </div>
    </div>
    <br />
    <br />
    <br />
    <br />
    <?php
include 'templates/footer.php';
?>