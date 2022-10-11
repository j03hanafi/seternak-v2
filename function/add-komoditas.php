<?php
include ('../koneksi.php');

function generateRandomString($length = 12) {
  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $charactersLength = strlen($characters);
  $randomString = '';
  for ($i = 0; $i < $length; $i++) {
      $randomString .= $characters[rand(0, $charactersLength - 1)];
  }
  return $randomString;
}
  
if (isset($_POST['tambah'])) {
  $id_komoditas = generateRandomString();
  $nama_komoditas = $_POST['nama_komoditas'];
  $harga_komoditas = $_POST['harga_komoditas'];
  $satuan_komoditas = $_POST['satuan_komoditas'];
  $query = pg_query($conn, "INSERT INTO komoditas (id_komoditas,nama_komoditas,harga_komoditas,satuan_komoditas) VALUES ('$id_komoditas','$nama_komoditas','$harga_komoditas','$satuan_komoditas')");
  // header('Location: nasabah.php');


  
  if ($query) {
    echo "<script>alert('Data Berhasil Ditambahkan'); 
    window.location = '../index-komoditas.php';</script>";
  } else {
    echo "<script>alert('Data Gagal Ditambahkan'); 
    window.location = '../form-add-komoditas.php';</script>";
  }
};


?>