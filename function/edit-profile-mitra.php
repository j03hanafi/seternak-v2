<?php
include ('../koneksi.php');





if (isset($_POST['edit'])) {
// $name = $_POST['name'];
$name = $_POST['name'];
$username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  // $role = $_POST['role'];
  $contact = $_POST['contact'];
  $kota = $_POST['kota'];
  $alamat = $_POST['alamat'];

  $foto = $_FILES['foto'] ['name'];
  $source = $_FILES ['foto']['tmp_name'];
  $folder = '../upload/';

  $id_pemilik=$_POST['id_pemilik'];
  $nama_usaha=$_POST['nama_usaha'];
  $alamat_usaha=$_POST['alamat_usaha'];

	

  if($foto != ''){

    move_uploaded_file($source,$folder.$foto);
  

    $query = pg_query($conn, "UPDATE public.user SET name='$name', email='$email',  contact='$contact',kota='$kota', alamat='$alamat', foto='$foto' WHERE username='$username'");
    $query2 = pg_query($conn, "UPDATE public.mitra SET nama_usaha='$nama_usaha', alamat_usaha='$alamat_usaha' WHERE id_pemilik='$id_pemilik'");

  } else {

    $query = pg_query($conn, "UPDATE public.user SET name='$name', email='$email',  contact='$contact',kota='$kota', alamat='$alamat' WHERE username='$username'");
    $query2 = pg_query($conn, "UPDATE public.mitra SET nama_usaha='$nama_usaha', alamat_usaha='$alamat_usaha' WHERE id_pemilik='$id_pemilik'");


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

    header("location:../index-profile-mitra.php?username=$username");
  } else {
    echo "<script>alert('Data Gagal Diubah'); </script>";

    header("location:../form-edit-profile-mitra.php?username=$username");
  }

 
}



?>
