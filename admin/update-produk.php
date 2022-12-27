<?php
require "../includes/koneksi.php";

$id = $_GET['p'];

$query = mysqli_query($koneksi, "SELECT * FROM produk WHERE id = '$id'");
$data = mysqli_fetch_array($query);

function generateRandomString($length = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

if (empty($_SESSION['username'])) {
    header("Location: error.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Produk</title>

    <link rel="stylesheet" href="assets/css/main/app.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/css/shared/iconly.css">

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
                <h3>Edit Produk</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-12">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <a href="produk.php" class="btn btn-secondary"><i class="fa-solid fa-arrow-left"></i>&nbsp;Kembali</a>
                                    </div>
                                    <div class="card-body">
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <div class="mb-3">
                                                <label for="nama" class="form-label">Nama</label>
                                                <input type="text" name="nama" id="nama" class="form-control" value="<?= $data['nama']; ?>" autocomplete="off" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="harga" class="form-label">Harga</label>
                                                <input type="number" name="harga" id="harga" class="form-control" value="<?= $data['harga']; ?>" required>
                                            </div>
                                            <div>
                                                <label for="currentFoto">Foto Produk Sekarang</label>
                                                <img src="./upload/<?= $data['foto']; ?>" width="300">
                                            </div>
                                            <div class="mb-3">
                                                <label for="foto" class="form-label">Foto</label>
                                                <input type="file" name="foto" id="foto" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label for="detail" class="form-label">Detail</label>
                                                <textarea name="detail" id="detail" cols="30" rows="10" class="form-control"><?= $data['detail']; ?></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <button type="submit" class="btn btn-primary" name="simpan"><i class="fa-solid fa-check"></i>&nbsp;Update</button>
                                            </div>
                                        </form>
                                        <?php
                                        if (isset($_POST['simpan'])) {
                                            $nama = htmlspecialchars($_POST['nama']);
                                            $harga = htmlspecialchars($_POST['harga']);
                                            $detail = htmlspecialchars($_POST['detail']);

                                            $target_dir = "./upload/";
                                            $random_name = generateRandomString(20);
                                            $nama_file = $random_name . substr(md5(rand(1, 213213212)), 1, 5) . "_" . str_replace(array('\'', '', '', '`'), '_', $_FILES["foto"]["name"]);
                                            $target_file = $target_dir . $nama_file;
                                            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                                            $image_size = $_FILES["foto"]["size"];
                                            $new_name = $nama_file;

                                            if ($nama == '' || $harga == '') {
                                        ?>
                                                <div class="alert alert-warning mt-3" role="alert">
                                                    Nama dan Harga Wajib Diisi
                                                </div>
                                                <?php
                                            } else {
                                                $queryUpdate = mysqli_query($koneksi, "UPDATE produk SET nama = '$nama', harga = '$harga', detail = '$detail' WHERE id = $id");
                                                if ($queryUpdate) {
                                                ?>
                                                    <div class="alert alert-primary mt-3" role="alert">
                                                        Produk Berhasil Diupdate
                                                    </div>

                                                    <meta http-equiv="refresh" content="2, url=produk.php" />
                                                    <?php

                                                    if ($nama_file != '' && $imageFileType != '') {
                                                        if ($image_size > 1000000) {
                                                    ?>
                                                            <div class="alert alert-warning mt-3" role="alert">
                                                                File tidak boleh lebih dari 1 MB
                                                            </div>
                                                            <?php
                                                        } else {
                                                            if ($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'jpeg' && $imageFileType != 'gif') {
                                                            ?>
                                                                <div class="alert alert-warning mt-3" role="alert">
                                                                    File wajib bertipe JPG atau PNG atau JPEG atau GIF
                                                                </div>
                                                                <?php
                                                            } else {
                                                                move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file);

                                                                $queryUpdateFoto = mysqli_query($koneksi, "UPDATE produk SET foto = '$new_name' WHERE id = $id");
                                                                if ($queryUpdateFoto) {
                                                                ?>
                                                                    <div class="alert alert-primary mt-3" role="alert">
                                                                        Foto Berhasil Diupdate
                                                                    </div>

                                                                    <meta http-equiv="refresh" content="2, url=produk.php" />
                                        <?php
                                                                } else {
                                                                    echo mysqli_error($koneksi);
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                        ?>
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
    <script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('detail');
    </script>

</body>

</html>