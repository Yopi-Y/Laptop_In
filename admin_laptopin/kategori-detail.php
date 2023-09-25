<?php
    require "session.php";
    require "../php/koneksi.php";

    // Mengambil Id merek
    $id = $_GET['k'];

    // Menyimpan Tabel
    $listKategori = mysqli_query($con, "SELECT * FROM kategori WHERE id_kategori='$id'");
    $data = mysqli_fetch_array($listKategori);
?>

<!DOCTYPE html>
<html>
  <head>
    <!-- Bootstrap 5 CSS-->
    <link rel="stylesheet" href="../library/bootstrap-5.0.2/css/bootstrap.min.css" />
    <title>Detail Kategori</title>
  </head>
  <body>
    <div class="container">
      <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid">
            <a class="navbar-brand" href="#"
              >LaptopIn, Hallo
              <?php echo $_SESSION['username'] ?>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="index.php">Kelola Kategori</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link navbarstyle" href="kelola_produk.php">Kelola Produk</a>
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
          <h2>Detail Kategori</h2>
          <div class="col-12 col-md-6">
            <form action="" method="post">
              <div>
                <label for="kategori"> Kategori </label>
                <input type="text" name="kategori" id="kategori" class="form-control" value=<?php echo $data['merek']?>>
              </div>
              <div class="mt-5 d-flex justify-content-between">
                <button type="submit" class="btn btn-primary" name="editKategori">EDIT</button>
                <button type="submit" class="btn btn-primary" name="deleteKategori">Delete</button>
              </div>
            </form>
            <?php
            // Fungsi Update Kategori
            if(isset($_POST['editKategori'])){
                $kategori = htmlspecialchars($_POST['kategori']);

                if($data['merek']==$kategori){
                    ?>
            <meta http-equiv="refresh" content="0; url=index.php" />
            <?php
                }else{
                    $query = mysqli_query($con, "SELECT merek FROM kategori WHERE merek='$kategori'");
                    $jumlahData = mysqli_num_rows($query);
                    
                    if($jumlahData >0)
                    { echo "Data Sudah Ada"; 
                    }else{ 
                      $kategoris = mysqli_query($con, "UPDATE kategori SET merek='$kategori' WHERE id_kategori='$id'"); 
                      echo "Data Berhasil Ter Update. Silahkan Tunggu Sebentar..."; 
                      ?>
                      <!--Refresh Halaman--> 
                      <meta http-equiv="refresh" content="2; url=index.php" />
                    <?php
                    }
                }
            }

            // Fungsi Delete Kategori
            if(isset($_POST['deleteKategori'])){
                $deleteKategori = mysqli_query($con, "DELETE FROM kategori WHERE id_kategori = '$id'");
            if($deleteKategori){   
                echo "Data Berhasil Ter Delete. Silahkan Tunggu Sebentar...";
                // Refresh Halaman
                    ?>
            <meta http-equiv="refresh" content="2; url=index.php" />
            <?php
            }else{
                echo "Kategori Tidak Bisa Dihapus, Karena Sudah digunakan oleh salah satu produk" ;
            }    
        }   
        ?>
          </div>
        </div>
      </article>
      <!-- Bootstrap 5 JQuery dan Java Script-->
      <script src="../library/bootstrap-5.0.2/js/bootstrap.min.js"></script>
    </div>
  </body>
</html>
