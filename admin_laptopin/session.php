<?php
    session_start();
        // Session Perulangan Login
    if($_SESSION['login']==false){
        header('location: login.php');
}
?>