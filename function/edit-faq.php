<?php
include ('../koneksi.php');

if (isset($_POST['edit'])) {
$id_faq = $_POST['id_faq'];
$pertanyaan = $_POST['pertanyaan'];
  $jawaban = $_POST['jawaban'];
  

    $query = pg_query($conn, "UPDATE public.faq_seternak SET pertanyaan='$pertanyaan', jawaban='$jawaban' WHERE id_faq='$id_faq'");



  if ($query) {
    echo "<script>alert('Data Berhasil Diubah'); 
    window.location = '../index-faq.php';</script>";
  } else {
    echo "<script>alert('Data Gagal Diubah'); 
    window.location = '../form-edit-faq.php';</script>";
  }

  };
