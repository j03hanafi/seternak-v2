<?php
include ('../koneksi.php');



if (isset($_POST['edit'])) {
  $id_komoditas = $_POST['id_komoditas'];
  $nama_komoditas = $_POST['nama_komoditas'];
  $harga_komoditas = $_POST['harga_komoditas'];
  $satuan_komoditas = $_POST['satuan_komoditas'];

  $query = pg_query($conn, "UPDATE komoditas SET nama_komoditas='$nama_komoditas', harga_komoditas='$harga_komoditas',  satuan_komoditas='$satuan_komoditas' WHERE id_komoditas='$id_komoditas'");

  if ($query) {
    echo "<script>alert('Data Berhasil Diubah'); </script>";

    header("location:../index-komoditas.php");
  } else {
    echo "<script>alert('Data Gagal Diubah'); </script>";

    header("location:../form-edit-komoditas.php?id_komoditas=$id_komoditas");
  }

  };



?>
