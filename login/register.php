<?php
require_once '../includes/koneksi.php';

$user = $_POST['username'];
$pass = $_POST['password'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$alamat = $_POST['alamat'];

$sql = "INSERT INTO akun (username, password, nama, email, alamat) VALUES ('$user', '$pass', '$nama', '$email', '$alamat')";

if($koneksi->query($sql)==TRUE){
    echo "Registrasi Akun Anda Berhasil";
} else {
    echo "Terjadi kesalahan: ".$sql."<br/>".$koneksi->error;
}
$koneksi->close();

?>

<script>
if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>