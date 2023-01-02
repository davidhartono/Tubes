<?php

require('../includes/koneksi.php');
echo "<script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>";

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>COFTEA</title>
</head>
<link rel="stylesheet" href="../css/login.css">

</head>

<body>
  <!-- partial:index.partial.html -->
  <section class="forms-section">
    <h1 class="section-title">COFTEA</h1>
    <div class="forms">
      <div class="form-wrapper is-active">
        <button type="button" class="switcher switcher-login">
          Login
          <span class="underline"></span>
        </button>
        <form class="form form-login" method="POST">
          <fieldset>
            <legend>Please, enter your email and password for login.</legend>
            <div class="input-block">
              <label for="login-username">Username</label>
              <input id="login-username" type="username" name="username" required>
            </div>
            <div class="input-block">
              <label for="login-password">Password</label>
              <input id="login-password" type="password" name="password" required>
            </div>
            <?php
            if (isset($_POST['Login'])) {
              $user_login = $_POST['username'];
              $user_pass = $_POST['password'];

              $sql = "SELECT * FROM akun WHERE username = '$user_login'";
              $query = mysqli_query($koneksi, $sql);

              if (!$query) {
                die("Query gagal" . mysqli_error($koneksi));
              }

              while ($row = mysqli_fetch_array($query)) {
                $id = $row['id'];
                $email = $row['email'];
                $user = $row['username'];
                $pass = $row['password'];
                $role = $row['role'];
              }

              if ($query->num_rows > 0) {

                if (password_verify($user_pass, $pass)) {
                  if ($role == 1) {
                    header("Location: ../admin/index.php");
                    $_SESSION['id'] = $id;
                    $_SESSION['username'] = $user;
                    $_SESSION['email'] = $email;
                    $_SESSION['password'] = $pass;
                  } else {
                    header("Location: ../index.php");
                    $_SESSION['id'] = $id;
                    $_SESSION['username'] = $user;
                    $_SESSION['email'] = $email;
                    $_SESSION['password'] = $pass;
                  }
                } else {
                  echo "<p style=\"text-align: center\"></br><font color = red><b>Username atau Password Salah</b></font></p>";
                }
              } else {
                echo "<p style=\"text-align: center\"></br><font color = red><b> User Tidak Ditemukan </b></font></p>";
              }
            }
            ?>
          </fieldset>
          <button type="submit" class="btn-login" name="Login">Login</button>
        </form>
      </div>
      <div class="form-wrapper">
        <button type="button" class="switcher switcher-signup">
          Sign Up
          <span class="underline"></span>
        </button>
        <form class="form form-signup" method="POST">
          <fieldset>
            <legend>Please, enter your email, password and password confirmation for sign up.</legend>
            <div class="input-block">
              <label for="signup-email">E-mail</label>
              <input id="signup-email" type="email" name="email" required>
            </div>
            <div class="input-block">
              <label for="signup-username">Username (3 - 16 characters)</label>
              <input id="signup-username" type="text" name="username" minlength="3" maxlength="16" required>
            </div>
            <div class="input-block">
              <label for="signup-password">Password (8 - 16 characters)</label>
              <input id="signup-password" type="password" name="password" minlength="8" maxlength="16" required>
            </div>
            <?php
            if (isset($_POST['Signup'])) {
              $user = $_POST['username'];
              $pass = $_POST['password']; // SHA1
              $email = $_POST['email'];

              $hash = password_hash($pass, PASSWORD_DEFAULT);
              $cekEmail = mysqli_query($koneksi, "SELECT * FROM akun WHERE email = '$email'");
              $sql = "INSERT INTO akun (username,password,email) VALUES ('$user','$hash','$email')";

              if (mysqli_num_rows($cekEmail) > 0) {
            ?>
                <script>
                  Swal.fire({
                    icon: 'warning',
                    text: 'Email Sudah Terdaftar.'
                  })
                </script>
                <?php
              } else {
                if ($koneksi->query($sql) === TRUE) {
                ?>
                  <script>
                    Swal.fire({
                      icon: 'success',
                      text: 'Registrasi Akun Berhasil.'
                    })
                  </script>
            <?php
                } else {
                  echo "Terjadi kesalahan : " . $sql . "<br/>" . $koneksi->error;
                }
              }
              $koneksi->close();
            }
            ?>
          </fieldset>
          <button type="submit" class="btn-signup" name="Signup">Continue</button>
        </form>
      </div>
    </div>
  </section>
  <!-- partial -->
  <script src="../js/register.js"></script>
  <script>
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
  </script>
</body>

</html>