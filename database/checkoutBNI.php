<?php 
session_start();

include 'koneksi.php';

function upload(){

    include 'koneksi.php';

    $namaFile = $_FILES['bukti_tf']['name'];
	$ukuranFile = $_FILES['bukti_tf']['size'];
	$error = $_FILES['bukti_tf']['error'];
	$tmpName = $_FILES['bukti_tf']['tmp_name'];

	// cek apakah tidak ada gambar yang diupload
	if( $error === 4 ) {
		echo "<script>
				alert('pilih gambar terlebih dahulu!');
			  </script>";
		return false;
	}

    // cek apakah yang diupload adalah gambar
	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
		echo "<script>
				alert('yang anda upload bukan gambar!');
			  </script>";
		return false;
	}

    // cek jika ukurannya terlalu besar
	if( $ukuranFile > 1000000 ) {
		echo "<script>
				alert('ukuran gambar terlalu besar!');
			  </script>";
		return false;
	}

    	// lolos pengecekan, gambar siap diupload
	// generate nama gambar baru
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;

    // var_dump($tmpName, $namaFileBaru);
    // die();

	move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

	return $namaFileBaru;

}

 // Get other necessary data from the session
 $user_id = $_SESSION["user_id"];
 $grand_total = $_SESSION['grand_total'];
 $biaya_layanan = 1000;
 $biaya_ongkir = 20000;

 // get data alamat user
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

 // Get data from the checkout table
 $query_checkout = mysqli_query($koneksi, "SELECT * FROM checkout WHERE user_id='$user_id'");

 // Fetch all rows from the checkout table for the user
 $data_checkout = [];
 while ($row = mysqli_fetch_assoc($query_checkout)) {
     $data_checkout[] = $row;
 }






 // Loop through the checkout data and update the stok field in produk_kopi table
 foreach ($data_checkout as $item_checkout) {
     $produk_id = $item_checkout['produk_id'];
     $quantity = $item_checkout['quantity'];

     // Fetch current stok from produk_kopi table
     $query_produk_stok = mysqli_query($koneksi, "SELECT stok FROM produk_kopi WHERE id = '$produk_id'");
     $row_produk_stok = mysqli_fetch_assoc($query_produk_stok);
     $current_stok = $row_produk_stok['stok'];

     // Calculate new stok after reducing the quantity
     $new_stok = $current_stok - $quantity;

     // Update stok in produk_kopi table
     $update_stok_query = mysqli_query($koneksi, "UPDATE produk_kopi SET stok = '$new_stok' WHERE id = '$produk_id'");

     if (!$update_stok_query) {
         // Handle the error if needed
         echo "Error updating stok: " . mysqli_error($koneksi);
         exit();
     }
 }

 // Get selected payment method
 $selected_payment_method = $_POST['payment_method'];

 // Get selected shipping method
 $selected_shipping_method = $_POST['shipping_method'];

 



 foreach ($data_checkout as $item_checkout) {

     $cart_id = $item_checkout['cart_id'];

     $bukti_tf = upload();


     // Update checkout methods for each item
     $update_checkout_query = mysqli_query($koneksi, "UPDATE checkout SET alamat='$alamat_user', pembayaran = '$selected_payment_method', pengiriman = '$selected_shipping_method', status = 1, bukti_tf = '$bukti_tf' WHERE user_id = '$user_id' AND cart_id = '$cart_id'");


     if (!$update_checkout_query) {
         // Handle the error if needed
         echo "Error updating checkout methods: " . mysqli_error($koneksi);
         exit();
     }


 }


 // Insert data into the orders table
 $final_price = $grand_total + $biaya_layanan + $biaya_ongkir;
 $tanggal_order = date("Y-m-d H:i:s");
 $insert_order_query = mysqli_query($koneksi, "INSERT INTO orders (user_id, pembayaran, pengiriman, final_price, tanggal_order) VALUES ('$user_id', '$selected_payment_method', '$selected_shipping_method', '$final_price', '$tanggal_order')");

 if (!$insert_order_query) {
     // Handle the error if needed
     echo "Error inserting data into orders table: " . mysqli_error($koneksi);
     exit();
 }



 // Retrieve the generated order ID
 $order_id = mysqli_insert_id($koneksi);

 // Get the latest cart_ids for the user
 $latest_cart_ids_query = mysqli_query($koneksi, "SELECT DISTINCT cart_id FROM checkout WHERE user_id = '$user_id' ORDER BY tanggal_order DESC");
 $latest_cart_ids = [];
 while ($row = mysqli_fetch_assoc($latest_cart_ids_query)) {
     $latest_cart_ids[] = $row['cart_id'];
 }

 // Update only the rows with the latest cart_ids in the checkout table with the order ID
 foreach ($latest_cart_ids as $cart_id) {
     $update_order_id_query = mysqli_query($koneksi, "UPDATE checkout SET order_id = '$order_id' WHERE user_id = '$user_id' AND cart_id = '$cart_id' AND order_id IS NULL");
     
     if (!$update_order_id_query) {
         // Handle the error if needed
         echo "Error updating order_id in checkout table: " . mysqli_error($koneksi);
         exit();
     }
 }  

 // Reset grand total in session
 $_SESSION['grand_total'] = 0;


 // Redirect to a suitable page after checkout
 header("Location: ../pesanansaya.php");
 exit();


?>