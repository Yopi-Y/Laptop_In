<?php
    session_start();
        // Koneksi Database
    require "../php/koneksi.php";
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Login Admin</title>
    <!-- Bootstrap 5 CSS-->
    <link rel="stylesheet" href="../library/bootstrap-5.0.2/css/bootstrap.min.css" />
    <!-- CSS Halaman User -->
    <link rel="stylesheet" href="../css/login.css" />

  </head>
  <body>
    <!-- Container Login-->
    <div class="containerlogin d-flex flex-column justify-content-center align-items-center">
      <div class="loginbox p-5 shadow">
        <!-- Form Login -->
        <form action="" method="post">
          <!-- Username -->
          <h2 style="font-size: 15px; text-align: center">Login Admin LaptopIn</h2>
          <div>
            <label for="username">Username</label>
            <input type="text" class="form-control" autocomplete="off" placeholder="Masukan Username" id="username" name="username" />
          </div>
          <!-- Password -->
          <div class="mt-1">
            <label for="passwords">Password</label>
            <input type="password" class="form-control" placeholder="Masukan Password" id="passwords" name="password" />
          </div>
          <!-- Submit -->
          <button type="submit" class="mt-3 btn btn-primary form-control" name="loginadmin">Login</button>
        </form>
      </div>
      <!-- Pengecekan -->
      <div class="mt-3">
        <?php
         require "pengecekan_admin.php"; 
         ?>
      </div>
    </div>
  </body>
</html>
