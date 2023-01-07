<?php
include './includes/koneksi.php';
include 'header.php';

echo "<script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
echo "<link rel='stylesheet' href='css/invoice.css'>";

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'admin/assets/extensions/phpmailer/src/Exception.php';
    require 'admin/assets/extensions/phpmailer/src/PHPMailer.php';
    require 'admin/assets/extensions/phpmailer/src/SMTP.php';


?>

<section class="cart">
    <div class="content">

        <?php

        $query = mysqli_query($koneksi, "SELECT * FROM cart");
        $orderid = $_GET['checkout'];
        $queryOrder = mysqli_query($koneksi, "SELECT * FROM orderan WHERE orderid = $orderid");
        $dataorder = mysqli_fetch_assoc($queryOrder);
        $grand_total = 0;
        if (mysqli_num_rows($query) > 0) {
        ?>

        <h3 class="harga">Your order has been received.</h3>
        <h4>Thank you for your purchase!</h4>
        <p style="margin-bottom : 2px;">Your Order ID: <b><?= $dataorder['orderid'] ?></b></p>
        <p  style="margin-bottom : 2em;">Order time: <b><?= $dataorder['tanggal'] ?></b></p>
        <p>Please check your email address.</p>

        <h4>Items ordered</h4>

        <table class="table">

            <tr>
                <th>Product Name</th>
                <th class="quantity">Quantity</th>
                <th>Subtotal</th>
            </tr>
            <?php
            
                if (isset($_GET['checkout'])) {
                    $mail = new PHPMailer(true);
                
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com';
                    $mail->SMTPAuth = true;
                    $mail->Username = 'noreplycoftea@gmail.com';
                    $mail->Password = 'xpvumsfbshlamriq';
                    $mail->SMTPSecure = 'ssl';
                    $mail->Port = 465;
                
                    $mail->setFrom('noreplycoftea@gmail.com');
                
                    $mail->addAddress($_SESSION['email']);
                
                    $mail->isHTML(true);
                    
                    $mail->Subject = 'Coftea Purchase Invoice';

                    $cart = array();
                    $body = 'Thank you for your purchase!<br>Order ID: '. $dataorder['orderid'] . '<br>Order time: '. $dataorder['tanggal'] .'<br>Items ordered:<br><br>';
                    $body .= '<table border="1"><tr><th>Product</th><th>Quantity</th><th>Price</th><th>Subtotal</th></tr>';

                while ($data = mysqli_fetch_assoc($query)) {
                    $sub_total = $data['harga'] * $data['jumlah'];

                    $rows[] = $data;

                    $body .= '<tr><td style="text-transform: capitalize;">';         
                    $body .= $data['nama'] . '</td><td>'; 
                    $body .= $data['jumlah'] . '</td><td>';  
                    $body .= $data['harga'] . '</td><td>';
                    $body .= $sub_total . '</td></tr>';  
                    
                    ?>
            <tr>
                <td>
                    <div class="cart-info">
                        <div>
                            <h5 style="text-transform: capitalize;"><?= $data['nama']; ?></h5>
                            Rp <?= number_format($data['harga']); ?><br><br>
                        </div>
                    </div>
                </td>

                <td class="quantity">
                    <?= $data['jumlah']; ?>
                </td>

                <td class="total">
                    Rp <?= number_format($sub_total) ?>
                </td>
            </tr>

            <?php
                    
                
                    // echo
                    //     "
                    // <script>
                    //     Swal.fire({
                    //         icon: 'success',
                    //         text: 'Your order has been placed.'
                    //     }).then(function() {
                    //     document.location.href='invoice.php';
                    //     })
                    // </script>
                    //     ";

                ?>
            <?php
                $grand_total += $sub_total;
                
                }
                $body .= '<tr><td colspan="3">';  
                $body .= 'Total</td><td>';
                $body .= $grand_total . '</td></tr>';
                $body .= '</table>';
                $body .= 'Please keep this email to use on item retrieval.';

                $mail->msgHTML($body);
                $mail->send();
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
            <a href="index.php" class="checkout-btn">Finish</a>
        </div>
        <?php
        }

        if(isset($_GET['checkout'])){
            mysqli_query($koneksi, "DELETE FROM cart");
        }
        ?>

    </div>

</section>

<?php

include 'footer.php';

?>