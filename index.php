<!DOCTYPE html>
<html lang="en">

<head>
  <title>COFTEA - Coffee and Tea</title>
  <link rel="stylesheet" href="./css/style.css">
  <link rel="stylesheet" href="./css/bootstrap.css">
  <link rel="stylesheet" href="./css/font-awesome.css">
</head>

<body>
  <!-- NAVIGATION BAR -->
  <nav class="navbar navbar-expand-lg shadow-sm header_menu_1 pt-30 pb-30 mt-30 fixed-top" style="background-color: #FFF3E4;" id="navbar">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" id="brand" href="index.html">COFTEA</a>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" style="color: #483434;" href="#catalog">Catalog</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" style="color: #483434;" href="#subscription">Bundle</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" style="color: #483434;" href="#about">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" style="color: #483434;" href="#contact">Contact</a>
          </li>
        </ul>
      </div>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <div class="search-box">
              <input class="search-text" type="text" name="" placeholder="Search">
              <a class="search-btn" href=""><i class="fas fa-search "></i></a>
            </div>
          </li>
          <!-- <li class="nav-item">
                <a class="nav-link active" style="color: #483434;" href="register.html"><i class="fa fa-user"></i> Login</a>
              </li> -->
          <li class="nav-item">
            <a class="nav-link active" style="color: #483434;" href="#cart"><i class="fa fa-shopping-cart"></i></a>
          </li>
          <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="./login/register.php" style="color: #483434;" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-user"></i>
              <span class="mr-2 d-none d-lg-inline small" style="color: #483434;">
              </span>
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
              <a class="dropdown-item" href="#">
                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                Profile
              </a>
              <a class="dropdown-item" href="#">
                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                Settings
              </a>
              <a class="dropdown-item" href="#">
                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                Activity Log
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- NAVIGATION BAR END -->

  <!-- CONTENT -->
  <div>
    <section class="home bg-white" id="home">
      <div class="container-sm">
        <div class="row min-vh-100">
          <div class="col-md-1"></div>

          <div class="col-md-5 mt-md-0 d-lg-block d-xl-block">
            <div class="home-text py-5">
              <h1 class="fw-bold" id="slogan">Freshly brewed, <br>feel the aroma.</h1>
              <h3 class="mb-4" style="color: #6B4F4F ;"><br>At Coftea, we're dedicated to goodness in every sip.</h3>
              <a href="catalogue.html" class="btn mt-4 px-3" id="btn-catalog">Catalog</a>
            </div>
          </div>

          <div class="col-md-6 mt-md-0 d-none d-lg-block d-xl-block">
            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img src="./media/cold coffees/cold brew latte.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                  <img src="./media/hot cofees/caffe americano.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                  <img src="./media/cold coffees/iced americano with lemon juice.png" class="d-block w-100" alt="...">
                </div>
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
          </div>

        </div>
      </div>
    </section>
  </div>
  <!-- CONTENT END -->

  <!-- FOOTER -->

  <footer class="py-4">
    <div class="row w-100">
      <div class="col-3">
        <ul class="nav flex-column">
          <li class="nav-item fs-6 mb-3"><a href="terms&condition.html" class="nav-link p-0" id="footer-link">Terms &
              Conditions</a></li>
          <li class="nav-item fs-6 mb-3"><a href="#" class="nav-link p-0" id="footer-link">Privacy Policy</a></li>
          <li class="nav-item fs-6 mb-3"><a href="#" class="nav-link p-0" id="footer-link">Shipping Policy</a></li>
          <li class="nav-item fs-6 mb-3"><a href="#" class="nav-link p-0" id="footer-link">Refund Policy</a></li>
        </ul>
      </div>

      <div class="col-3">
        <ul class="nav flex-column">
          <li class="nav-item fs-6 mb-3"><a href="#" class="nav-link p-0" id="footer-link">Cookie Policy</a></li>
          <li class="nav-item fs-6 mb-3"><a href="#" class="nav-link p-0" id="footer-link">FAQ</a></li>
          <li class="nav-item fs-6 mb-3"><a href="#" class="nav-link p-0" id="footer-link">Payment Methods</a></li>
        </ul>
      </div>

      <div class="col-3">
        <ul class="nav flex-column">
          <li class="nav-item fs-6 mb-3">Address:</li>
          <li class="nav-item fs-6 mb-3">University of Sumatera Utara</li>
          <li class="nav-item fs-6 mb-3">9 Dr Mansyur St.</li>
          <li class="nav-item fs-6 mb-3">Medan, Indonesia</li>
        </ul>
      </div>

      <div class="col-3">
        <ul class="nav flex-column">
          <li class="nav-item fs-6 mb-3">Contact:</li>
          <li class="nav-item fs-6 mb-3"><a href="#" class="nav-link p-0" id="footer-link">coftea@gmail.com</a></li>
          <li class="nav-item fs-6 mb-3">+62 812 3456 7890</li>
        </ul>
        <ul class="list-unstyled d-flex">
          <li class="px-3 m-3"><a class="" href="#"><i class="fab fa-facebook"></i></a></li>
          <li class="px-3 m-3"><a class="" href="#"><i class="fab fa-whatsapp"></i></a></li>
          <li class="px-3 m-3"><a class="" href="#"><i class="fab fa-instagram"></i></a></li>
        </ul>
      </div>
    </div>
    <hr>
    <div class="row w-100" style="height: 2vh;">
      <div class="d-flex justify-content-center align-content-center">
        <p>&copy; 2022 by Coftea, Inc. All rights reserved.</p>
      </div>
    </div>
  </footer>

  <!-- FOOTER END -->
  <script src="./js/bootstrap.bundle.min.js"></script>
  <script>
    var element = document.getElementById("home");

    var t = setTimeout(openPopUp, 500);

    function openPopUp() {
      element = document.getElementById("home");
      element.style.visibility = "visible";
      element.style.opacity = "1";
    }
  </script>
</body>

</html>