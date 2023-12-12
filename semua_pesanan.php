<?php
include 'templates/header.php';

// Pastikan user sudah login sebelum mengakses halaman ini
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}
?>

<style>
  .table-orders {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}


.table-orders th, .table-orders td {
    /* border: 1px solid #ddd; */
    padding: 8px;
    text-align: left;
}


.table-orders img {
    max-width: 100px;
    max-height: 60px;
    display: block;
    margin: 0 auto;
} */
</style>

<div class="sectionprofil">
    <div class="leftbarmenu">
        <div class="namaprofil">
            <i class="fa-regular fa-circle-user"><h5>Admin</h5></i>
        </div>
        <div class="menuleftbar">
            <div class="menu">
                <i class="fa-regular fa-circle-user"><h5>Profil</h5></i>
            </div>
            <div class="menu">
                <i class="fa-solid fa-address-book"><h5>Daftar Alamat</h5></i>
            </div>
            <div class="menu">
                <i class="fa-solid fa-clipboard-list"><h5>Semua Saya</h5></i>
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
            <h5>Semua Pesanan</h5>
        </div>
        <hr class="garis" />
        <div class="sectionbox">
            <!-- ... (your existing status buttons) ... -->
        </div>

        <div class="sectionbox">
            <table class="table-orders">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Shop</th>
                        <th>Status</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Payment Proof</th>
                        <th>Estimated Delivery</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include "koneksi.php";

                    $user_id = $_SESSION['user_id'];
                    $query_orders = mysqli_query($koneksi, "SELECT * FROM orders ORDER BY tanggal_order DESC");

                    $counter = 1;

                    while ($order = mysqli_fetch_assoc($query_orders)) {
                        $order_id = $order['id'];
                        $query_order_items = mysqli_query($koneksi, "SELECT * FROM checkout WHERE order_id = '$order_id'");

                        while ($item_checkout = mysqli_fetch_assoc($query_order_items)) {
                            $produk_id = $item_checkout['produk_id'];
                            $query_produk_detail = mysqli_query($koneksi, "SELECT * FROM produk_kopi WHERE id = '$produk_id'");
                            $data_produk = mysqli_fetch_assoc($query_produk_detail);
                    ?>
                            <tr>
                                <td><?php echo $counter; ?></td>
                                <td>Grind Coffee</td>
                                <td><?php echo $order['status']; ?></td>
                                <td><?php echo $data_produk['nama']; ?></td>
                                <td><?php echo $item_checkout['quantity']; ?></td>
                                <td>Rp. <?php echo $item_checkout['total_harga']; ?></td>
                                <td>
                                    <div class="bukti transfer">
                                        <img width=100 src="database/img/<?php echo $item_checkout['bukti_tf'] ?>" alt="">
                                    </div>
                                </td>
                                <td>
                                    <?php
                                    $pengiriman = $order['pengiriman'];

                                    if ($data_produk['jenis_produk'] == 'minuman') {
                                        $est = ($pengiriman == 'JNT') ? '15 sampai 30 menit' : '45 menit sampai 1 jam';
                                    } else if ($data_produk['jenis_produk'] == 'biji_kopi') {
                                        $est = ($pengiriman == 'JNT') ? '5 sampai 7 hari' : '7 menit sampai 11 hari';
                                    } else {
                                        $est = ($pengiriman == 'JNT') ? '5 sampai 7 hari' : '7 menit sampai 11 hari';
                                    }

                                    echo $est;
                                    ?>
                                </td>
                                <td>
                                    <a href="invoice.php?id=<?php echo $order['id'] ?>"><button class="button1" style="color:white">Lihat Invoice</button></a>
                                </td>
                            </tr>
                    <?php
                            $counter++;
                        }
                    }
                    ?>
                </tbody>
            </table>
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
