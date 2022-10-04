<?php
include ('../koneksi.php');





if (isset($_POST['edit'])) {
// $name = $_POST['name'];
$name = $_POST['name'];
$username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $hashPass = password_hash($password,PASSWORD_DEFAULT);
  // $role = $_POST['role'];
  $contact = $_POST['contact'];
  $kota = $_POST['kota'];
  $alamat = $_POST['alamat'];

  $foto = $_FILES['foto'] ['name'];
  $source = $_FILES ['foto']['tmp_name'];
  $folder = '../upload/';

  $id_peternak=$_POST['id_peternak'];
  $nama_peternakan=$_POST['nama_peternakan'];
  $alamat_peternakan=$_POST['alamat_peternakan'];
  $deskripsi_usaha=$_POST['deskripsi_usaha'];



	

  if($foto != ''){

    move_uploaded_file($source,$folder.$foto);
  

    $query = pg_query($conn, "UPDATE public.user SET name='$name', email='$email',  contact='$contact',kota='$kota', alamat='$alamat', foto='$foto' WHERE username='$username'");
  
    $query2 = pg_query($conn, "UPDATE peternak SET nama_peternakan='$nama_peternakan', alamat_peternakan='$alamat_peternakan', deskripsi_usaha='$deskripsi_usaha' WHERE id_peternak='$id_peternak'");


  } else {

    $query = pg_query($conn, "UPDATE public.user SET name='$name', email='$email',  contact='$contact',kota='$kota', alamat='$alamat' WHERE username='$username'");
    $query2 = pg_query($conn, "UPDATE peternak SET nama_peternakan='$nama_peternakan', alamat_peternakan='$alamat_peternakan', deskripsi_usaha='$deskripsi_usaha' WHERE id_peternak='$id_peternak'");



  }

  // if($foto != ''){

  //   move_uploaded_file($source,$folder.$foto);
  //   $query = pg_query($conn, "UPDATE ahli SET username='$username', email='$email', password='$password', contact='$contact', alamat='$alamat', foto='$foto', jam_available='$jam_available' WHERE name='$name'");

  // } 

  
  // else {

  //   $query = pg_query($conn, "UPDATE ahli SET username='$username', email='$email', password='$password', contact='$contact', alamat='$alamat', jam_available='$jam_available' WHERE name='$name'");


  // }
 

  if ($query && $query2) {
    echo "<script>alert('Data Berhasil Diubah'); </script>";

    header("location:../index-profile-peternak.php?username=$username");
  } else {
    echo "<script>alert('Data Gagal Diubah'); </script>";

    header("location:../form-edit-profile-peternak.php?username=$username");
  }

 
}



?>
