<?php
    require "session.php";
    require "../php/koneksi.php";

    // Mengambil Id Kategori
    $id = $_GET['k'];

    // Menyimpan Tabel dengan JOIN
    $tabelProduks = mysqli_query($con, "SELECT produk.*, kategori.merek AS nama_kategori FROM produk INNER JOIN kategori ON kategori.id_kategori=produk.id_kategori WHERE produk.id_produk='$id' ");

    $data = mysqli_fetch_array($tabelProduks);

    $kategori = mysqli_query($con, "SELECT * FROM kategori");
?>
<!DOCTYPE html>
<html>
<head>
    <!-- Bootstrap 5 CSS-->
    <link rel="stylesheet" href="../library/bootstrap-5.0.2/css/bootstrap.min.css" />
    <title>Produk Detail</title>
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
          <a class="nav-link active" aria-current="page" href="kelola_produk.php">Kelola Produk</a>
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
<div class="container">
    <h2> Detail Produk </h2>
      <div div div class="col-12 col-md-6">
       <form action="" method="post" enctype="multipart/form-data">
       <!--Form Nama-->
           <div>
            <label for="nama"> Nama </label>
            <input type="text" value="<?php echo $data['nama_produk']?>" id="nama" name="nama" class="form-control" autocomplete="off" required>
            </div>
        <!--Form Harga-->
          <div>
            <label for="harga"> Harga </label>
              <input type="number" class="form-control" value="<?php echo $data['harga']?>" name="harga" required>
             </div>
        <!--Form Processor-->
          <div>
             <label for="processor"> Processor </label>
               <input type="text" value="<?php echo $data['processor']?>" id="processor" name="processor" class="form-control" autocomplete="off" required>
          </div>
        <!--Form Memory-->
          <div>
            <label for="memory"> Memory </label>
              <input type="text" value="<?php echo $data['memory']?>" id="memory" name="memory" class="form-control" autocomplete="off" required>
          </div>
        <!--Form Storage-->
        <div>
            <label for="storage"> Storage </label>
              <input type="text" value="<?php echo $data['storages']?>" id="storage" name="storage" class="form-control" autocomplete="off" required>
        </div>
        <!--Form Detail-->
        <div>
          <label for="detail"> Detail </label>
            <textarea type="text" cols="30" rows="10" id="detail" name="detail" class="form-control" autocomplete="off" required> <?php echo $data['detail'] ?> </textarea>
          </div>
        <!--Form Ketersediaan-->
        <div>
              <label for="ketersediaan_stok"> Ketersediaan Stok </label>
            <select name="ketersediaan_stok" id="ketersediaan_stok" class="form-control"> 
              <option value="tersedia">Tersedia</option>
              <option value="habis">Habis</option>
            </select>
        </div>
        <!--Form Jenis-->
        <div>
            <label for="jenis"> Jenis </label>
              <select name="jenis" id="jenis" class="form-control"> 
                <option value="Laptop">Laptop</option>
                  <option value="Handphone">Handphone</option>
              </select>
        </div>
         <!-- Submit -->
         <div class="d-flex justify-content-between mt-3" > 
         <button type="submit" class="btn btn-primary" name="simpan"> Edit </button>
         <button type="submit" class="btn btn-primary" name="hapus"> Hapus </button>
         </div>
    </div>  
        </form>

        <!--Mengirim Data-->
        <?php
        if(isset($_POST['simpan'])){
          $nama = htmlspecialchars($_POST['nama']);
          $processor = htmlspecialchars($_POST['processor']);
          $memory = htmlspecialchars($_POST['memory']);
          $storage = htmlspecialchars($_POST['storage']);
          $detail = htmlspecialchars($_POST['detail']);
          $harga = htmlspecialchars($_POST['harga']);
          $ketersediaan_stok = htmlspecialchars($_POST['ketersediaan_stok']);
          $jenis = htmlspecialchars($_POST['jenis']);

          // Falidasi Input
            if($nama=='' || $processor=='' || $memory=='' || $storage=='' || $detail=='' || $harga=='' ){
          ?>
            <div> Nama, Processor, Memory, Storage, Detail dan Harga Diisi</div>
          <?php
            }else{
              // Update Data
              $updateProduk = mysqli_query($con, "UPDATE produk SET nama_produk='$nama', processor='$processor', memory='$memory', storages='$storage', harga='$harga', detail='$detail',kesediaan='$ketersediaan_stok', jenis='$jenis' WHERE id_produk=$id");
              ?>
                <div> Produk Berhasil Diupdate. Silahkan Tunggu Sebentar... </div>
                <!-- Refresh Halaman-->
                <meta http-equiv = "refresh" content="2; url=kelola_produk.php"/>
              <?php
            }
          } 
          if(isset($_POST['hapus'])){
            $hapusProduk = mysqli_query($con, "DELETE FROM produk WHERE id_produk='$id'");
              if($hapusProduk){
                ?>
                  <div> Produk Berhasil Didelete. Silahkan Tunggu Sebentar... </div>
                  <!-- Refresh Halaman-->
                  <meta http-equiv = "refresh" content="2; url=kelola_produk.php"/>
                <?php
              }
            }
          
        ?>
    </div>
</div>

</article>
</div>
<!-- Bootstrap 5 JQuery dan Java Script-->
<script src="../library/bootstrap-5.0.2/js/bootstrap.min.js"></script>
    </div>
</body>
</html>