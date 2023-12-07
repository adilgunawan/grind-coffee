<?php
session_start();

// Ensure the user is logged in
if (!isset($_SESSION["email"])) {
    header("Location: login.php");
    exit();
}

// Include database connection
include "koneksi.php";

// Get the user ID
$user_id = $_SESSION["user_id"];

// Delete the current checkout data
// mysqli_query($koneksi, "DELETE FROM checkout WHERE user_id='$user_id'");

// Reset the grand_total session variable
$_SESSION['grand_total'] = 0;
$_SESSION['final_total'] = 0;

// Redirect to a suitable page after cancellation (e.g., homepage)
header("Location: ../index.php");
exit();
?>
