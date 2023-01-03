<?php

include './includes/koneksi.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>COFTEA</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
    
<!-- header section starts  -->

<header class="header">

    <a href="index.php" class="logo">
        COFTEA
    </a>

    <nav class="navbar">
        <a href="index.php">Home</a>
        <a href="menu.php">Menu</a>
        <a href="about.php">About Us</a>
        <a href="contact.php">Contact</a>
    </nav>

    <div class="icons">
        <div class="fas fa-bars" id="menu-btn"></div>
        <?php

            $select_rows = mysqli_query($koneksi, "SELECT sum(jumlah) FROM cart");
            $row_count = mysqli_fetch_array($select_rows);

            require("includes/koneksi.php");
            if (empty($_SESSION['username'])) {
                echo '<div class="fas fa-user"><a href="login/login.php" class="login-btn">';
                echo "Login";
        
        ?>

        </a></div>


        <?php
        
        }else{
            echo "<div><a href='cart.php' class='tombol'><i class='fas fa-shopping-cart'></i>&nbsp;&nbsp;".$row_count['sum(jumlah)']." </a></div>";
            echo '<div><a href="profil.php" class="login-btn"><i class="fas fa-user"></i>&nbsp;&nbsp;';
            echo $_SESSION['username'];
            
            ?>
        </a></div>
        <div><a href="history.php"><i class="fas fa-history"></i></a></div>
        <div><a href="logout.php?logout_user" onclick="return confirm('Yakin ingin logout?')"><i class="fas fa-sign-out-alt"></i></a></div>

        <?php
        }
        ?>
    </div>

</header>

<!-- header section ends -->