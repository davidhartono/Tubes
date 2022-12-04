<?php

require('./includes/koneksi.php');

if (isset($_POST['btnsignup'])) {
  $user = $_POST['username'];
  $pass = $_POST['password']; // SHA1
  $nama = $_POST['nama'];
  $email = $_POST['email'];

  $sql = "INSERT INTO akun (username,password,nama,email) VALUES ('$user','$pass','$nama','$email')";

  if($koneksi -> query($sql)===TRUE){
      echo "Registrasi Akun Anda Berhasil";
  } else {
      echo "Terjadi kesalahan : ".$sql. "<br/>".$koneksi->error;

  }
  $koneksi->close();
}


if(isset($_POST['btnlogin'])){
	$user_login = $_POST['username'];
	$user_pass = $_POST['password'];

	$sql = "SELECT * FROM akun WHERE username = '$user_login' and password = '$user_pass'";
	$query = mysqli_query($koneksi, $sql);

	if(!$query){
		die("Query gagal".mysqli_error($koneksi));
	}
	while ($row = mysqli_fetch_array($query)){
		$user = $row['username'];
		$pass = $row['password'];
		$nama = $row['nama'];
		$email = $row['email'];
	}

	if($user_login == $user && $user_pass == $pass){
		header ("Location: landingpage.php");
		$_SESSION['username'] = $user;
		$_SESSION['nama'] = $nama;
		$_SESSION['email'] = $email;
	} else {
		echo "User tidak ditemukan.";
	}
}

?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>COFTEA</title>
  <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
</head><link rel="stylesheet" href="./css/register.css">

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
            <input id="login-username" type="eusername" name="username" required>
          </div>
          <div class="input-block">
            <label for="login-password">Password</label>
            <input id="login-password" type="password" name="password" required>
          </div>
        </fieldset>
        <button type="submit" class="btn-login" name="btnlogin">Login</button>
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
            <label for="signup-nama">Nama</label>
            <input id="signup-nama" type="text" name="nama" required>
          </div>
          <div class="input-block">
            <label for="signup-username">Username</label>
            <input id="signup-username" type="text" name="username" required>
          </div>
          <div class="input-block">
            <label for="signup-email">E-mail</label>
            <input id="signup-email" type="email" name="email" required>
          </div>
          <div class="input-block">
            <label for="signup-password">Password</label>
            <input id="signup-password" type="password" name="password" required>
          </div>
        </fieldset>
        <button type="submit" class="btn-signup" name="btnsignup">Continue</button>
      </form>
    </div>
  </div>
</section>
<!-- partial -->
  <script  src="./js/register.js"></script>

</body>
</html>