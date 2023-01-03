<?php

require "includes/koneksi.php";

$kategori = $_GET['kategori'];

$query = mysqli_query($koneksi, "SELECT * FROM produk WHERE kategori = '$kategori'");

include 'header.php';
echo "<link rel='stylesheet' href='css/catalogue.css'>";
echo "<script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
?>

<!-- content section -->
<div class="container">
    <?php
   if ($kategori == 'Cold Coffee') { ?>
    <h3 class="title"> Cold Coffees </h3>
    <?php
   }
   ?>
    <?php
   if ($kategori == 'Hot Coffee') { ?>
    <h3 class="title"> Hot Coffees </h3>
    <?php
   }
   ?>
    <?php
   if ($kategori == 'Cold Tea') { ?>
    <h3 class="title"> Cold Tea </h3>
    <?php
   }
   ?>
    <?php
   if ($kategori == 'Hot Tea') { ?>
    <h3 class="title"> Hot Tea </h3>
    <?php
   }
   ?>

    <div class="products-container">
        <?php
      while ($data = mysqli_fetch_assoc($query)) {
      ?>

        <div class="product">
            <a href="">
                <form action="" method="post">
                    <div class="box">
                        <img src="admin/upload/<?= $data['foto']; ?>" alt="">
                        <h3 style="text-transform: capitalize;"><?= $data['nama']; ?></h3>
                        <div class="price">Rp <?= $data['harga']; ?>/-</div>
                        <input type="hidden" name="nama_produk" value="<?= $data['nama']; ?>">
                        <input type="hidden" name="harga_produk" value="<?= $data['harga']; ?>">
                        <select name="kategori" hidden>
                            <option value="<?= $data['kategori'] ?>"></option>
                        </select>
                        <input type="hidden" name="foto_produk" value="<?= $data['foto']; ?>">
                        <input type="submit" class="btn" value="Add To Cart" name="tambah_ke_cart">
                    </div>
                </form>
            </a>
        </div>

        <?php
      }

      ?>
        <?php
      if (isset($_POST['tambah_ke_cart'])) {
      ?>
        <?php
         $nama_produk = $_POST['nama_produk'];
         $harga_produk = $_POST['harga_produk'];
         $kategori = $_POST['kategori'];
         $foto_produk = $_POST['foto_produk'];
         $jumlah_produk = 1;

         $select_cart = mysqli_query($koneksi, "SELECT * FROM cart WHERE nama = '$nama_produk'");
         if (empty($_SESSION['username'])) {
         ?>
        <script>
        Swal.fire({
            icon: 'warning',
            text: 'Anda Belum Login'
        }).then(function() {
            window.location = "login/login.php";
        })
        </script>
        <?php
         } else {
            if (mysqli_num_rows($select_cart) > 0) {
            ?>
        <script>
        Swal.fire({
            icon: 'warning',
            text: 'Produk Sudah Ada di Cart'
        })
        </script>
        <?php
            } else {
               $insert_product = mysqli_query($koneksi, "INSERT INTO cart (nama, harga, kategori, foto, jumlah) 
               VALUES ('$nama_produk', '$harga_produk', '$kategori', '$foto_produk', '$jumlah_produk')");
            ?>
        <script>
        Swal.fire({
            icon: 'success',
            text: 'Produk Berhasil Ditambahkan ke Cart'
        }).then(function() {
            window.location.replace(window.location.href);
        })
        </script>
        <?php
            }
         }
      }
      ?>
    </div>
</div>

<!-- content section ends -->

<!-- footer section starts  -->

<?php

include 'footer.php';

?>