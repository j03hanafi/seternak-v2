<?php

include '../koneksi.php';
// $jml_barang = $_POST['kuantitas'];
// $username =$_GET['username'];
  $username = $_GET['username'];
  $query = pg_query($conn, "UPDATE public.user SET verified=2 WHERE username='$username'");

  if ($query) {
    header("location:https://seternak.azurewebsites.net/login.php?activated=true");
  } else {
    header("location:https://seternak.azurewebsites.net/login.php?activated=false");
  }
?>

