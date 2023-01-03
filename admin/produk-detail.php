<?php
require "../includes/koneksi.php";

$id = $_GET['p'];

$query = mysqli_query($koneksi, "SELECT * FROM produk WHERE id = '$id'");
$data = mysqli_fetch_array($query);

if (empty($_SESSION['username'])) {
    header("Location: error.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk</title>

    <link rel="stylesheet" href="assets/css/main/app.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous"
        referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/css/shared/iconly.css">
    <style>
    .details {
        background: #f5f5f5;
        padding: 30px;
    }
    </style>

</head>

<body>
    <div id="app">
        <?php include("../includes/sidebar.php"); ?>
        <div id="main">
            <?php include("../includes/tombollogout.php") ?>
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <h3>Detail Produk</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-12">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <a href="produk.php" class="btn btn-secondary mb-3"><i class="fa-solid fa-arrow-left"></i>&nbsp;Kembali</a>
                                    </div>
                                    <div class="card-body">
                                        <div class="container details">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <img src="./upload/<?= $data['foto'] ?>" width="400" alt="">
                                                </div>
                                                <div class="col-md-6 offset-md-1">
                                                    <h1 style="text-transform: capitalize;"><?= $data['nama'] ?></h1>
                                                    <p class="fs-5">
                                                        <?= htmlspecialchars_decode($data['detail']) ?>
                                                    </p>
                                                    <p class="fs-3" style="color: blue;">
                                                        Rp <?= $data['harga'] ?>
                                                    </p>
                                                    <p class="fs-6">
                                                        Kategori : <strong><?= $data['kategori'] ?></strong>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2022 &copy; Coftea</p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/app.js"></script>

    <!-- Need: Apexcharts -->
    <script src="assets/extensions/apexcharts/apexcharts.min.js"></script>
    <script src="assets/js/pages/dashboard.js"></script>

</body>

</html>