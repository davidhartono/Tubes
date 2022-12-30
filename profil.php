<?php

include 'header.php';

?>

<section class="profil">
    <div class="title">
        <h2>Profile</h2>
    </div>
    <div class="row">
        <form method="POST">
            <div class="inputBox">
                <span class="fas fa-envelope"></span>
                <input type="email" value="<?=$_SESSION['email']?>" required>
            </div>
            <div class="inputBox">
                <span class="fas fa-user"></span>
                <input type="text" value="<?=$_SESSION['username']?>" required>
            </div>
            
            <div class="inputBox">
                <span class="fas fa-lock"></span>
                <input type="password" value="<?=$_SESSION['password']?>">
            </div>
                <button type="submit" class="cancel-btn" name="cancel">Cancel</button>
                <button type="submit" class="save-btn" name="save">Save</button>
        </form>
    </div>

</section>


<?php

include 'footer.php';

?>