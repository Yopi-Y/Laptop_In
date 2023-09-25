<!DOCTYPE html>
<html>
  <head>
    <!-- CSS Halaman User -->
    <link rel="stylesheet" href="css/halamanuser.css" />
    <!-- Bootstrap 5 CSS-->
    <link rel="stylesheet" href="library/bootstrap-5.0.2/css/bootstrap.min.css" />
    <!-- Font-awesome-->
    <link rel="stylesheet" href="library/fontawesome-6.1.0/css/all.css" />
  
    <title>Laptopin</title>
  </head>
  <body>
    <div class="container">
      <!-- Header-->
      <header>
        <!--Navbar-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="index.php">
              <img src="img/laptopin.png" alt="logo tidak ditemukan" width="30" height="30" />
            </a>
            <a class="navbar-brand" href="index.php">Laptopin</a>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="produk.php">Produk</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </header>

      <article>
        <!-- Banner -->
        <div class="container-fluid banner d-flex"></div>

        <!-- Highlight Produk -->
        <div class="container-fluid">
          <div class="container text-center">
            <h3 class="mt-4 bagr">Laptop Terlaris</h3>
            <div class="row mt-3">
              <div class="col-4">
                <div class="highlighted-kategori hp-acer"></div>
                <h4 class="bagr2">Acer Book</h4>
              </div>
              <div class="col-4">
                <div class="highlighted-kategori hp-lenovo"></div>
                <h4 class="bagr2">Yoga Slim I7</h4>
              </div>
              <div class="col-4">
                <div class="highlighted-kategori hp-asus"></div>
                <h4 class="bagr2">Zenbook</h4>
              </div>
            </div>
          </div>
        </div>
      </article>

      <!-- Footer -->
      <footer class="text-center text-lg-start text-white" style="background-color: #0dcaf0">
        <!-- F-Container -->
        <div class="container p-4 pb-0">
          <section>
            <div class="row">
              <!-- Tentang -->
              <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                <h6 class="mb-4 font-weight-bold">Sistem Informasi LaptopIn</h6>
                <p>LaptopIn adalah Sistem Informasi Berbasis Website yang menyediakan informasi berbagai jenis Laptop dan Handphone terbaru dengan harga termurah.</p>
              </div>

              <!-- Garis Horizontal -->
              <hr class="w-100 clearfix d-md-none" />

              <!-- Menu -->
              <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                <h6 class="text-uppercase mb-4 font-weight-bold">Menu</h6>
                <p><a class="text-white" href="index.php">Home</a></p>
                <p><a class="text-white" href="produk.php">Produk</a></p>
              </div>

              <!-- Garis Horizontal -->
              <hr class="w-100 clearfix d-md-none" />

              <!-- Garis Horizontal -->
              <hr class="w-100 clearfix d-md-none" />

              <!-- Kontak -->
              <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                <h6 class="text-uppercase mb-4 font-weight-bold">Kontak</h6>
                <p><i class="fas fa-home mr-3"></i> Mengwi, Badung-Bali, Indonesia</p>
                <p><i class="fas fa-envelope mr-3"></i> yopiyantoikadek.com</p>
                <p><i class="fas fa-phone mr-3"></i> 081 353 031 062</p>
              </div>

              <!-- Sosial Media -->
              <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
                <h6 class="mb-4 font-weight-bold">Media Sosial</h6>
                <!-- Facebook -->
                <a class="btn btn-primary btn-floating m-1" style="background-color: #3b5998" href="https://facebook.com/ikadekyopiyanto/" role="button"><i class="fab fa-facebook-f"></i></a>
                <!-- Instagram -->
                <a class="btn btn-primary btn-floating m-1" style="background-color: #3b5998" href="https://www.instagram.com/yopi_creative/" role="button"><i class="fab fa-instagram"></i></a>
              </div>
            </div>
          </section>
        </div>

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">© 2022 <a class="text-white" href="index.php">LaptopIn</a></div>
      </footer>
    </div>
    <!-- Bootstrap 5 JQuery dan Java Script-->
    <script src="library/bootstrap-5.0.2/js/bootstrap.min.js"></script>
  </body>
</html>
