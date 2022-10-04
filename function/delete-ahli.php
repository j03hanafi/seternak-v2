<?php

include('../koneksi.php');

$id_ahli = $_GET['id_ahli'];

$result = pg_query($conn, "DELETE FROM ahli WHERE id_ahli='$id_ahli'");

if($result){
  echo "<script>alert('Data Berhasil Dihapus'); 
  window.location = '../index-ahli.php';</script>";
  } else {
  echo "<script>alert('Data Gagal Dihapus'); 
  window.location = '../index-ahli.php';</script>";
  }

 ?>
