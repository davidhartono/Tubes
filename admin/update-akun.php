<?php
require("../includes/koneksi.php");

$id = $_GET['id'];

$query = mysqli_query($koneksi, "SELECT * FROM akun WHERE id = '$id'");
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
    <title>Update Akun</title>

    <link rel="stylesheet" href="assets/css/main/app.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous"
        referrerpolicy="no-referrer" />
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
                <h3>Edit User</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-12">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <a href="akun.php" class="btn btn-secondary"><i class="fa-solid fa-arrow-left"></i>&nbsp;Kembali</a>
                                    </div>
                                    <div class="card-body">
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="email" name="email" id="email" class="form-control" value="<?= $data['email']; ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="username" class="form-label">Username (3 - 16 characters)</label>
                                                <input type="text" name="username" id="username" class="form-control" minlength="3" maxlength="16" value="<?= $data['username']; ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="password" class="form-label">Password (8 - 16 characters)</label>
                                                <input type="password" name="password" id="password" class="form-control" minlength="8" maxlength="16" value="<?= $data['password']; ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <button type="submit" class="btn btn-primary" name="simpan"><i class="fa-solid fa-check"></i>&nbsp;Update</button>
                                            </div>
                                        </form>
                                        <?php
                                        if (isset($_POST['simpan'])) {
                                            $email = $_POST['email'];
                                            $username = $_POST['username'];
                                            $password = $_POST['password'];

                                            $hash = password_hash($password, PASSWORD_DEFAULT);
                                            $cekEmail = mysqli_query($koneksi, "SELECT * FROM akun WHERE email = '$email'");
                                            if (mysqli_num_rows($cekEmail) > 0) {
                                                ?>
                                        <div class="alert alert-warning mt-3" role="alert">
                                            Email Sudah Terdaftar
                                        </div>
                                        <?php
                                            } else {
                                                if ($email == '' || $username == '' || $password == '') {
                                                    ?>
                                        <div class="alert alert-warning mt-3" role="alert">
                                            Email, Username dan Password Wajib Diisi
                                        </div>
                                        <?php
                                                } else {
                                                    $queryUpdate = mysqli_query($koneksi, "UPDATE akun SET email = '$email', username = '$username', password = '$hash' WHERE id = $id");
                                                    if ($queryUpdate) {
                                                        ?>
                                        <div class="alert alert-primary mt-3" role="alert">
                                            Data Akun Berhasil Diupdate
                                        </div>

                                        <meta http-equiv="refresh" content="2, url=akun.php" />
                                        <?php
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

</body>

</html>