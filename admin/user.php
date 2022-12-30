<?php

include('../includes/koneksi.php');
$query = mysqli_query($koneksi, "SELECT * FROM akun");

if (empty($_SESSION['username'])) {
    header("Location: error.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Customer</title>

    <link rel="stylesheet" href="assets/css/main/app.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/css/shared/iconly.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">

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
                <h3>Data Customer Coftea</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-12">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Tabel Akun Customer</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive mt-3">
                                            <table class="table table-striped" id="tabelakun">
                                                <thead class="table-dark">
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>Email</th>
                                                        <th>Username</th>
                                                        <th>Password</th>
                                                        <th class="text-center">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $jumlah = 1;
                                                    while ($data = mysqli_fetch_array($query)) {

                                                    ?>
                                                        <tr>
                                                            <td><?= $jumlah ?></td>
                                                            <td><?= $data['email'] ?></td>
                                                            <td><?= $data['username'] ?></td>
                                                            <td><?= $data['password'] ?></td>
                                                            <td class="text-center">
                                                                <a href="update-user.php?id=<?= $data['id']; ?>" class="btn btn-warning mb-2"><i class="fa-solid fa-pen-to-square"></i>&nbsp;Update</a>
                                                                <a href="delete-user.php?id=<?= $data['id']; ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin menghapus')"><i class="fa-solid fa-trash"></i>&nbsp;Delete</a>
                                                            </td>
                                                            </td>
                                                        </tr>
                                                    <?php
                                                        $jumlah++;
                                                    }

                                                    ?>
                                                </tbody>
                                            </table>
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
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#tabelakun').DataTable();
        });
    </script>

</body>

</html>