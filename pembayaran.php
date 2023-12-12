<?php
include 'templates/header.php';

$selected_shipping = urldecode($_GET['shipping_method']);
$selected_payment = urldecode($_GET['payment_method']);

// var_dump($selected_payment, $selected_shipping);
// die();

?>
<script>
function copyText() {
  var textToCopy = "999 021 0990 9992 78";
  var dummyElement = document.createElement("textarea");
  document.body.appendChild(dummyElement);
  dummyElement.value = textToCopy;
  dummyElement.select();
  document.execCommand("copy");
  document.body.removeChild(dummyElement);
  alert("No.Rekening Tersailin");
}
</script>
<style>
    .pembayaran{
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
}
    .pembayaran .atas{
    height: 50px;
    width: 1000px;
    display: flex;
    justify-content: flex-start;
    align-items: flex-end;
    margin-top: 50px;
    margin-bottom: 20px;
    gap: 15px;
    /* border: solid black 4px; */
    }
    .pembayaran .atas img{
    width: auto;
    }
    .pembayaran .atas p{
        font-family: 'poppins';
        font-weight: 600;
        font-size: 18px;
        margin-top: 100px;
    }
    .bawah {
        height: auto;
        width: 1000px;
        border: solid gray 1px;
        display: flex;
        flex-direction: column;
        stroke: #000;
        filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.25));
        margin-bottom: 70px;
        padding-top: 40px;
    }
    .secatas{
        font-size: 24px;
        font-weight: 600;
        justify-content: space-around;
        display: flex;
        justify-content: center;
        gap: 400px;
        border-bottom: 1px solid black;
        margin-left: 90px;
        margin-right: 90px;
    }
    .ttlpembayaran, .total{
        font-family: 'poppins';  
    }
    .secbawah{
        padding-top: 40px;
        padding-left: 130px;
        /* padding-right: 80px; */
        display: flex;
        flex-direction: row;
    }
    .right{
        font-family: 'poppins';
        padding-left: 40px;
    }
    .right h2{
        font-weight: 500;
    }
    .buttonsalin{
        background: none;
        border: none;
        color: #000;
        cursor: pointer;
        font-family: 'poppins';
        font-size: 24px;
        font-weight: 700;
    }
    .petunjukwrap{
        width: 1000px;
        height: 700px;
        /* border:#000 solid 1px; */
        font-family: 'poppins';
    }
    .petunjukwrap{
        display: flex;
        flex-direction: column;
        justify-content: space-around;
        height: auto;
    }
    .petunjukatas{
        display: flex;
        flex-direction: row;
        width: 900px;
        /* justify-content: center; */
        /* border: solid black 10px; */
        margin-left: 45px;
    }
    .petunjukbawah{
        display: flex;
        flex-direction: row;
        width: 900px;
        justify-content: space-around;
        margin-left: 45px;
    }
    .mbanking, .ibanking, .atm, .sms{
        width: 300px;
        height: auto;
    }
    .btnok{
        background-color: #31452C;
        width: 200px;
        height: 60px;
        color: white;
        font-weight: 600;
        font-size: 20px;
        margin-bottom: 50px;
        margin-top: 20px;
        margin-left: 50px;  
        cursor: pointer;
    }
</style>
<?php
$rekening = "999 021 0990 9992 78";
?>
<div class="pembayaran">
    <div class="atas"><img src="images/back.png" alt="" style="height:20px; "><img src="images/dompet.png" alt="" style="height:49px;"><p>pembayaran</p></div>
    <div class="bawah">
        <div class="secatas">
            <div class="ttlpembayaran">
            Total pembayaran
            </div>
            <div class="total">
            Rp. <?php echo $_SESSION['final_total']?><!-- ganti jadi variabel total belanja-->
            </div>
        </div>
        <div class="secbawah">
            <div class="left"><img src="images/BNI.png" alt=""></div>
            <div class="right">
                <h2>Bank BNI</h2>
                <h2>No.Rekening:</h2>
                <div class="rekening" style="display:flex; flex-direction: row;"><h2 style="color:#C56E33; font-weight:700;"><?php echo $rekening?></h2><button class="buttonsalin" style="margin-left:40px;" onclick="copyText()">SALIN</button></div>
                <h2 style="font-size:18px; font-weight:700;">Proses verifikasi kurang dari 10 menit setelah pembayaran berhasil</h2>
                <p style="width:600px;">Bayar pesanan ke Virtual Account di atas sebelum membuat pesanan kembali dengan Virtual Account agar nomor tetap sama.</p>
                &nbsp;
                <p>Hanya menerima dari Bank BNI</p>
                
            </div>
            
        </div>
        <div class="petunjukwrap">
                <div class="petunjukatas">
                    <div class="mbanking">
                        <h3>Petunjuk Transfer mBanking</h3>
                        <ol>
                            <li>Pilih <b>Transfer > Virtual Account Billing.</b></li>
                            <li>Pilih <b>Rekening Debet</b>> Masukkan <b>Nomor Virtual Account <b style="color:#C56E33;"><?php echo$rekening;?></b></b>pada <b>menu Input Baru</b></li>
                            <li>Tagihan yang harus dibayar akan muncul pada layar konfirmasi</li>
                            <li>Periksa informasi yang tertera di layar. Pastikan Merchant adalah <b>Grind Coffee</b>, Total tagihan sudah benar dan <b>username kamu adilgunawan.</b> Jika benar, masukkan password transaksi dan <b>pilih Lanjut.</b></li>
                        </ol>
                    </div>
                    <div class="ibanking">
                        <h3>Petunjuk Transfer iBanking</h3>
                        <ol>
                            <li>Pilih <b>Transfer > Virtual Account Billing</b></li>
                            <li>Masukkan <b>nomor Virtual Account</b> <b style="color:#C56E33;"><?php echo $rekening?></b></li>
                            <li>Masukkan <b>Rekening Debet</b> dan pilih <b>Lanjut</b></li>
                            <li>Tagihan yang harus dibayar akan muncul pada layar konfirmasi</li>
                            <li>Periksa informasi yang tertera di layar. pastikan merchant adalah <b>Grind Coffee, Total tagihan</b> sudah benar dan username kamu <b>adilgunawan</b></li>
                            <li><b>Masukkan Kode Otentikasi</b> Token Anda lalu klik <b>Proses</b></li>
                        </ol>
                    </div>
                    <div class="atm">
                        <h3>Petunjuk Transfer ATM</h3>
                        <ol>
                            <li>Pilih Menu Lain > <b>Transfer.</b></li>
                            <li>Pilih Jenis rekening asal dan pilih <b>Virtual Account Billing.</b></li>
                            <li>Masukkan nomor <b>Virtual Account</b><b style="color:#C56E33;"><?php $rekening?></b>dan pilih <b>Benar.</b></li>
                            <li>Tagihan yang harus dibayar akan muncul pada layar konfirmasi.</li>
                            <li>Pastikan Merchant adalah <b>Grind Coffee,</b> Total Tagihan sudah benar dan username kamu <b>adilgunawan. jika benar. pilih Ya.</b></li>
                        </ol>
                    </div>
                </div>
                <div class="petunjukbawah">
                    <div class="sms">
                    <h3>Petunjuk Transfer SMS</h3>
                        <ol>
                            <li>Kirim SMS "Transfer <b style="color:#C56E33"><?php echo $rekening?></b><b>Rp. 100.000</b>" ke 3346</li>
                            <li>Balas SMS yang masuk dengan <b>Benar</b></li>
                        </ol>
                        <form action="database/checkoutBNI.php" method="post" enctype="multipart/form-data">
                            <label for="gambar">Bukti Transfer :</label>
                            <input type="file" name="bukti_tf" id="gambar">
                            <input type="hidden" name="payment_method" value="<?php echo $selected_payment?>">
                            <input type="hidden" name="shipping_method" value="<?php echo $selected_shipping?>">
                            <button type="submit">Kirim</button>
                        </form>
                    </div>
                    </div>
                </div>
    </div>
</div>

<?php
include 'templates/footer.php'
?>