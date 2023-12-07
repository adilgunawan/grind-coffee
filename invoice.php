<?php include 'templates/header.php';
// Get data dari tabel users berdasarkan email yang sedang login
$order_id = $_GET['id'];
$query_checkout = mysqli_query(
    $koneksi,
    "SELECT * FROM checkout WHERE order_id='$order_id' AND status = 1"
);

// Fetch all rows from the checkout table for the user
$data_order = [];
while ($row = mysqli_fetch_assoc($query_checkout)) {
    $data_order[] = $row;
    // $alamat_user = $row['alamat'];
}
$alamat_user = $data_order[0]['alamat'];

$user_id = $_SESSION["user_id"];

$query_user = mysqli_query($koneksi, "SELECT * FROM users WHERE id = '$user_id'");

// Check for query execution success
if ($query_user) {
    // Fetch the user data
    $user_data = mysqli_fetch_assoc($query_user);
} else {
    // Handle query execution failure
    echo "Error: " . mysqli_error($koneksi);
}

// Initialize total variable
$total = 0;

?>

<style>
    *{
        font-family: poppins;
    }
    .wrapper {
        padding:50px;
        margin: 90px auto;
        width: 70%;
        border: 1px solid black;
        border-radius: 16px;
    }
    .header {
       
        display:flex;
        justify-content: space-between;
        align-items: center;
    }
    .opening {
        display:flex;
        justify-content:space-between;
        /* gap:10rem; */
    }
    .opening {
        /* border-bottom: 2px black solid;
        padding-bottom: 30px; */
    }
    .opening .buyer {
        width:300px;
    }
    table {
        background: none;
        color:black;
        /* width:400px; */
    }

    tr:nth-child(even) {
    background: none; /* Warna latar belakang baris genap */
    }

    thead, td {
    padding: 5px;
    font-family: poppins;
    text-align: left;
    border-bottom: 0px solid #c56e33; /* Warna garis bawah */
    }

    .produk{
        margin: 30px 0;
        border-top: solid 2px black;
        border-bottom: solid 2px black;
        padding: 10px 0;
    }
    .opsi-dtl{
        margin:25px;
        display: flex;
        flex-direction: column;
        margin-left: 50px;
        margin-right: 50px;
    }
    .gambar{
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .gambar .header {
        display: flex;
        gap:6rem;
    }
    .header h5 {
        font-size:19px;
    }
</style>

<div class="wrapper">
    <div class="header">
        <img height="130" src="./images/logo_hitam.png" alt="">
        <div>
            <h2>INVOICE ORDER</h2>
            <p>#ID-1 | #Order ID - 1</p>
        </div>
    </div>
    <div class="opening">
        <div class="seller">
            <h3>DI TERBITKAN ATAS NAMA</h3>
            <p>Penjual: GRIND COFFEE</p>
        </div>    
        <div class="buyer">
            <h3>UNTUK</h3>
            <table>
            <tr>
                <td>Pembeli</td>
                <td>:</td>
                <td><?php echo $user_data['first_name'].' '.$user_data['last_name']?></td>
            </tr>
            <tr>
                <td>Tanggal Pembelian</td>
                <td>:</td>
                <td><?php echo $data_order[0]['tanggal_order']?></td>
            </tr>
            <tr>
                <td>Alamat Pengiriman</td>
                <td>:</td>
                <td><?php echo $alamat_user?></td>
            </tr>
            </table>
        </div>    
    </div>
    <div class="produk">
        <div class="opsi-dtl">
            <div class="gambar" style="display:flex;justify-content:space-between; ">
                <div class="picture" style="display: flex; flex-direction:row;">
                    <i style="font-size:25px" class="fa-solid fa-shop"></i><h4 style="margin:0px">Grind Coffee</h4>
                </div>
                <div class="header" style="font-weight: bold;">
                    <div class="harga"><p>Harga Satuan</p></div>
                    <div class="jumlah"><p>Jumlah</p></div>
                    <div class="subttl"><p>Sub Total Produk</p></div>
                </div>
            </div>
            <!-- looping -->
            <?php 
            foreach ($data_order as $item_order) {
                $produk_id = $item_order['produk_id'];
                $cart_id = $item_order['cart_id'];

                // fetch product details based on p_id
                $query_produk_detail = mysqli_query(
                    $koneksi,
                    "SELECT * FROM produk_kopi WHERE id = '$produk_id'"
                );
                while (
                    $data_produk = mysqli_fetch_assoc($query_produk_detail)
                ) {
                    // Update total variable
                    $total += $item_order['total_harga'];
            ?>
            <div id="checkout-item" style="display:flex; justify-content:space-between; gap:2rem">
                <div style="display:flex; overflow:wrap; width:320px">
                    <!-- <img style="height: 150px; margin-top:25px; margin-right:10px" src="images/<?php echo $data_produk['image']?>" alt="" /> -->
                        <div>
                        <h5 style=" font-size:20px; margin-bottom:0px"><?php echo $data_produk["nama"]; ?></h5>
                        <!-- <p>Size: <span><?php echo $item_order["size_level"]; ?></span></p>
                        <p>Sugar: <span><?php echo $item_order["sugar_level"]; ?></span></p>
                        <p>Ice: <span><?php echo $item_order["ice_level"]; ?></span></p> -->
                        </div>
                </div>
                <div class="header" style="display: flex; gap:8rem;">
                    <div><h5>Rp. <?php echo $data_produk['harga']?></h5></div>
                    <div><h5><?php echo $item_order['quantity']?></h5></div>
                    <div><h5>Rp. <?php echo $item_order['total_harga']?></h5></div>
                </div>
            </div>
            <?php }}?>
        </div>
    </div>
    <div><h2 class="text-align: end">Total Invoice: Rp. <?php echo number_format($total+21000, 0, ',', '.'); ?></h2></div>
    
</div>



<?php include 'templates/footer.php'; ?>