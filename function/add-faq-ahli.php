<?php
include ('../koneksi.php');


  
if (isset($_POST['tambah'])) {
  $id_faq_ahli = $_POST['id_faq_ahli'];
  $id_ahli = $_POST['id_ahli'];
  $pertanyaan = $_POST['pertanyaan'];
  $jawaban = $_POST['jawaban'];

  
  $query = pg_query($conn, "INSERT INTO public.faq_ahli (id_faq_ahli,id_ahli,pertanyaan,jawaban) VALUES ('$id_faq_ahli','$id_ahli','$pertanyaan','$jawaban')");

  
  if ($query) {
    echo "<script>alert('Data Berhasil Ditambahkan'); 
    window.location = '../index-faq-ahli.php';</script>";
  } else {
    echo "<script>alert('Data Gagal Ditambahkan'); 
    window.location = '../form-add-faq-ahli.php';</script>";
  }
};



?>