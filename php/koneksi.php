<?php
// Koneksi Database
// Properti koneksi

$namaserver = '';
$username = '';
$password = '';
$database = '';

// Function Koneksi
function koneksi($nama, $user, $pass, $db){
  $Laptopin = new mysqli($nama,$user,$pass,$db);
  return $Laptopin;
} 

// Memasukan Function Koneksi
$con = koneksi($namaserver, $username, $password, $database);

// Cek Koneksi
if ($con -> connect_error) {
  echo "Gagal Koneksi Ke Database : " . $con -> connect_error;
  exit();
}
