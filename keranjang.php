<?php

include "templates/header.php";

// Pastikan user sudah login sebelum mengakses halaman ini
if (!isset($_SESSION["email"])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION["user_id"];

// Nyambungin ke db
include "database/koneksi.php";

// Get data dari tabel users berdasarkan email yang sedang login
$query_cart = mysqli_query(
    $koneksi,
    "SELECT * FROM cart WHERE user_id='$user_id'"
);

// Fetch all rows from the cart table for the user
$data_cart = [];
while ($row = mysqli_fetch_assoc($query_cart)) {
    $data_cart[] = $row;
}


?>

<div class="sectionkeranjang">
    <div class="sectionheader">
        <i class="fa-solid fa-cart-shopping"></i>
        <h1>Keranjang Belanja</h1>
    </div>
    <div class="sectionbox">
        <div class="roundedbox"><button>Semua</button></div>
        <div class="roundedbox1"><button>Belum Bayar</button></div>
        <div class="roundedbox2"><button>Menunggu Pengiriman</button></div>
        <div class="roundedbox"><button>Dikemas</button></div>
        <div class="roundedbox"><button>Dikirim</button></div>
        <div class="roundedbox"><button>Selesai</button></div>
    </div>
    <form action="database/cart.php" method="post">
    <div class="karkir">
        <div class="bordersection">
            <div class="rectanglebox">
                <div class="checklist">
                    <!-- <input type="checkbox" /> -->
                    <h2>Produk</h2>
                </div>
                <div class="headerkeranjang">
                    <div><h2>Harga Satuan</h2></div>
                    <div><h2>Kuantitas</h2></div>
                    <div><h2>Total Harga</h2></div>
                    <div><h2>Aksi</h2></div>
                </div>
            </div>
            <?php // Loop through each item in the cart
            foreach ($data_cart as $item_cart) {
                $produk_id = $item_cart["produk_id"];

                // Fetch product details based on produk_id
                $query_produk_detail = mysqli_query(
                    $koneksi,
                    "SELECT * FROM produk_kopi WHERE id = '$produk_id'"
                );

                while (
                    $data_produk = mysqli_fetch_assoc($query_produk_detail)
                ) { ?>
                    <div class="borderproduct">
                        <div class="productheader">
                            <i class="fa-solid fa-shop"></i>
                            <h3>Grind Coffee</h3>
                        </div>
                        <hr class="garis1" />
                        <!-- <form action="database/cart.php" method="post"> -->
                            <div class="checkitem">
                                <input type="checkbox" name="selected_cart[]" value="<?php echo $item_cart["id"]; ?>" />
                                <!-- <input type="checkbox" name="selected_cart"/> -->
                                <div>
                                <div style="display:flex; overflow:wrap; width:350px">
                                    <img style="height: 150px; margin-top:25px; margin-right:10px" src="images/<?php echo $data_produk["image"]; ?>" alt="" />
                                    <div>
                                        <h5 style="font-weigh:bold; font-size:20px;"><?php echo $data_produk["nama"]; ?></h5>
                                        <p>Size: <span><?php echo $item_cart["size_level"]; ?></span></p>
                                        <p>Sugar: <span><?php echo $item_cart["sugar_level"]; ?></span></p>
                                        <p>Ice: <span><?php echo $item_cart["ice_level"]; ?></span></p>
                                    </div>
                                    </div>
                                </div>  
                                <h5 class="hargasatuan">Rp. <?php echo $data_produk[
                                    "harga"
                                ]; ?></h5>
                                <div class="nambahkeranjang">
                                    <!-- <i class="fa-solid fa-minus"></i> -->
                                    <h1><?php echo $item_cart["quantity"]; ?></h1>
                                    <!-- <i class="fa-solid fa-plus"></i> -->
                                </div>
                                <h5 class="totalharga">Rp. <?php echo $data_produk["harga"] * $item_cart["quantity"]; ?></h5>
                                    <input type="text" name="cart_id" value="<?php echo $item_cart["id"]; ?>" hidden id="">
                                <button  style="background-color:#f4e6cd; border:0px" type="submit" name="delete_cart">
                                <div class="icontrash">
                                    <i class="fa-solid fa-trash">  </i>
                                </div>
                                </button>
                            </div>
                        <!-- </form> -->
                        <hr class="garis2" />
                    </div>
                    <?php }
            } ?>
        </div>

        <div class="ringkasan">
            <h1>Checkout Produk</h1>
            <!-- <hr /> -->
            <!-- <div class="totalhargas">
                <h5>Total Harga <?php echo count($data_cart)?> Barang</h5>
                <h5><?php echo $data_cart[0]['id']?></h5>
            </div> -->
            <button name="checkout_cart" type="submit">Beli</button>
        </div>
    </div>
    </form>
</div>

<?php include "templates/footer.php";
?>
