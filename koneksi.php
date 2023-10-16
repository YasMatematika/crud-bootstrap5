<?php
  $host = '127.0.0.1:3307';
  $user = 'root';
  $pass = '';
  $db = 'db_sekolah';
  $conn = mysqli_connect($host, $user, $pass, $db);
  if($conn){
   // echo "koneksi berhasil";
  }

  mysqli_select_db($conn, $db);
?>

