<?php
include ('../koneksi.php');


  
if (isset($_POST['tambah'])) {
  $id_ahli = $_POST['id_ahli'];
  $nama_ahli = $_POST['nama_ahli'];
  $nip = $_POST['nip'];
  $jabatan = $_POST['jabatan'];
  $contact = $_POST['contact'];
  $deskripsi_ahli = $_POST['deskripsi_ahli'];
  $profil_singkat = $_POST['profil_singkat'];

  //foto
  $foto = $_FILES['foto'] ['name'];
  $source = $_FILES ['foto']['tmp_name'];
  $folder = '../upload/';

  move_uploaded_file($source,$folder.$foto);

  //video
  $video = $_FILES['video']['name'];
  $type = $_FILES['video']['type'];
  $size = $_FILES['video']['size'];

  $nama_file = str_replace(" ", "_", $video);
  $tmp_name = $_FILES['video']['tmp_name'];
  $nama_folder = "../video_upload/";
  $file_baru = $nama_folder . basename($nama_file);

  if ((($type == "video/mp4") || ($type == "video/3gpp")) && ($size < 100000000)) {
    move_uploaded_file($tmp_name, $file_baru);
    $pesan = "Upload file video $nama_file berhasil diupload";
  } else {
    $pesan = "File Video Terlalu Besar Atau Format Video Salah!";
  }
 

  //jam
  $jam_available = $_POST ['jam_available'];

  $query = pg_query($conn, "INSERT INTO ahli (id_ahli,nama_ahli,nip,jabatan,contact,deskripsi_ahli,foto,video,jam_available,profil_singkat) VALUES ('$id_ahli','$nama_ahli','$nip','$jabatan','$contact','$deskripsi_ahli','$foto','$video','$jam_available','$profil_singkat')");
  // header('Location: nasabah.php');


  
  if ($query) {
    echo "<script>alert('Data Berhasil Ditambahkan'); 
    window.location = '../index-ahli.php';</script>";
  } else {
    echo "<script>alert('Data Gagal Ditambahkan'); 
    window.location = '../form-add-ahli.php';</script>";
  }
};


?>