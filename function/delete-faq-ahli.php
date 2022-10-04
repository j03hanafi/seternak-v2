<?php

include('../koneksi.php');

$id_faq_ahli = $_GET['id_faq_ahli'];

$result = pg_query($conn, "DELETE FROM faq_ahli WHERE id_faq_ahli='$id_faq_ahli'");

if($result){
  echo "<script>alert('Data Berhasil Dihapus'); 
  window.location = '../index-faq-ahli.php';</script>";
  } else {
  echo "<script>alert('Data Gagal Dihapus'); 
  window.location = '../index-faq-ahli.php';</script>";
  }

 ?>
