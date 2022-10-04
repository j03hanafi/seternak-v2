<?php
include ('../koneksi.php');

if (isset($_POST['edit'])) {
$id_faq_ahli = $_POST['id_faq_ahli'];
$id_ahli = $_POST['id_ahli'];
$pertanyaan = $_POST['pertanyaan'];
  $jawaban = $_POST['jawaban'];
  

    $query = pg_query($conn, "UPDATE public.faq_ahli SET pertanyaan='$pertanyaan', jawaban='$jawaban' WHERE id_faq_ahli='$id_faq_ahli'");



  if ($query) {
    echo "<script>alert('Data Berhasil Diubah'); 
    window.location = '../index-faq-ahli.php';</script>";
  } else {
    echo "<script>alert('Data Gagal Diubah'); 
    window.location = '../form-edit-faq-ahli.php';</script>";
  }

  };
