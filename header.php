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
        <?php

            $select_rows = mysqli_query($koneksi, "SELECT sum(jumlah) FROM cart");
            $row_count = mysqli_fetch_array($select_rows);

        ?>
        <div class="fas fa-shopping-cart" id="cart-btn"><a href="cart.php">&nbsp;&nbsp;<?= $row_count['sum(jumlah)'] ?></a></div>
        <div class="fas fa-bars" id="menu-btn"></div>
        
        <?php
            require("includes/koneksi.php");
            if (empty($_SESSION['username'])) {
                echo '<div class="fas fa-user"><a href="login/login.php" class="login-btn">';
                echo "Login";
        
        ?>

        </a></div>


        <?php
        
        }else{
            
            echo '<div class="fas fa-user"><a href="profil.php" class="login-btn">';
            echo $_SESSION['username'];

            ?>
        </a></div>
        <div class="fas fa-door"><a href="logout.php" onclick="return confirm('Yakin ingin logout?')">Logout</a></div>

        <?php
        }
        ?>
    </div>

</header>

<!-- header section ends -->