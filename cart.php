<?php

include './includes/koneksi.php';
include 'header.php';
echo "<link rel='stylesheet' href='css/cart.css'>";
echo "<script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>";


if (empty($_SESSION['username'])) {
    header("Location: ./admin/error.php");
}
?>


<!-- CONTENT -->

<section class="cart">
    <div class="content">

        <?php

        $query = mysqli_query($koneksi, "SELECT * FROM cart ");
        $grand_total = 0;
        if (mysqli_num_rows($query) > 0) {
        ?>
            <h3 class="title">CART</h3>
            <table class="table">

                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                </tr>
                <?php
                while ($data = mysqli_fetch_assoc($query)) {
                    $sub_total = $data['harga'] * $data['jumlah'];
                ?>
                    <tr>
                        <td>
                            <div class="cart-info">
                                <img src="admin/upload/<?= $data['foto']; ?>" alt="">
                                <div>
                                <h5 style="text-transform: capitalize;"><?= $data['nama']; ?></h5>
                                Rp <?= number_format($data['harga']); ?>
                                <input style="text-transform: capitalize;" type="hidden" name="produk" value="<?= $data['nama']; ?>">
                                <input type="hidden" value="<?=$data['harga']; ?>"><br><br>
                                <a href="cart.php?remove=<?= $data['id']; ?>" onclick="return confirm('Remove item from cart?')"><i class="fas fa-trash"></i> Remove</a>
                                </div>
                            </div>
                        </td>

                        <td>
                            <form action="" method="post">
                                <input type="hidden" name="update_jumlah_id" value="<?= $data['id']; ?>" class="form-control">
                                <input type="number" name="update_jumlah" min="1" value="<?= $data['jumlah']; ?>" class="form-control">
                                <input type="submit" value="Update" name="update_button" class="update-btn">
                            </form>
                        </td>

                        <td class="total">
                            Rp <?= number_format($sub_total) ?>
                            <input type="hidden" name="harga" value="<?= $sub_total ?>">
                            
                        </td>
                    </tr>
                <?php
                    $grand_total += $sub_total;


                    
                };

                ?>
            </table>
            <div class="total-price">

                <table>
                    <tr>
                        <td>Total</td>
                        <td>Rp <?= number_format($grand_total); ?></td>
                    </tr>
                    <tr>

                    </tr>
                </table>

            </div>

            <div class="bottom">
                
                <a href="cart.php?delete_all" onclick="return confirm('Are you sure you want to remove all items?');" class="delete-btn">
                Delete All
                </a>
                <a href="cart.php?orderan" onclick="return confirm('Are you sure you want to order these items?');" class="checkout-btn">Order Now</a>


            </div>

        <?php
        } else {

        ?>
            <h4>Oh, looks like your cart is empty.</h4>
            <p>Let's find your favourite coffee and tea!</p>
            <a href="menu.php" class="menu-btn">Menu</a>

        <?php

        }

        if (isset($_GET['orderan'])) {

            $query = mysqli_query($koneksi, "SELECT * FROM cart ");
            $a = mysqli_num_rows($query);

            while ($a > 0) {
                while ($data = mysqli_fetch_assoc($query)) {
                    $user = $_SESSION['username'];
                    $produk = $data['nama'];
                    $item = $data['jumlah'];
                    $harga = $data['harga'];
                    
                    $order = "INSERT INTO orderan (username,produk,item,harga) VALUES ('$user','$produk','$item','$harga')";

                    mysqli_query($koneksi, $order);

                }
                $a = $a - 1;
            }


            ?>

            <script>
                Swal.fire({
                    icon: 'success',
                    text: 'Your order has been placed.'
                }).then(function() {
                    window.location = "invoice.php?checkout";
                })
            </script>

        ?>
        <?php
        };
        
        
        ?>
        <?php
        if (isset($_POST['update_button'])) {
            
            $update_value = $_POST['update_jumlah'];
            $update_id = $_POST['update_jumlah_id'];
            $update_quantity_query = mysqli_query($koneksi, "UPDATE cart SET jumlah = '$update_value' WHERE id = '$update_id'");
            if ($update_quantity_query) {
        ?>
                <script>
                    Swal.fire({
                        icon: 'success',
                        text: 'Produk Berhasil Diupdate'
                    }).then(function() {
                        window.location = "cart.php";
                    })
                </script>
            <?php
            };
        };

        if (isset($_GET['remove'])) {
            $remove_id = $_GET['remove'];
            mysqli_query($koneksi, "DELETE FROM cart WHERE id = '$remove_id'");
            ?>

            <script>
                Swal.fire({
                    icon: 'success',
                    text: 'Produk Berhasil Dihapus'
                }).then(function() {
                    window.location = "cart.php";
                })
            </script>
        <?php
        };

        if (isset($_GET['delete_all'])) {
            mysqli_query($koneksi, "DELETE FROM cart");
        ?>

            <script>
                Swal.fire({
                    icon: 'success',
                    text: 'Seluruh Produk Berhasil Dihapus'
                }).then(function() {
                    window.location = "cart.php";
                })
            </script>
        <?php
        }
        ?>
    </div>
</section>
<!-- END OF CONTENT -->

<!-- footer section starts  -->

<footer class="footer">

    <div class="share">
        <a href="https://www.facebook.com/profile.php?id=100087675216631" class="fab fa-facebook-f"></a>
        <a href="https://twitter.com/Coftea" class="fab fa-twitter"></a>
        <a href="https://www.instagram.com/coftea.cafe/" class="fab fa-instagram"></a>
        <a href="https://github.com/davidhartono" class="fab fa-github"></a>
    </div>

    <div class="links">
        <p class="half">Faculty of Computer Science and Information Technology USU</p>
        <p class="half2"><i class="fab fa-whatsapp"></i> &nbsp;+62 812 3456 789</p>
        <p class="half">University of Sumatera Utara</p>
        <p class="half2"><i class="fa fa-envelope"></i> &nbsp;coftea@gmail.com</p>
        <p class="half">Medan, Indonesia</p>
    </div>

    <div class="third">
        <a href="tnc.php" class="third">Terms and Conditions</a>
    </div>

    <div class="credit">
        <p>&copy; 2022 by Coftea | Kelompok 6B</p>
    </div>

</footer>

<!-- footer section ends -->


<!-- custom js file link  -->
<script src="js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
</script>

</body>

</html>