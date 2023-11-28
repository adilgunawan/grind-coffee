<?php
// memulai session
session_start();
// melepaskan session
session_unset();
//menhapus session
session_destroy(); //comment

// cek apakah session masih ada apa engga
if(isset($_SESSION["email"])){
    echo("masih login");
    die();
} else {
    header("Location: ../login.php");
}

?>