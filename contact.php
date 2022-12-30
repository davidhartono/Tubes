<?php

include 'header.php';

?>

<section class="contact" id="contact">

    <div class="row">
        
        <h3>Get in Touch</h3>
        <p>Fill in the form with your questions, comments and concerns.</p>
        <br><br><br><br>

        <h4>Other ways to reach us</h4>
        <div class="share">
            <a href="https://www.instagram.com/coftea.cafe/" class="fab fa-instagram"><h4>@coftea</h4></a>
            <a href="https://github.com/davidhartono" class="fab fa-whatsapp"><h4>+62 812 3456 789</h4></a>
        </div>

    </div>

    <div class="row">
        <form method="GET">
            <div class="inputBox">
                <span class="fas fa-user"></span>
                <input type="text" placeholder="<?=$_SESSION['username']?>" required>
            </div>
            <div class="inputBox">
                <span class="fas fa-envelope"></span>
                <input type="email" placeholder="<?=$_SESSION['email']?>" required>
            </div>
            <div class="inputBox">
                <span class="fas fa-phone"></span>
                <input type="text" placeholder="Message">
            </div>
                <input type="submit" value="submit" class="btn">
        </form>
    </div>

</section>


<?php

include 'footer.php';

?>