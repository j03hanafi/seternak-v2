<?php
include ('../koneksi.php');


  
if (isset($_POST['tambah'])) {
  $id_faq = $_POST['id_faq'];
  $pertanyaan = $_POST['pertanyaan'];
  $jawaban = $_POST['jawaban'];


  
  $query = pg_query($conn, "INSERT INTO public.faq_seternak (id_faq,pertanyaan,jawaban) VALUES ('$id_faq','$pertanyaan','$jawaban')");

  
  if ($query) {
    echo "<script>alert('Data Berhasil Ditambahkan'); 
    window.location = '../index-faq.php';</script>";
  } else {
    echo "<script>alert('Data Gagal Ditambahkan'); 
    window.location = '../form-add-faq.php';</script>";
  }
};



?>