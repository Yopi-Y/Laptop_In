<?php
    //Koneksi Database
    require "../php/koneksi.php";
    require "session.php";

    // Mencari Tabel
    $tabelProduks = mysqli_query($con, "SELECT produk.*, kategori.merek AS nama_kategori FROM produk INNER JOIN kategori ON kategori.id_kategori=produk.id_kategori");
    $jumlahProduk = mysqli_num_rows($tabelProduks);
    $tabelKategoris = mysqli_query($con, "SELECT * FROM kategori");

    // Random String Generator (Untuk menentukan nama file Gambar)__
    function generateRandomString($length = 10) {
      $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $charactersLength = strlen($characters);
      $randomString = '';
      for ($i = 0; $i < $length; $i++) {
          $randomString .= $characters[rand(0, $charactersLength - 1)];
      }
      return $randomString;
  }
?>

<!DOCTYPE html>
<html>
<head>
      <!-- Bootstrap 5 CSS-->
      <link rel="stylesheet" href="../library/bootstrap-5.0.2/css/bootstrap.min.css" />
        <!-- Font-awesome-->
        <link rel="stylesheet" href="../library/fontawesome-6.1.0/css/all.css" />
    <title>Kelola Produk <?php echo $_SESSION['username'] ?></title>
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
  <!--------- Tambah Produk ---------->
<div class="my-5">
  <h3> Tambah Produk</h3>
  <form action="" method="post" enctype="multipart/form-data">
  <!--Form Kategori-->
  <div>
    <label for="kategori"> Kategori </label>
      <select name="kategori" id="kategori" class="form-control">
        <?php
        while($data=mysqli_fetch_array($tabelKategoris)){
          ?>
          <option value="<?php echo $data['id_kategori']; ?>"> <?php echo $data['merek']?> </option>
          <?php
        }
        ?>
      </select>
    </div>  
     <!--Form Nama-->
    <div>
      <label for="nama"> Nama </label>
      <input type="text" id="nama" name="nama" class="form-control" autocomplete="off" required>
    </div>
    <!--Form Processor-->
    <div>
      <label for="processor"> Processor </label>
      <input type="text" id="processor" name="processor" class="form-control" autocomplete="off" required>
    </div>
    <!--Form Memory-->
    <div>
      <label for="memory"> Memory </label>
      <input type="text" id="memory" name="memory" class="form-control" autocomplete="off" required>
    </div>
    <!--Form Storage-->
    <div>
      <label for="storage"> Storage </label>
      <input type="text" id="storage" name="storage" class="form-control" autocomplete="off" required>
    </div>
    <!--Form Detail-->
    <div>
      <label for="detail"> Detail </label>
      <textarea type="text" cols="30" rows="10" id="detail" name="detail" class="form-control" autocomplete="off" required></textarea>
    </div>
    <!--Form Harga-->
    <div>
      <label for="harga"> Harga </label>
      <input type="number" class="form-control" name="harga" required>
    </div>
    <!--Form Gambar-->
    <div>
      <label for="gambar"> Gambar </label>
      <input type="file" class="form-control" name="gambar" required>
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
        <option value="laptop">Laptop</option>
        <option value="handphone">Handphone</option>
      </select>
    </div>
        <!-- Submit -->
          <button type="submit" class="btn btn-primary mt-2" name="simpan"> Simpan </button>
  </form>

  <!--Penyimpanan Data-->
  <?php 
  if(isset($_POST['simpan'])){
    $nama = htmlspecialchars($_POST['nama']);
    $kategori = htmlspecialchars($_POST['kategori']);
    $processor = htmlspecialchars($_POST['processor']);
    $memory = htmlspecialchars($_POST['memory']);
    $storage = htmlspecialchars($_POST['storage']);
    $detail = htmlspecialchars($_POST['detail']);
    $harga = htmlspecialchars($_POST['harga']);
    $ketersediaan_stok = htmlspecialchars($_POST['ketersediaan_stok']);
    $jenis = htmlspecialchars($_POST['jenis']);

    // Input Gambar
    $target_dir = "../img/produk/";
    $nama_file = basename($_FILES["gambar"]["name"]);
    $target_file = $target_dir . $nama_file;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $image_size = $_FILES["gambar"]["size"];
    // Random Name
    $random_name = generateRandomString(20);
    $simpan_nama_gambar = $random_name . "." . $imageFileType;

    // Falidasi Input
    if($nama=='' || $processor=='' || $memory=='' || $storage=='' || $detail=='' || $harga=='' ){
      ?>
        <div> Nama, Processor, Memory, Storage, Detail dan Harga Diisi</div>
      <?php
    }else{
      if($nama_file!=''){
        // File harus lebih kecil dat=ri 20mb
        if($image_size > 20000000){
    ?> 
              <div> File Tidak Boleh Lebih Dari 20mb </div>
    <?php
        // Type File Upload
        }else if($imageFileType !='jpg' && $imageFileType !='png'){
    ?> 
              <div> File Wajib Bertipe JPG atau PNG </div>
    <?php
        }else{
        // Pindahkan Gambar
          move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_dir . $simpan_nama_gambar);
        }     
      }

        // Memasukan Data Ke Database (Tabel Produk)
        $tambahDataProduk = mysqli_query($con, "INSERT INTO produk(id_kategori, nama_produk, processor, memory, storages, harga, gambar, detail, kesediaan, jenis) VALUES ('$kategori', '$nama', '$processor', '$memory', '$storage', '$harga', '$simpan_nama_gambar', '$detail', '$ketersediaan_stok', '$jenis')");
        
        if($tambahDataProduk){
            ?>
            <div> Produk Berhasil Tersimpan. Silahkan Tunggu Sebentar... </div>
            <!-- Refresh Halaman-->
            <meta http-equiv = "refresh" content="2; url=kelola_produk.php"/>
            <?php
        }else{
          echo mysqli_error($con);
        }
    }
  }
  ?>


</div>

<!-- List Produk -->
<div class="mt-3">
    <h2> List Produk </h2>
    <div class="table-responsive mt-5">
      <table class="table">
        <tr>
        <td>No.</td>
        <td>Merek</td>
        <td>Nama</td>
        <td>Jenis</td>
        <td>Ketersidiaan Stok</td>
        <td>Harga</td>
        <td>Aksi</td> 
        </tr>
        
        <tr>
        <?php 
        if($jumlahProduk==0){
          ?>
              <tr>
                <td colspan=7 class="text-center"> Data Tidak Tersedia</td>
              </tr>
        <?php
        }else{
          $jumlah = 1;
          while($data = mysqli_fetch_array($tabelProduks)){
            ?>

          <tr>
            <td> <?php echo $jumlah; ?> </td>
            <td> <?php echo $data['nama_kategori']; ?> </td>
            <td> <?php echo $data['nama_produk']; ?> </td>
            <td> <?php echo $data['jenis']; ?> </td>
            <td> <?php echo $data['kesediaan']; ?> </td>
            <td> <?php echo $data['harga']; ?> </td>
            <td> <a href="produk-detail.php?k=<?php echo $data['id_produk'];?>" class="btn btn-info"> <i class="fa-solid fa-gear"></i></i></a> </td>
          </tr>
        <?php
            $jumlah++;
          }
        }
        ?>   
        </tr>
      </table>
      
    </div>
  </div>
</article>

<!-- Bootstrap 5 JQuery dan Java Script-->
<script src="../library/bootstrap-5.0.2/js/bootstrap.min.js"></script>
</body>
</html>