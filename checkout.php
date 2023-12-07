<?php 
session_start();

// Nyambungin ke db
include "database/koneksi.php";

// Pastikan user sudah login sebelum mengakses halaman ini
if (!isset($_SESSION["email"])) {
    header("Location: login.php");
    exit();
}


$user_id = $_SESSION["user_id"];

$query_user = mysqli_query($koneksi, "SELECT * FROM users WHERE id = '$user_id'");

// Check for query execution success
if ($query_user) {
    // Fetch the user data
    $user_data = mysqli_fetch_assoc($query_user);
    $alamat_user = $user_data['alamat'];
} else {
    // Handle query execution failure
    echo "Error: " . mysqli_error($koneksi);
}


$grand_total = $_SESSION['grand_total'];
$biaya_layanan = 1000;
$biaya_ongkir = 20000;



// Get data dari tabel users berdasarkan email yang sedang login
$query_checkout = mysqli_query(
    $koneksi,
    "SELECT * FROM checkout WHERE user_id='$user_id' AND status = 0"
);

// Fetch all rows from the checkout table for the user
$data_checkout = [];
while ($row = mysqli_fetch_assoc($query_checkout)) {
    $data_checkout[] = $row;
}


include 'templates/header.php';
?>

<style>
    .cowrap{
        /* width: 1200px;
        height: auto; */
        display: flex;
        flex-direction: column;
        font-family: 'poppins', sans-serif;
        border: black 1px solid;
        
        padding: 70px;
    }
    .cotext{
        display: flex;
        flex-direction: row;
        /* border: black 1px solid; */

    }
    .dipesan{
        box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
        border: 1px solid #000;
    }
    .dipesandesc{
        display: flex;
        flex-direction: row;
        margin-left: 10px;
        gap:4px;
        align-items: center;
    }

    .dipesandesc p {
        margin: 0px;
        margin-top:12px;
    }

    .border{
        /* width: 1000px; */
        /* border:black 1px solid; */
    }
    .detailpelanggan{
        margin-bottom: 20px;
        margin-right: 20px;
        display: flex;
        flex-direction: row;
        /* gap: 50px; */
        border-bottom: 1px solid black;
        margin-left: 30px;
        flex-wrap: wrap;
        justify-content: space-between;
    }
    .border img{
        width: 100%;
        height: 5px;
    }
    .notelp p{
        font-weight: 600;
        font-size: 17px;
    }
    .alamat p{
        font-weight: 400;
    }
    .opsi{
        border: 1px black solid;
        border-radius: 12px;
        margin-top: 40px;
        box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25); 
    }
    .picture{
        gap:10px;
        display: flex;
        align-items: center;
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
    .metode-pembayaran {
        padding:30px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    
    }
    .pilihan {
        display: flex;
        gap:10px;
    }

    .pilihan .box {
        font-size: 20px;
        font-weight: bold;
        shadow: 1px;
        padding:5px;
        padding-right: 20px;
        padding-left: 20px;
        border: solid 1px black;
        box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25); 
    }

    .box:hover{
        background-color:#C56E33;
        cursor:pointer;
        color:white;
    }

    .total {
        padding:20px;
    }
    

    .total .perhitungan {
        padding:15px;
        border-bottom: 1px solid black;
        margin-bottom:10px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: end;
    }

    .total .button-order {
     display:flex;
     justify-content: end;
    }

    button {
        background-color: #C56E33;
        color: white;
        padding: 15px;
        font-size: 20px;
        font-weight: bold;
    }

    table {
        background: none;
        color:black;
        width:400px;
    }

    tr:nth-child(even) {
    background: none; /* Warna latar belakang baris genap */
    }

    thead, td {
    padding: 5px;
    font-family: poppins;
    text-align: right;
    border-bottom: 0px solid #c56e33; /* Warna garis bawah */
    }

    
</style>


<div class="cowrap">
<form action="database/checkout.php" method="post">
    <div class="cotext" style="padding-left:20px;">
        <img src="images/cart.png" alt="" style="width:25px;height:25px;margin-top:20px;"><h3>Checkout</h3>
    </div>
    <div class="dipesan">
        <div class="border"><img src="images/strip.png" alt=""></div>
            <div class="dipesandesc"><img src="images/gps.png" alt="" style="width:18px;height:25px;margin-top:10px;">
                <p style="font-weight: 700;">Alamat Penerima</p>
            </div>
        <div class="detailpelanggan">
            <div class="notelp">
                <p><?php echo $user_data['first_name'].' '.$user_data['last_name']  ?><br><?php echo $user_data['no_telp']?></p>
            </div>
            <div class="alamat" style="width: 80%; height: auto;">
                <p><?php echo $alamat_user?></p>
            </div>
        </div>
    </div>
    <div class="opsi">
        <div class="dipesandesc"><p style="font-weight: 400;margin-left:12px;">Produk Dipesan</p></div>
        <div class="opsi-dtl">
            <div class="gambar" style="display:flex;justify-content:space-between; border-bottom: 1px solid black">
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
            foreach ($data_checkout as $item_checkout) {
                $produk_id = $item_checkout['produk_id'];
                $cart_id = $item_checkout['cart_id'];

                // fetch product details based on p_id
                $query_produk_detail = mysqli_query(
                    $koneksi,
                    "SELECT * FROM produk_kopi WHERE id = '$produk_id'"
                );
                while (
                    $data_produk = mysqli_fetch_assoc($query_produk_detail)
                ) {
            ?>
            <div id="checkout-item" style="display:flex; justify-content:space-between; gap:2rem">
                <div style="display:flex; overflow:wrap; width:320px">
                    <img style="height: 150px; margin-top:25px; margin-right:10px" src="images/<?php echo $data_produk['image']?>" alt="" />
                        <div>
                        <h5 style=" font-size:20px; margin-bottom:0px"><?php echo $data_produk["nama"]; ?></h5>
                        <!-- <p>Size: <span><?php echo $item_checkout["size_level"]; ?></span></p>
                        <p>Sugar: <span><?php echo $item_checkout["sugar_level"]; ?></span></p>
                        <p>Ice: <span><?php echo $item_checkout["ice_level"]; ?></span></p> -->
                        </div>
                </div>
                <div class="header" style="display: flex; gap:8rem;">
                    <div><h5>Rp. <?php echo $data_produk['harga']?></h5></div>
                    <div><h5><?php echo $item_checkout['quantity']?></h5></div>
                    <div><h5>Rp. <?php echo $item_checkout['total_harga']?></h5></div>
                </div>
            </div>
            <?php }}?>
                
        </div>
    </div>
    <!-- <div class="metode-pembayaran opsi">
        <div><h3>Metode Pembayaran</h3></div>
        <div class="pilihan">
            <div class="box">COD</div>
            <div class="box">Transfer Bank</div>
        </div>
        <div><h3>Metode Pengiriman</h3></div>
        <div class="pilihan">
            <div class="box">JNE</div>
            <div class="box">JNT</div>
            <div class="box">Shopee Express</div>
        </div>
    </div> -->
    <div class="metode-pembayaran opsi">
    <div>
        <h3>Metode Pembayaran</h3>
        <select name="payment_method" id="paymentMethod">
            <option value="COD">COD</option>
            <option value="Transfer Bank">Transfer Bank</option>
        </select>
    </div>
    <div>
        <h3>Metode Pengiriman</h3>
        <select name="shipping_method" id="shippingMethod">
            <option value="JNE">JNE</option>
            <option value="JNT">JNT</option>
            <option value="Shopee Express">Shopee Express</option>
        </select>
    </div>
               
</div>
    <div class="total opsi">
        <div class="perhitungan">
            <table>
                <tr>
                    <td>Sub Total Produk :</td>
                    <td>Rp. <?php echo $grand_total?></td>
                </tr>
                <tr>
                    <td>Biaya Ongkos Kirim :</td>
                    <td>Rp. <?php echo $biaya_ongkir?></td>
                </tr>
                <tr>
                    <td>Biaya Layanan :</td>
                    <td>Rp. <?php echo $biaya_layanan?></td>
                </tr>
                <tr style="font-weight: bold; font-size: 20px">
                    <td > <p>Grand Total :</td>
                    <td>Rp. <?php echo $grand_total + $biaya_layanan + $biaya_ongkir?></td>
                    <?php 
                    $_SESSION['final_total'] = $grand_total + $biaya_layanan + $biaya_ongkir;
                    // echo $_SESSION['final_total'];
                    ?>
                </tr>
            </table>
        </div>
        <div class="button-order">
           <button style="margin-right: 10px" ><a style="text-decoration:none; color:white; " href="database/cancel_checkout.php">Batalkan Checkout</a></button> 
            <button style="background-color: #31452c" type="submit">Checkout Keranjang</button>
        </div>
    </div>
    </form>
</div>


<?php 
include 'templates/footer.php';
?>