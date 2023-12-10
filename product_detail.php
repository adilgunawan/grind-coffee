<?php
include 'templates/header.php';

// Pastikan user sudah login sebelum mengakses halaman ini
if (!isset($_SESSION['email'])) {
  header("Location: login.php");
  exit();
}


include 'database/koneksi.php';

$id = $_GET["id"];
$user_id = $_SESSION['user_id'];
// var_dump($user_id);

$query = mysqli_query($koneksi, "SELECT * FROM produk_kopi WHERE id='$id'");


while($data = mysqli_fetch_assoc($query)){
?>    

<form action="database/cart.php" method="post">
    <div class="sectionproduct">
      <div class="productdetail">
        <div class="posisiproduct">
          <img src="images/<?php echo $data["image"]?>" alt="" />
        </div>
        <div class="posisidetail">
          <h1 style="text-transform:capitalize"><?php echo $data['nama'];?></h1>
          <div class="ratingproduct">
            <div class="ratingicon">
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star-half-stroke"></i>
            </div>
            <h5>4,5</h5>
            <h6>Tersisa <?php echo $data['stok'];?> buah</h6>
          </div>
          <div class="hargaproduct">
            <h3>RP.<?php echo $data['harga'];?></h3>
          </div>
          <div class="buttonsimpan">
            <a href='wishlist_produk.php?id=<?php echo $data['id']?>'><div><i class="fa-regular fa-heart"></i>Simpan</div></a>
          </div>
          <div class="ukuranpilihan">
            <div class="size">
              <h3>Size Level</h3>
              <input  name="size_level" type="text" placeholder="*Select" />
            </div>
            <div class="size">
              <h3>Sugar Level</h3>
              <input name="sugar_level" type="text" placeholder="*Select" />
            </div>
            <div class="size">
              <h3>Ice Level</h3>
              <input name="ice_level" type="text" placeholder="*Select" />
            </div>
          </div>
          <div class="ukuransize">
            <div>
              <!-- <div class="iconminus">
                <i class="fa-solid fa-minus"></i>
              </div>
              <h5>1</h5>
              <i class="fa-solid fa-plus"></i> -->
              <div class="ukuransize" style="margin-top: 0px; gap:10px;">
                <button type="button" class="quantity-button" onclick="decrementQuantity()"><i class="fa-solid fa-minus"></i></button>
                  <input style="height: 30px; padding-left:10px; width:20px" type="number" name="quantity" id="quantity" placeholder="0" value="1" min="1" />
                  <button type="button" class="quantity-button" onclick="incrementQuantity()"><i class="fa-solid fa-plus"></i></button>
                <input type="hidden" name="produk_id" value="<?php echo $data['id']?>">
              </div>
        </div>
        <script>
            function incrementQuantity() {
                var quantityInput = document.getElementById('quantity');
                quantityInput.value = parseInt(quantityInput.value) + 1;
            }

            function decrementQuantity() {
                var quantityInput = document.getElementById('quantity');
                var currentValue = parseInt(quantityInput.value);

                if (currentValue > 1) {
                    quantityInput.value = currentValue - 1;
                }
            }
        </script>
        
            <div class="rectanglekeranjang">
              <!-- <input type="submit" name="add_to_cart"  value="Masukkan Keranjang"> -->
              <button name="add_to_cart" type="submit">
                Masukkan Keranjang<i class="fa-solid fa-cart-shopping"></i>
              </button>
            </div>
            <div class="belisekarang">
              <button>Beli Sekarang</button>
            </div>
          </div>
         
          
          <div class="ukuranpilihan">
            <div class="sizerectangle">
              <h3>Catatan</h3>
              <input type="text" placeholder="*Select" />
            </div>
          </div>
        </div>
      </div>

      <div class="sectiondeskripsi">
        <div class="deskripsiproduk">
          <h1>Deskripsi Produk</h1>
          <h5>
          <?php echo $data['deskripsi'];?>
          </h5>
        </div>
      </div>
    </div>
</form>
    <?php
}
include 'templates/footer.php';
?>
