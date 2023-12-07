<?php

session_start();
include 'koneksi.php';

// add to cart

if (isset($_POST['add_to_cart'])) {
    // Asumsikan Anda sudah memiliki otentikasi pengguna dan ID produk yang tersedia
    $user_id = $_SESSION['user_id']; // Dapatkan ID pengguna dari sesi
    $produk_id = $_POST['produk_id']; // Dapatkan ID produk dari formulir
    $quantity = $_POST['quantity']; // Dapatkan jumlah dari formulir
    $size_level = $_POST['size_level']; // Dapatkan nilai size_level dari formulir
    $sugar_level = $_POST['sugar_level']; // Dapatkan nilai sugar_level dari formulir
    $ice_level = $_POST['ice_level']; // Dapatkan nilai ice_level dari formulir
   

    // Panggil fungsi addToCart dengan parameter yang diperlukan
    addToCart($user_id, $produk_id, $quantity, $size_level, $sugar_level, $ice_level);
}


function addToCart($user_id, $produk_id, $quantity, $size_level, $sugar_level, $ice_level) {
    include 'koneksi.php';

    $existingItem = 0;

    $query_check = mysqli_query($koneksi, "SELECT * FROM cart WHERE user_id = '$user_id' AND produk_id = '$produk_id'");
    $data = mysqli_fetch_assoc($query_check);


    if ($query_check) {
        $existingItem = 1;
        // Produk sudah ada di keranjang, periksa nilai dari kolom baru
        if (
            $data['size_level'] == $size_level &&
            $data['sugar_level'] == $sugar_level &&
            $data['ice_level'] == $ice_level
        ) {
            // Nilai sama, update kuantitas
            $query_update_qty = mysqli_query($koneksi, "UPDATE cart SET quantity = quantity + '$quantity' WHERE user_id = '$user_id' AND produk_id = '$produk_id'" );

            if ($query_update_qty)
            {
                echo "<script>
                alert('Jumlah produk berhasil diupdate !');
                document.location='../keranjang.php';
                </script>";
            }

        } else {
            // Nilai berbeda, tambahkan record baru

            $query_insert_cart = mysqli_query($koneksi, "INSERT INTO cart (id, user_id, produk_id, quantity, size_level, sugar_level, ice_level) VALUES (NULL, '$user_id', '$produk_id', '$quantity', '$size_level', '$sugar_level', '$ice_level')");

            if ($query_insert_cart)
            {
                echo "<script>
                alert('Produk berhasil ditambahkan ke keranjang !');
                document.location='../keranjang.php';
                </script>";
            }
        }
    } else {
        // Produk belum ada di keranjang, tambahkan record baru
        $query_insert_cart_new = mysqli_query($koneksi, "INSERT INTO cart (id, user_id, produk_id, quantity, size_level, sugar_level, ice_level) VALUES (NULL, '$user_id', '$produk_id', '$quantity', '$size_level', '$sugar_level', '$ice_level')");


        if ($query_insert_cart_new)
        {
            echo "<script>
            alert('Produk berhasil ditambahkan ke keranjang !');
            document.location='../keranjang.php';
            </script>";
        }
    }
}

// delete cart

if (isset($_POST['delete_cart'])) {
    $cart_id = $_POST['cart_id'];
    deleteCart($cart_id);
    
}

function deleteCart($cart_id) {
    include 'koneksi.php';
    // var_dump($cart_id);
    
    $query_delete = mysqli_query($koneksi, "DELETE FROM cart WHERE id = $cart_id");

    if($query_delete) {
        echo "<script>
        alert('Produk berhasil dihapus dari keranjang !');
        document.location='../keranjang.php';
        </script>";
    } else {
        var_dump("gagal");
    }
}

// checkout cart
if (isset($_POST['selected_cart']) && is_array($_POST['selected_cart'])) {
    
    $user_id = $_SESSION['user_id']; // Dapatkan ID pengguna dari sesi
    $selectedCartIds = $_POST['selected_cart'];
    // var_dump($selectedCartIds);

    $grand_total = $_SESSION['grand_total'];

    foreach ($selectedCartIds as $cartId) {
        // Lakukan sesuatu dengan setiap $cartId, seperti menyimpan ke database
        $query_cart_detail = mysqli_query(
            $koneksi,
            "SELECT * FROM cart WHERE id = '$cartId' AND user_id = '$user_id'"
        );
        
        
         // Fetch data cart detail
         if ($cart_detail = mysqli_fetch_assoc($query_cart_detail)) {

            $produk_id = $cart_detail['produk_id'];
            
            $query_price = mysqli_query(
                $koneksi,
                "SELECT * FROM produk_kopi WHERE id = '$produk_id'"
            );

            // get quantity
            $quantity = $cart_detail['quantity'];

            $data = mysqli_fetch_assoc($query_price);

            $total_harga = $cart_detail['quantity'] * $data['harga'];

            // Insert data into checkout table
            $insert_checkout_query = mysqli_query(
                $koneksi,
                "INSERT INTO checkout (user_id, cart_id, produk_id, total_harga, tanggal_order, quantity, status)
                VALUES ('$user_id', '$cartId', '$produk_id', '$total_harga', CURRENT_TIMESTAMP, '$quantity', 0)"
            );

            // delete cart by id
            $query_delete_cart = mysqli_query($koneksi, "DELETE FROM cart WHERE id = '$cartId'");

            $grand_total += $total_harga;
            

            if($insert_checkout_query) {
                echo "<script>
                alert('Produk berhasil dicheckout dari keranjang !');
                document.location='../checkout.php';
                </script>";
            } else {
                var_dump("gagal");
            }
            

            if (!$insert_checkout_query) {
                // Handle error if failed to insert into checkout table
                echo "Failed to insert data into checkout: " . mysqli_error($koneksi);
            }
            

        }
    }

    $_SESSION['grand_total'] = $grand_total;
    echo "Grand Total: $grand_total";
}

?>


