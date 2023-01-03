<?php

include 'header.php';

$id = $_SESSION['id'];
$query = mysqli_query($koneksi, "SELECT * FROM akun WHERE id = '$id'");
$data = mysqli_fetch_array($query);

echo "<script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
?>

<section class="profil">
    <div class="title">
        <h2>Profile</h2>
    </div>
    <div class="row">
        <form method="POST">
            <input type="hidden" name="id" value="<?= $id ?>">
            <div class="inputBox">
                <span class="fas fa-envelope"></span>
                <input type="email" name="email" value="<?= $data['email'] ?>" required>
            </div>
            <div class="inputBox">
                <span class="fas fa-user"></span>
                <input type="text" name="username" minlength="3" maxlength="16" value="<?= $data['username'] ?>" required>
            </div>

            <div class="inputBox">
                <span class="fas fa-lock"></span>
                <input type="password" name="password" minlength="8" maxlength="16" value="<?= $data['password'] ?>" required>
            </div>
            <button type="submit" class="cancel-btn" name="cancel">Cancel</button>
            <button type="submit" class="save-btn" name="save">Save</button>
        </form>
        <?php
        if (isset($_POST['save'])) {
            $id = $_POST['id'];
            $email = $_POST['email'];
            $username = $_POST['username'];
            $password = $_POST['password'];

            $hash = password_hash($password, PASSWORD_DEFAULT);
            if ($email == '' || $username == '' || $password == '') {
        ?>
                <script>
                    Swal.fire({
                        icon: 'warning',
                        text: 'Email, Username dan Password Wajib Diisi.'
                    })
                </script>
                <?php
            } else {
                $queryUpdate = mysqli_query($koneksi, "UPDATE akun SET username = '$username', password = '$hash', email = '$email' WHERE id = '$id'");
                if ($queryUpdate) {
                ?>
                    <script>
                        Swal.fire({
                            icon: 'success',
                            text: 'Update Profile Berhasil'
                        }).then(function() {
                            window.location = "profil.php";
                        })
                    </script>
        <?php
                }
            }
        }
        ?>
    </div>

</section>


<?php

include 'footer.php';

?>