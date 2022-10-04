<?php

include '../koneksi.php';
// $jml_barang = $_POST['kuantitas'];
// $username =$_GET['username'];
if(isset($_POST['activate']))
{
  $username = $_POST['username'];
  $query = pg_query($conn, "UPDATE public.user SET verified=2 WHERE username='$username'");

  if ($query) {
    
    header("location:../login.php?activated=true");
  } else {
    header("location:../login.php?activated=true");
  }

}
?>