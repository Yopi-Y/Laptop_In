<?php
// Pengecekan User/Admin Login
if(isset($_POST['loginadmin'])){
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
  
    $data_username = mysqli_query($con, "SELECT * FROM admins WHERE username='$username'");
    $menghitung = mysqli_num_rows($data_username);
    $data_admin = mysqli_fetch_array($data_username);

    if($menghitung>0){
      
      if($password == $data_admin['passwords']){
        $_SESSION['username'] = $data_admin['username'];
        $_SESSION['login'] = true;
        header('location: index.php');
      }else{
        echo "Username atau Password Salah";
      }
    }else{
      echo "Username atau Password Salah";
    }
}
?>