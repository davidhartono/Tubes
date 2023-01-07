<?php

include '../includes/koneksi.php';
include 'header.php';

echo "<link rel='stylesheet' href='css/payment.css'>";
echo "<script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>";

$orderid = $_GET['checkout'];

$query = mysqli_query($koneksi, "SELECT * FROM orderan WHERE orderid = '$orderid'");
$data = mysqli_fetch_assoc($query);
?>

<section class="profil">
    <div class="title">
        <h2>Payment</h2>
    </div>
    <div class="row">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="inputBox">
                <input type="hidden" name="orderid" value="<?= $data['orderid'] ?>" required>
            </div>
            <div class="inputBox">
                <input type="hidden" name="username" value="<?= $_SESSION['username'] ?>" required>
            </div>
            <div class="inputBox">
                <label for="metode">Payment Method</label>
                <select name="metode" id="metode">
                    <option value="">Choose one</option>
                    <option value="ovo">OVO</option>
                    <option value="gopay">GOPAY</option>
                    <option value="dana">DANA</option>
                </select>
            </div>
            <div class="inputBox">
                <label for="foto" class="form-label">Payment Proof</label>
                <input type="file" name="foto" id="foto" class="form-control">
            </div>
            <div class="inputBox" style="background-color: transparent;">
                <h4 style="font-size: 20px;">OVO &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: 0834-4234-8216</h4>
                <h4 style="font-size: 20px;">DANA &nbsp;&nbsp;: 0865-3216-8543</h4>
                <h4 style="font-size: 20px;">GOPAY : 0812-3821-9182</h4>
            </div>
            <div class="buttons">
                <button type="submit" class="cancel-btn" name="cancel">Cancel</button>
                <button type="submit" class="save-btn" name="simpan">Submit</button>
            </div>
        </form>

    </div>

</section>

<?php
if (isset($_POST['simpan'])) {
    $orderida = htmlspecialchars($_POST['orderid']);
    $username = htmlspecialchars($_POST['username']);
    $metode = htmlspecialchars($_POST['metode']);

    $file = $_FILES['foto'];

    $allowed_types = array("image/png", "image/jpg", "image/jpeg");


    if (in_array($file['type'], $allowed_types) && $file['size'] < 5000000) {

        $contents = file_get_contents($file['tmp_name']);


        $escaped_contents = mysqli_real_escape_string($koneksi, $contents);
    }
    $target_dir = "admin/bukti/";
    $foto = $orderida . "_" . rand(1, 213213212) . "_" . $file['name'];
    $target_path = $target_dir . $foto;


    if ($metode == '') {
?>
        <script>
            Swal.fire({
                icon: 'warning',
                text: 'Please choose a payment method.'
            })
        </script>
    <?php
    } elseif (!is_uploaded_file($_FILES['foto']['tmp_name']) || is_null($_FILES['foto']['tmp_name'])) {
    ?>
        <script>
            Swal.fire({
                icon: 'warning',
                text: 'Please upload payment proof.'
            })
        </script>
        <?php
    } else {
        $imageFileType = strtolower(pathinfo($target_path, PATHINFO_EXTENSION));
        if ($file['size'] > 5000000) {
        ?>
            <script>
                Swal.fire({
                    icon: 'warning',
                    text: 'File upload limit is 5 MB'
                })
            </script>
            <?php
        } else {
            if ($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'jpeg') {
            ?>
                <script>
                    Swal.fire({
                        icon: 'warning',
                        text: 'File type is only JPG, JPEG, and PNG type file.'
                    })
                </script>
                <?php
            } else {
                $target_dir = "admin/bukti/";
                $foto = $orderida . "_" . rand(1, 213213212) . "_" . $file['name'];
                $target_path = $target_dir . $foto;
                $queryTambah = mysqli_query($koneksi, "INSERT INTO bukti (orderid, username, metode, foto) VALUES ('$orderida', '$username', '$metode', '$foto')");
                move_uploaded_file($_FILES["foto"]["tmp_name"], $target_path);
                if ($queryTambah) {
                ?>

                    <script>
                        Swal.fire({
                            icon: 'success',
                            text: 'Your order has been placed.'
                        }).then(function() {
                            window.location = "invoice.php?checkout=<?= $orderid ?>";
                        })
                    </script>

<?php
                } else {
                    echo mysqli_error($koneksi);
                }
            }
        }
    }
}


?>


<?php

include 'footer.php';

?>