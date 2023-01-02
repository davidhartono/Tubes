<?php
require "../includes/koneksi.php";

if (empty($_SESSION['username'])) {
    header("Location: error.php");
}

$no = $_GET["no"];

$queryHapus = mysqli_query($koneksi, "DELETE FROM orderan WHERE no = '$no'");

if ($queryHapus) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Delete Akun</title>
    </head>

    <body>
    <?php
    header("location: order.php");
} else {
    echo mysqli_error($koneksi);
}
?>