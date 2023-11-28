<?php include 'templates/header.php'; ?>

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
                <td>Adil Gunawan</td>
            </tr>
            <tr>
                <td>Tanggal Pembelian</td>
                <td>:</td>
                <td>28 November 2023</td>
            </tr>
            <tr>
                <td>Alamat Pengiriman</td>
                <td>:</td>
                <td>Batam,Villamas Block C6 No.3</td>
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
    
</div>























<?php include 'templates/footer.php'; ?>