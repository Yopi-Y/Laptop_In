<?php
    //Koneksi Database
    require "../php/koneksi.php";
    require "session.php";

    // Mencari Tabel
    $tabelMotor = mysqli_query($con, "SELECT * FROM sepeda_motor");
?>

<html>
<head>
    <!-- Bootstrap 5 CSS-->
    <link rel="stylesheet" href="../library/bootstrap-5.0.2/css/bootstrap.min.css" />
    <!-- Font-awesome-->
    <link rel="stylesheet" href="../library/fontawesome-6.1.0/css/all.css" />
    <title>Kelola Motor <?php echo $_SESSION['username'] ?></title>
</head>
<body>
<div class="container">
<header>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">LaptopIn, Hallo <?php echo $_SESSION['username'] ?> </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Kelola Kategori</a>
        </li>
        <li class="nav-item">
          <a class="nav-link "  href="kelola_produk.php">Kelola Produk</a>
        </li>
        <li class="nav-item">
                  <a class="nav-link" href="../index.php">Beranda LaptopIn</a>
        <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="kelola-motor.php">Kelola Motor</a>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
</header>

<article>
    <div class="my-5">
          <h3>Tambah Motor</h3>
          <form action="" method="post">
            <!--Nama-->
            <div>
              <label for="Nama">Nama</label>
              <input type="text" class="form-control" autocomplete="off" placeholder="Masukan Nama Motor" id="nama" name="nama" required/>
            </div>
            <!--Jenis-->
            <div>
              <label for="jenis">Jenis</label>
              <select name="jenis" id="jenis" class="form-control"> 
                <option value="sport">Sport</option>
                <option value="matic">Matic</option>  
                <option value="offroad">Offroad</option>  
              </select>
            </div>
            <!--Merek-->
            <div>
            <label for="merek">Merek</label>
            <input type="text" class="form-control" autocomplete="off" placeholder="Masukan Merek Motor" id="merek" name="merek" required/>
            </div>
            <!--CC-->
            <div>
              <label for="cc">CC</label>
              <input type="text" class="form-control" autocomplete="off" placeholder="Masukan CC Motor" id="cc" name="cc" required/>
            </div>
            <!--Warna-->
            <div>
              <label for="warna">Warna</label>
              <input type="text" class="form-control" autocomplete="off" placeholder="Masukan Warna Motor" id="warna" name="warna" required/>
            </div>
            <!--Harga-->
            <div>
              <label for="harga"> Harga </label>
              <input type="number" class="form-control" name="harga" required>
            </div>
            <!--Tanggal Launching-->
            <div>
              <label for="tgl">Tanggal Launching</label>
              <input type="datetime-local" class="form-control" name="tgl" id="tgl" required>
            </div>
            <div class="mt-3">
              <button class="btn btn-primary"  type="submit" name="simpan">Simpan</button>
            </div>
          </form>
        <!-- Menambah Data -->
        <?php 
          if(isset($_POST['simpan'])){
            $nama = htmlspecialchars($_POST['nama']);
            $jenis = htmlspecialchars($_POST['jenis']);
            $merek = htmlspecialchars($_POST['merek']);
            $cc = htmlspecialchars($_POST['cc']);
            $warna = htmlspecialchars($_POST['warna']);
            $harga = htmlspecialchars($_POST['harga']);
            $tgl = htmlspecialchars($_POST['tgl']);
        
            // Memasukan Data Ke Database (Tabel Produk)
            $tambahData = mysqli_query($con, "INSERT INTO sepeda_motor(nama, jenis, merek, cc, warna, harga, tgl_launching) VALUES ('$nama', '$jenis', '$merek', '$cc', '$warna', '$harga', '$tgl')");
        
            if($tambahData){
            ?>
            <div> Produk Berhasil Tersimpan. Silahkan Tunggu Sebentar... </div>
            <!-- Refresh Halaman-->
            <meta http-equiv = "refresh" content="2; url=kelola-motor.php"/>
            <?php
        }else{
          echo mysqli_error($con);
        }
        ?>
        <?php 
        } 
        ?>


        <!-- Tabel Kategori -->
        <div class="mt-3">
          <h2>List Kategori</h2>
          <div class="table-responsive mt-5">
            <table class="table">
              <tr>
                <td>No.</td>
                <td>Kode</td>
                <td>Nama</td>
                <td>Jenis</td>
                <td>Merek</td>
                <td>CC</td>
                <td>Warna</td>
                <td>Harga</td>
                <td>Tanggal Launching</td>
                <td>Aksi</td>
              </tr>
              <tr>
              <?php 
               $jumlahRowMotor = mysqli_num_rows($tabelMotor);
                if($jumlahRowMotor==0){
              ?>
              <tr>
                <td colspan=5 class="text-center"> Data Tidak Tersedia</td>
              </tr>
              <?php
                }else{
              $jumlah = 1;
                while($data = mysqli_fetch_array($tabelMotor)){
              ?>
                <td> <?php echo $jumlah; ?> </td>
                <td> <?php echo $data['kode']; ?> </td>
                <td> <?php echo $data['nama']; ?> </td>
                <td> <?php echo $data['jenis']; ?> </td>
                <td> <?php echo $data['merek']; ?> </td>
                <td> <?php echo $data['cc']; ?> </td>
                <td> <?php echo $data['warna']; ?> </td>
                <td> <?php echo $data['harga']; ?> </td>
                <td> <?php echo $data['tgl_launching']; ?> </td>
                <td> <a href="detail-motor.php?k=<?php echo $data['kode'];?>" class="btn btn-info"> <i class="fa-solid fa-gear"></i></i></a> </td>
                </td>
              </tr>
            <?php 
              $jumlah++;
              }
            }
            ?>
      </div>
  </div>
</table>
</article>
<!-- Bootstrap 5 JQuery dan Java Script-->
<script src="../library/bootstrap-5.0.2/js/bootstrap.min.js"></script>
</body>
</html>