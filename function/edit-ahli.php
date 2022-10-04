<?php
include ('../koneksi.php');

if (isset($_POST['edit'])) {
// $id_ahli = $_POST['id_ahli'];
$id_ahli = $_POST['id_ahli'];
$nama_ahli = $_POST['nama_ahli'];
  $nip = $_POST['nip'];
  $jabatan = $_POST['jabatan'];
  $contact = $_POST['contact'];
  $deskripsi_ahli = $_POST['deskripsi_ahli'];
  $profil_singkat = $_POST['profil_singkat'];

  $foto = $_FILES['foto'] ['name'];
  $source = $_FILES ['foto']['tmp_name'];
  $folder = '../upload/';



  
   //video
   $video = $_FILES['video']['name'];
   $type = $_FILES['video']['type'];
   $size = $_FILES['video']['size'];
 

   
  $jam_available = $_POST['jam_available'];

  if($foto != ''){

    move_uploaded_file($source,$folder.$foto);
    $query = pg_query($conn, "UPDATE ahli SET nama_ahli='$nama_ahli', nip='$nip', jabatan='$jabatan', contact='$contact', deskripsi_ahli='$deskripsi_ahli', foto='$foto', jam_available='$jam_available', profil_singkat='$profil_singkat' WHERE id_ahli='$id_ahli'");

  } else {

    $query = pg_query($conn, "UPDATE ahli SET nama_ahli='$nama_ahli', nip='$nip', jabatan='$jabatan', contact='$contact', deskripsi_ahli='$deskripsi_ahli', jam_available='$jam_available', profil_singkat='$profil_singkat' WHERE id_ahli='$id_ahli'");


  }


  if($video != ''){

    $nama_file = str_replace(" ", "_", $video);
    $tmp_name = $_FILES['video']['tmp_name'];
    $nama_folder = "../video_upload/";
    $file_baru = $nama_folder . basename($nama_file);
  
    if ((($type == "video/mp4") || ($type == "video/3gp")) && ($size < 100000000)) {
      move_uploaded_file($tmp_name, $file_baru);
      $pesan = "Upload file video $nama_file berhasil diupload";
    } else {
      $pesan = "File Video Terlalu Besar Atau Format Video Salah!";
    }

    $query = pg_query($conn, "UPDATE ahli SET nama_ahli='$nama_ahli', nip='$nip', jabatan='$jabatan', contact='$contact', deskripsi_ahli='$deskripsi_ahli', video='$video', jam_available='$jam_available', profil_singkat='$profil_singkat' WHERE id_ahli='$id_ahli'");
   
  }
  
  else {

    $query = pg_query($conn, "UPDATE ahli SET nama_ahli='$nama_ahli', nip='$nip', jabatan='$jabatan', contact='$contact', deskripsi_ahli='$deskripsi_ahli', jam_available='$jam_available', profil_singkat='$profil_singkat' WHERE id_ahli='$id_ahli'");


  }




  if ($query) {
    echo "<script>alert('Data Berhasil Diubah'); 
    window.location = '../index-ahli.php';</script>";
  } else {
    echo "<script>alert('Data Gagal Diubah'); 
    window.location = '../form-edit-ahli.php';</script>";
  }

  };



?>
