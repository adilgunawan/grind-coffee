<?php 

// // Get the user ID
// $user_id = $_SESSION["user_id"];

// // Delete the current checkout data
// mysqli_query($koneksi, "DELETE FROM checkout WHERE user_id='$user_id'");

// // Reset the grand_total session variable
// $_SESSION['grand_total'] = 0;
// $_SESSION['final_total'] = 0;

// // Redirect to a suitable page after cancellation (e.g., homepage)
// header("Location: ../index.php");
// exit();

?>

<?php 
session_start();

// // Include database connection
include "koneksi.php";

// Ensure the user is logged in
if (!isset($_SESSION["email"])) {
    header("Location: login.php");
    exit();
}

// Get other necessary data from the session
$user_id = $_SESSION["user_id"];
$grand_total = $_SESSION['grand_total'];
$biaya_layanan = 1000;
$biaya_ongkir = 20000;

// Get data dari tabel users berdasarkan email yang sedang login
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
    // var_dump($produk_id);


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

// Update the checkout method (payment and shipping) in the database
$update_checkout_query = mysqli_query($koneksi, "UPDATE checkout SET pembayaran = '$selected_payment_method', pengiriman = '$selected_shipping_method' WHERE user_id = '$user_id'");

if (!$update_checkout_query) {
    // Handle the error if needed
    echo "Error updating checkout methods: " . mysqli_error($koneksi);
    exit();
}

// // Delete the current checkout data
// mysqli_query($koneksi, "DELETE FROM checkout WHERE user_id='$user_id'");

// // Reset the grand_total session variable
// $_SESSION['grand_total'] = 0;
// $_SESSION['final_total'] = 0;

// // Redirect to a suitable page after cancellation (e.g., homepage)
// header("Location: ../invoice.php");


// if($update_checkout_query) {
//     echo "<script>
//     alert('Produk berhasil dicheckout dari keranjang !');
//     document.location='../invoice.php';
//     </script>";
// } else {
//     var_dump("gagal");
// }
?>