<?php
include './includes/koneksi.php';

if (session_destroy()) {
    if (isset($_GET['logout_user'])) {
        mysqli_query($koneksi, "DELETE FROM cart");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    Swal.fire({
        icon: 'success',
        text: 'Anda berhasil Log Out'
    }).then(function() {
        window.location = "login/login.php";
    })
    </script>
    <?php
}
    ?>
</body>

</html>