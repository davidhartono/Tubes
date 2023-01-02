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
                     <h3><?= $data['nama']; ?></h3>
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
               $insert_product = mysqli_query($koneksi, "INSERT INTO cart (nama, harga, kategori, foto, jumlah) VALUES('$nama_produk', '$harga_produk', '$kategori', '$foto_produk', '$jumlah_produk')");
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


<!-- <div class="preview" >
<div class="products-preview">

   <div class="preview" data-target="p-1">
      <i class="fas fa-times"></i>
      <img src="../media/cold coffees/brown sugar iced shaken espresso.png" alt="">
      <h3>brown sugar iced shaken espresso</h3>
      <div class="stars">
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star-half-alt"></i>
         <span>( 250 )</span>
      </div>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur, dolorem.</p>
      <div class="price">$2.00</div>
      <div class="buttons">
         <a href="#" class="buy">buy now</a>
         <a href="#" class="cart">add to cart</a>
      </div>
   </div>

   <div class="preview" data-target="p-2">
      <i class="fas fa-times"></i>
      <img src="../media/cold coffees/classic affogato.png" alt="">
      <h3>classic affogato</h3>
      <div class="stars">
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star-half-alt"></i>
         <span>( 250 )</span>
      </div>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur, dolorem.</p>
      <div class="price">$2.00</div>
      <div class="buttons">
         <a href="#" class="buy">buy now</a>
         <a href="#" class="cart">add to cart</a>
      </div>
   </div>

   <div class="preview" data-target="p-3">
      <i class="fas fa-times"></i>
      <img src="../media/cold coffees/cold brew latte.png" alt="">
      <h3>cold brew latte</h3>
      <div class="stars">
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star-half-alt"></i>
         <span>( 250 )</span>
      </div>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur, dolorem.</p>
      <div class="price">$2.00</div>
      <div class="buttons">
         <a href="#" class="buy">buy now</a>
         <a href="#" class="cart">add to cart</a>
      </div>
   </div>


   <div class="preview" data-target="p-4">
      <i class="fas fa-times"></i>
      <img src="../media/cold coffees/cold brew with milk.png" alt="">
      <h3>cold brew with milk</h3>
      <div class="stars">
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star-half-alt"></i>
         <span>( 250 )</span>
      </div>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur, dolorem.</p>
      <div class="price">$2.00</div>
      <div class="buttons">
         <a href="#" class="buy">buy now</a>
         <a href="#" class="cart">add to cart</a>
      </div>
   </div>

   <div class="preview" data-target="p-5">
      <i class="fas fa-times"></i>
      <img src="../media/cold coffees/cold brew with salted caramel cream.png" alt="">
      <h3>cold brew with salted caramel cream</h3>
      <div class="stars">
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star-half-alt"></i>
         <span>( 250 )</span>
      </div>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur, dolorem.</p>
      <div class="price">$2.00</div>
      <div class="buttons">
         <a href="#" class="buy">buy now</a>
         <a href="#" class="cart">add to cart</a>
      </div>
   </div>

   <div class="preview" data-target="p-6">
      <i class="fas fa-times"></i>
      <img src="../media/cold coffees/cold brew with vanilla sweet cream.png" alt="">
      <h3>cold brew with vanilla sweet cream</h3>
      <div class="stars">
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star-half-alt"></i>
         <span>( 250 )</span>
      </div>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur, dolorem.</p>
      <div class="price">$2.00</div>
      <div class="buttons">
         <a href="#" class="buy">buy now</a>
         <a href="#" class="cart">add to cart</a>
      </div>
   </div>

   <div class="preview" data-target="p-7">
      <i class="fas fa-times"></i>
      <img src="../media/cold coffees/cold brew.png" alt="">
      <h3>cold brew.png</h3>
      <div class="stars">
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star-half-alt"></i>
         <span>( 250 )</span>
      </div>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur, dolorem.</p>
      <div class="price">$2.00</div>
      <div class="buttons">
         <a href="#" class="buy">buy now</a>
         <a href="#" class="cart">add to cart</a>
      </div>
   </div>

   <div class="preview" data-target="p-8">
      <i class="fas fa-times"></i>
      <img src="../media/cold coffees/iced americano.png" alt="">
      <h3>iced americano</h3>
      <div class="stars">
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star-half-alt"></i>
         <span>( 250 )</span>
      </div>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur, dolorem.</p>
      <div class="price">$2.00</div>
      <div class="buttons">
         <a href="#" class="buy">buy now</a>
         <a href="#" class="cart">add to cart</a>
      </div>
   </div>

   <div class="preview" data-target="p-9">
      <i class="fas fa-times"></i>
      <img src="../media/cold coffees/iced cappucino.png" alt="">
      <h3>iced cappucino</h3>
      <div class="stars">
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star-half-alt"></i>
         <span>( 250 )</span>
      </div>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur, dolorem.</p>
      <div class="price">$2.00</div>
      <div class="buttons">
         <a href="#" class="buy">buy now</a>
         <a href="#" class="cart">add to cart</a>
      </div>
   </div>

   <div class="preview" data-target="p-10">
      <i class="fas fa-times"></i>
      <img src="../media/cold coffees/iced caramel macchiato.png" alt="">
      <h3>iced caramel macchiato</h3>
      <div class="stars">
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star-half-alt"></i>
         <span>( 250 )</span>
      </div>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur, dolorem.</p>
      <div class="price">$2.00</div>
      <div class="buttons">
         <a href="#" class="buy">buy now</a>
         <a href="#" class="cart">add to cart</a>
      </div>
   </div>

   <div class="preview" data-target="p-11">
      <i class="fas fa-times"></i>
      <img src="../media/cold coffees/iced dalgona coffee.png" alt="">
      <h3>iced dalgona coffee</h3>
      <div class="stars">
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star-half-alt"></i>
         <span>( 250 )</span>
      </div>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur, dolorem.</p>
      <div class="price">$2.00</div>
      <div class="buttons">
         <a href="#" class="buy">buy now</a>
         <a href="#" class="cart">add to cart</a>
      </div>
   </div>

   <div class="preview" data-target="p-12">
      <i class="fas fa-times"></i>
      <img src="../media/cold coffees/iced espresso and matcha fusion.png" alt="">
      <h3>iced espresso and matcha fusion</h3>
      <div class="stars">
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star-half-alt"></i>
         <span>( 250 )</span>
      </div>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur, dolorem.</p>
      <div class="price">$2.00</div>
      <div class="buttons">
         <a href="#" class="buy">buy now</a>
         <a href="#" class="cart">add to cart</a>
      </div>
   </div>

   <div class="preview" data-target="p-13">
      <i class="fas fa-times"></i>
      <img src="../media/cold coffees/iced honey oatmilk latte.png" alt="">
      <h3>iced honey oatmilk latte</h3>
      <div class="stars">
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star-half-alt"></i>
         <span>( 250 )</span>
      </div>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur, dolorem.</p>
      <div class="price">$2.00</div>
      <div class="buttons">
         <a href="#" class="buy">buy now</a>
         <a href="#" class="cart">add to cart</a>
      </div>
   </div>

   <div class="preview" data-target="p-14">
      <i class="fas fa-times"></i>
      <img src="../media/cold coffees/iced latte.png" alt="">
      <h3>iced latte</h3>
      <div class="stars">
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star-half-alt"></i>
         <span>( 250 )</span>
      </div>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur, dolorem.</p>
      <div class="price">$2.00</div>
      <div class="buttons">
         <a href="#" class="buy">buy now</a>
         <a href="#" class="cart">add to cart</a>
      </div>
   </div>

   <div class="preview" data-target="p-15">
      <i class="fas fa-times"></i>
      <img src="../media/cold coffees/jeju forest cold brew.png" alt="">
      <h3>jeju forest cold brew</h3>
      <div class="stars">
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star-half-alt"></i>
         <span>( 250 )</span>
      </div>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur, dolorem.</p>
      <div class="price">$2.00</div>
      <div class="buttons">
         <a href="#" class="buy">buy now</a>
         <a href="#" class="cart">add to cart</a>
      </div>
   </div>

   <div class="preview" data-target="p-16">
      <i class="fas fa-times"></i>
      <img src="../media/cold coffees/lotus biscoff coffee.png"alt="">
      <h3>lotus biscoff coffee</h3>
      <div class="stars">
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star-half-alt"></i>
         <span>( 250 )</span>
      </div>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur, dolorem.</p>
      <div class="price">$2.00</div>
      <div class="buttons">
         <a href="#" class="buy">buy now</a>
         <a href="#" class="cart">add to cart</a>
      </div>
   </div>

   <div class="preview" data-target="p-17">
      <i class="fas fa-times"></i>
      <img src="../media/cold coffees/mint cold brew.png" alt="">
      <h3>mint cold brew</h3>
      <div class="stars">
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star-half-alt"></i>
         <span>( 250 )</span>
      </div>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur, dolorem.</p>
      <div class="price">$2.00</div>
      <div class="buttons">
         <a href="#" class="buy">buy now</a>
         <a href="#" class="cart">add to cart</a>
      </div>
   </div>

   <div class="preview" data-target="p-18">
      <i class="fas fa-times"></i>
      <img src="../media/cold coffees/nitro cold brew with vanilla sweet cream.png" alt="">
      <h3>nitro cold brew with vanilla sweet cream</h3>
      <div class="stars">
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star-half-alt"></i>
         <span>( 250 )</span>
      </div>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur, dolorem.</p>
      <div class="price">$2.00</div>
      <div class="buttons">
         <a href="#" class="buy">buy now</a>
         <a href="#" class="cart">add to cart</a>
      </div>
   </div>

   <div class="preview" data-target="p-19">
      <i class="fas fa-times"></i>
      <img src="../media/cold coffees/nitro cold brew.png" alt="">
      <h3>nitro cold brew</h3>
      <div class="stars">
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star-half-alt"></i>
         <span>( 250 )</span>
      </div>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur, dolorem.</p>
      <div class="price">$2.00</div>
      <div class="buttons">
         <a href="#" class="buy">buy now</a>
         <a href="#" class="cart">add to cart</a>
      </div>
   </div>


   <div class="preview" data-target="p-20">
      <i class="fas fa-times"></i>
      <img src="../media/cold coffees/nitro vanilla cream.png" alt="">
      <h3>nitro vanilla cream</h3>
      <div class="stars">
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star-half-alt"></i>
         <span>( 250 )</span>
      </div>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur, dolorem.</p>
      <div class="price">$2.00</div>
      <div class="buttons">
         <a href="#" class="buy">buy now</a>
         <a href="#" class="cart">add to cart</a>
      </div>
   </div>

   <div class="preview" data-target="p-21">
      <i class="fas fa-times"></i>
      <img src="../media/cold coffees/salted caramel cloud macchiato.png" alt="">
      <h3>salted caramel cloud macchiato</h3>
      <div class="stars">
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star-half-alt"></i>
         <span>( 250 )</span>
      </div>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur, dolorem.</p>
      <div class="price">$2.00</div>
      <div class="buttons">
         <a href="#" class="buy">buy now</a>
         <a href="#" class="cart">add to cart</a>
      </div>
   </div>


   <div class="preview" data-target="p-22">
      <i class="fas fa-times"></i>
      <img src="../media/cold coffees/Shakerato Bianco.png" alt="">
      <h3>Shakerato Bianco</h3>
      <div class="stars">
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star-half-alt"></i>
         <span>( 250 )</span>
      </div>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur, dolorem.</p>
      <div class="price">$2.00</div>
      <div class="buttons">
         <a href="#" class="buy">buy now</a>
         <a href="#" class="cart">add to cart</a>
      </div>
   </div>


   <div class="preview" data-target="p-23">
      <i class="fas fa-times"></i>
      <img src="../media/cold coffees/toffee nut crunch cold brew.png" alt="">
      <h3>toffee nut crunch cold brew</h3>
      <div class="stars">
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star-half-alt"></i>
         <span>( 250 )</span>
      </div>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur, dolorem.</p>
      <div class="price">$2.00</div>
      <div class="buttons">
         <a href="#" class="buy">buy now</a>
         <a href="#" class="cart">add to cart</a>
      </div>
   </div>

   <div class="preview" data-target="p-24">
      <i class="fas fa-times"></i>
      <img src="../media/cold coffees/vanilla cream cold brew.png" alt="">
      <h3>vanilla cream cold brew</h3>
      <div class="stars">
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star-half-alt"></i>
         <span>( 250 )</span>
      </div>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur, dolorem.</p>
      <div class="price">$2.00</div>
      <div class="buttons">
         <a href="#" class="buy">buy now</a>
         <a href="#" class="cart">add to cart</a>
      </div>
   </div>

   <div class="preview" data-target="p-25">
      <i class="fas fa-times"></i>
      <img src="../media/cold coffees/vietnamese coffee.png" alt="">
      <h3>vietnamese coffee</h3>
      <div class="stars">
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star-half-alt"></i>
         <span>( 250 )</span>
      </div>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur, dolorem.</p>
      <div class="price">$2.00</div>
      <div class="buttons">
         <a href="#" class="buy">buy now</a>
         <a href="#" class="cart">add to cart</a>
      </div>
   </div>
     -->
<!-- 
</div> -->


<!-- content section ends -->

<!-- footer section starts  -->

<?php

include 'footer.php';

?>