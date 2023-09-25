<?php
    require "../php/koneksi.php";
    require "session.php";

    $tabelKategori = mysqli_query($con, "SELECT * FROM kategori");
    $jumlahKategori = mysqli_num_rows($tabelKategori);
    // echo $jumlahKategori;
?>

<!DOCTYPE html>
<html>
  <head>
    <!-- Bootstrap 5 CSS-->
    <link rel="stylesheet" href="../library/bootstrap-5.0.2/css/bootstrap.min.css" />
    <!-- Font-awesome-->
    <link rel="stylesheet" href="../library/fontawesome-6.1.0/css/all.css" />
    <title>Kelola Kategori <?php echo $_SESSION['username'] ?></title>
  </head>
  <body>
    <div class="container">
      <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid">
            <a class="navbar-brand" href="#">LaptopIn, Hallo <?php echo $_SESSION['username'] ?></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="index.php">Kelola Kategori</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="kelola_produk.php">Kelola Produk</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../index.php">Beranda LaptopIn</a>
                  <li class="nav-item">
                  <a class="nav-link" href="kelola-motor.php">Kelola Motor</a>
                <li class="nav-item">
                  <a class="nav-link" href="logout.php">Logout</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </header>
      <article>
        <!-- Tambah Kategori -->
        <div class="my-5">
          <h3>Tambah Kategori</h3>
          <form action="" method="post">
            <div>
              <label for="kategoris">Tambah Kategori</label>
              <input type="text" class="form-control" autocomplete="off" placeholder="Masukan Kategori" id="kategoris" name="kategoris" required/>
            </div>
            <div class="mt-3">
              <button class="btn btn-primary" type="submit" name="simpan_kategori">Simpan</button>
            </div>
          </form>
          <?php       
      if(isset($_POST['simpan_kategori'])){
        $kategoris = htmlspecialchars($_POST['kategoris']);
        
        // Cek kesamaan kategori
        $CekKategori = mysqli_query($con, "SELECT merek FROM kategori WHERE merek='$kategoris'");
        $jumlahKategoriBaru = mysqli_num_rows($CekKategori);

        if($jumlahKategoriBaru == 1){
          echo "Data yang Di Inputkan Sudah Ada";
          // Refresh Halaman
          ?>
          <meta http-equiv="refresh" content="2; url=index.php" />
          <?php
        } else{
          // Inputkan kategori
          $kategoris = mysqli_query($con, "INSERT INTO kategori (merek) VALUES ('$kategoris')");
          echo "Data Berhasil Tersimpan. Silahkan Tunggu Sebentar...";
          // Refresh Halaman
          ?>
          <meta http-equiv="refresh" content="2; url=index.php" />
          <?php
        }
      }
?>
        </div>
        <!-- Tabel Kategori -->
        <div class="mt-3">
          <h2>List Kategori</h2>
          <div class="table-responsive mt-5">
            <table class="table">
              <tr>
                <td>No.</td>
                <td>Kategori</td>
                <td>Aksi</td>
              </tr>
              <!-- Menampilkan Data -->
              <?php
          if($jumlahKategori==0){
        ?>
              <tr>
                <td colspan="3" class="text-center">Data Tidak Tersedia</td>
              </tr>
              <?php
          }else{
            $jumlah=1;
            while($data = mysqli_fetch_array($tabelKategori)){
        ?>
              <!-- Search -->
              <tr>
                <td><?php echo $jumlah ?></td>
                <td><?php echo $data['merek'] ?></td>
                <td>
                  <a href="kategori-detail.php?k=<?php echo $data['id_kategori'];?>" class="btn btn-info"> <i class="fa-solid fa-gear"></i></a>
                </td>
              </tr>
              <?php
            $jumlah++;
              }
            }
          ?>
            </table>
          </div>
        </div>
      </article>
    </div>
    <!-- Bootstrap 5 JQuery dan Java Script-->
    <script src="../library/bootstrap-5.0.2/js/bootstrap.min.js"></script>
  </body>
</html>
