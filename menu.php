<?php

include 'header.php';

echo "<link rel='stylesheet' href='css/category.css'>";

?>

<!-- CONTENT -->
    
<div class="main">
    <div class="section-title">
        <h2>MENU</h2>
    </div>
    <div class="menus">
        <div class="menu-column">
            <h4>COFFEE</h4>
            <div class="single-menu">
                <a href="produk.php?kategori=Cold%20Coffee" ><img src="media/cold coffees/cold brew.png" alt="" >
                <div class="menu-content">
                    <h5>Cold Coffee</h5>
                    <p>Lorem ipsum dolor sit amet.</p></a>
                </div>
            </div>
            <div class="single-menu">
                <a href="produk.php?kategori=Hot%20Coffee"><img src="media/hot cofees/honey almondmilk  flat white.png" alt="">
                <div class="menu-content">
                    <h5>Hot Coffee</h5>
                    <p>Lorem ipsum dolor sit amet.</p></a>
                </div>
            </div>
        </div>
        <div class="menu-column">
            <h4>TEA</h4>
            <div class="single-menu">
                <a href="produk.php?kategori=Cold%20Tea"><img src="media/iced teas/iced earl grey tea.png" alt="">
                <div class="menu-content">
                    <h5>Cold Tea</h5>
                    <p>Lorem ipsum dolor sit amet.</p></a>
                </div>
            </div>

            <div class="single-menu">
                <a href="produk.php?kategori=Hot%20Tea"> <img src="media/hot tea/My project (72).png" alt="">
                <div class="menu-content">
                    <h5>Hot Tea</h5>
                    <p>Lorem ipsum dolor sit amet.</p></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- CONTENT END -->


<?php

include 'footer.php';

?>