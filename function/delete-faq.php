<?php

include('../koneksi.php');

$id_faq = $_GET['id_faq'];

$result = pg_query($conn, "DELETE FROM public.faq_seternak WHERE id_faq='$id_faq'");

if($result){
  echo "<script>alert('Data Berhasil Dihapus'); 
  window.location = '../index-faq.php';</script>";
  } else {
  echo "<script>alert('Data Gagal Dihapus'); 
  window.location = '../index-faq.php';</script>";
  }

 ?>
