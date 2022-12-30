<?php

include './includes/koneksi.php';

if (isset($_POST['update_button'])) {
    $update_value = $_POST['update_jumlah'];
    $update_id = $_POST['update_jumlah_id'];
    $update_quantity_query = mysqli_query($koneksi, "UPDATE cart SET jumlah = '$update_value' WHERE id = '$update_id'");
    if ($update_quantity_query) {
        header('location:cart.php');
    };
};

include 'header.php';
echo "<link rel='stylesheet' href='css/cart.css'>";

?>


    <!-- CONTENT -->
      
    <section class="cart">
        <div class="content">
            
            <?php

            $query = mysqli_query($koneksi, "SELECT * FROM cart ");
            $grand_total = 0;
            if (mysqli_num_rows($query) > 0) {
                while ($data = mysqli_fetch_assoc($query)) {

                    ?>
        <h3 class="title">CART</h3>
            <table class="table">

                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                </tr>
                <tr>
                    <td>
                        <div class="cart-info">
                            <img src="admin/upload/<?= $data['foto']; ?>" alt="">
                            <div>
                                <h4><?= $data['nama']; ?></h3>
                                Rp <?= number_format($data['harga']); ?><br><br>
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
                        Rp <?= $sub_total = (int) $data['harga'] * (int) $data['jumlah']; ?>
                    </td>
                </tr>
                    <?php
                    $grand_total += $sub_total;
                }
                ;

                ?>
            </table>
            <div class="total-price">

            <table>
                <tr>
                    <td>Total</td>
                    <td>Rp <?= $grand_total; ?></td>
                </tr>
                <tr>
                    
                </tr>
            </table>

            </div>

            <div class="bottom">
                <a href="cart.php?delete_all" onclick="return confirm('Are you sure you want to remove all items?');" class="delete-btn">
                    <i class="fas fa-trash"></i> Remove all
                </a>
                <a href="#" class="checkout-btn">Checkout</a>
            </div>
            <div class="bottom">
                
            </div>

                    <?php
            } else {

                ?>
        <h4>Looks like your cart is empty</h4>
        <p>Let's find your favourite coffee and tea!</p>
        <a href="menu.php" class="menu-btn">Menu</a>

            <?php

        }
            
            ?>
        <?php


        if (isset($_GET['remove'])) {
            $remove_id = $_GET['remove'];
            mysqli_query($koneksi, "DELETE FROM cart WHERE id = '$remove_id'");
        ?>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

<div class="credit"><p>&copy; 2022 by Coftea | Kelompok 6B</p></div>

</footer>

<!-- footer section ends -->


        <!-- custom js file link  -->
        <script src="js/script.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
        </script>

    </body>
</html>