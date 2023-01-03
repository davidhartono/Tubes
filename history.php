<?php

include 'header.php';

echo "<link rel='stylesheet' href='css/invoice.css'>";

if (empty($_SESSION['username'])) {
    header("Location: ./admin/error.php");
}
?>
<section class="cart">
    <div class="content">

        <?php
        $username = $_SESSION['username'];


        $query = mysqli_query($koneksi, "SELECT * FROM orderselesai WHERE username = '$username'");
        ?>

        <h3 class="harga">Purchase History</h3>


        <table class="table">

            <tr>
                <th>Product Name</th>
                <th class="quantity">Quantity</th>
            </tr>

            <tr>
                <?php
                if (mysqli_num_rows($query) > 0) {
                    while ($data = mysqli_fetch_assoc($query)) {

                ?>
                <td>
                    <div class="cart-info">
                        <div>
                            <h5 style="text-transform: capitalize;"><?= $data['produk']; ?></h5>
                        </div>
                    </div>
                </td>

                <td class="quantity">
                    <?= $data['item']; ?>
                </td>
            </tr>
            <?php
                    }
                }
    ?>
        </table>
    </div>
</section>

<?php


include 'footer.php';

?>