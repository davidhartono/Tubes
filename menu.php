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
                <a href="produk.php?kategori=Cold%20Coffee"><img src="images/cc.png" alt="">
                    <div class="menu-content">
                        <h5>Cold Coffee</h5>
                </a>
                <p>Cold brewed coffee, smoother, and less acidic.</p>
            </div>
        </div>
        <div class="single-menu">
            <a href="produk.php?kategori=Hot%20Coffee"><img src="images/hc.png" alt="">
                <div class="menu-content">
                    <h5>Hot Coffee</h5>
            </a>
            <p>Hot brewed coffee, boosts your energy in the morning.</p>
        </div>
    </div>
</div>
<div class="menu-column">
    <h4>TEA</h4>
    <div class="single-menu">
        <a href="produk.php?kategori=Cold%20Tea"><img src="images/ct.png" alt="">
            <div class="menu-content">
                <h5>Cold Tea</h5>
        </a>
        <p>Cold brewed tea, refreshing on a hot day.</p>
    </div>
</div>
<div class="single-menu">
    <a href="produk.php?kategori=Hot%20Tea"> <img src="images/ht.png" alt="">
        <div class="menu-content">
            <h5>Hot Tea</h5>
    </a>
    <p>Hot brewed tea, let the stress of the day melt away.</p>
</div>
</div>
</div>
</div>
</div>
<!-- CONTENT END --> <?php

include 'footer.php';

?>