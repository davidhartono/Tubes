<!DOCTYPE php>
<php lang="en">
<head>
    <title>COFTEA</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/menu.css">

</head>
<body>
    
<!-- header section starts  -->

<header class="header">

    <a href="index.php" class="logo">
        COFTEA
    </a>

    <nav class="navbar">
        <a href="menu.php">Menu</a>
        <a href="bundle.php">Bundle</a>
        <a href="about.php">About Us</a>
        <a href="contact.php">Contact</a>
    </nav>

    <div class="icons">
        <div class="fas fa-shopping-cart" id="cart-btn"></div>
        <div class="fas fa-bars" id="menu-btn"></div>
        <div class="fas fa-user"><a href="login/login.php" class="login-btn">
        <?php
            require("includes/koneksi.php");
            if (empty($_SESSION['username'])) {
                echo "Login";
            }else{
                echo $_SESSION['username'];
            }
        ?>
        </a></div>
    </div>

    <div class="cart-items-container">
        <div class="cart-item">
            <span class="fas fa-times"></span>
            <img src="media/cold coffees/item-1.png" alt="">
            <div class="content">
                <h3>cart item 01</h3>
                <div class="price">$15.99/-</div>
            </div>
        </div>
        <div class="cart-item">
            <span class="fas fa-times"></span>
            <img src="media/cold coffees/item-2.png" alt="">
            <div class="content">
                <h3>cart item 02</h3>
                <div class="price">$15.99/-</div>
            </div>
        </div>
        <div class="cart-item">
            <span class="fas fa-times"></span>
            <img src="media/cold coffees/item-3.png" alt="">
            <div class="content">
                <h3>cart item 03</h3>
                <div class="price">$15.99/-</div>
            </div>
        </div>
        <div class="cart-item">
            <span class="fas fa-times"></span>
            <img src="media/cold coffees/item-4.png" alt="">
            <div class="content">
                <h3>cart item 04</h3>
                <div class="price">$15.99/-</div>
            </div>
        </div>
        <a href="#" class="btn">checkout now</a>
    </div>

</header>

<!-- header section ends -->

<!-- CONTENT -->

<div class="container">

    <h3 class="title"> MENU </h3>
 
    <div class="products-container">
 
       <div class="product" data-name="p-1">
            <a href="">
                <img src="media/cold coffees/cold brew latte.png" alt="">
                <h3>Cold Brew</h3>
                <div class="price"></div>
            </a>
       </div>
 
       <div class="product" data-name="p-2">
            <a href="">
                <img src="media/iced teas/iced english breakfast tea.png" alt="">
                <h3>Cold Tea</h3>
                <div class="price"></div>
            </a>
       </div>
 
       <div class="product" data-name="p-3">
            <a href="">
                <img src="media/hot cofees/caffe americano.png" alt="">
                <h3>Hot Brew</h3>
                <div class="price"></div>
            </a>
       </div>
 
       <div class="product" data-name="p-4">
            <a href="">
                <img src="media/hot tea/My project (72).png" alt="">
                <h3>Hot Tea</h3>
                <div class="price"></div>
            </a>
       </div>
 
    </div>
 
 </div>
 
 <div class="preview" >
    <div class="products-preview">
 
        <div class="preview" data-target="p-1">
        <i class="fas fa-times"></i>
        <img src="media/cold coffees/cold brew latte.png" alt="">
        <h3>Cold Brew</h3>
        <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
            <span>( 250 )</span>
        </div>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur, dolorem.</p>
        <div class="price"></div>
        <div class="buttons">
            <a href="#" class="buy">buy now</a>
            <a href="#" class="cart">add to cart</a>
        </div>
        </div>
    
        <div class="preview" data-target="p-2">
        <i class="fas fa-times"></i>
        <img src="media/cold coffees/" alt="">
        <h3>organic onions</h3>
        <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
            <span>( 250 )</span>
        </div>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur, dolorem.</p>
        <div class="price"></div>
        <div class="buttons">
            <a href="#" class="buy">buy now</a>
            <a href="#" class="cart">add to cart</a>
        </div>
        </div>
    
        <div class="preview" data-target="p-3">
        <i class="fas fa-times"></i>
        <img src="media/cold coffees/" alt="">
        <h3>organic tomatoes</h3>
        <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
            <span>( 250 )</span>
        </div>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur, dolorem.</p>
        <div class="price"></div>
        <div class="buttons">
            <a href="#" class="buy">buy now</a>
            <a href="#" class="cart">add to cart</a>
        </div>
        </div>
    
        <div class="preview" data-target="p-4">
        <i class="fas fa-times"></i>
        <img src="media/cold coffees/" alt="">
        <h3>organic brinjal</h3>
        <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
            <span>( 250 )</span>
        </div>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur, dolorem.</p>
        <div class="price"></div>
        <div class="buttons">
            <a href="#" class="buy">buy now</a>
            <a href="#" class="cart">add to cart</a>
        </div>
        </div>
    
        <div class="preview" data-target="p-5">
        <i class="fas fa-times"></i>
        <img src="media/cold coffees/" alt="">
        <h3>organic broccoli</h3>
        <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
            <span>( 250 )</span>
        </div>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur, dolorem.</p>
        <div class="price"></div>
        <div class="buttons">
            <a href="#" class="buy">buy now</a>
            <a href="#" class="cart">add to cart</a>
        </div>
        </div>
    
        <div class="preview" data-target="p-6">
        <i class="fas fa-times"></i>
        <img src="media/cold coffees/" alt="">
        <h3>organic potatoes</h3>
        <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
            <span>( 250 )</span>
        </div>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur, dolorem.</p>
        <div class="price"></div>
        <div class="buttons">
            <a href="#" class="buy">buy now</a>
            <a href="#" class="cart">add to cart</a>
        </div>
        </div>
    </div>
 
 </div>

  <!-- CONTENT END -->

<!-- footer section starts  -->
    <footer class="footer">

        <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
        </div>

        <div class="links">
            <a href="#" class="third">Terms & Conditions</a>
            <a href="#" class="third">Cookie Policy</a>
            <p class="third">Address</p>
            <p class="third">Contact:</p>
        </div>

        <div class="links">
            <a href="#" class="third">Privacy Policy</a>
            <a href="#" class="third">FAQ</a>
            <p class="third">University of Sumatera Utara</p>
        </div>

        <div class="links">
            <a href="#" class="third">coftea@gmail.com</a>
            <a href="#" class="third">Shipping Policy</a>
            <a href="#" class="third">Payment Methods</a>
        </div>

        <div class="links">
            <p class="third">Dr. Mansyur St.</p>
            <p class="third">+62 812 3456 789</p>
            <a href="#" class="third">Refund Policy</a>
        </div>

        <div class="links">
            <p class="third"></p>
            <p class="third">Medan, Indonesia</p>
            <p class="third"></p>
            <p class="third"></p>
            <p class="third"></p>
            <p class="third"></p>
            <p class="third"></p>
            <p class="third"></p>
            <p class="third"></p>
        </div>

        <div class="credit"><p>&copy; 2022 by Coftea | Kelompok 6B</p></div>

    </footer>


<!-- footer section ends -->


<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</php>