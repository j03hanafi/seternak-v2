<?php
session_start();
include("config.php");

$username = $_POST['username'];
$password = $_POST['password'];

$login = pg_query($dbconn,"SELECT * FROM public.user WHERE username='$username'");
$cek = pg_affected_rows($login);

// cek apakah username dan password di temukan pada database
if($cek > 0){
$data = pg_fetch_assoc($login);
if(password_verify($password, $data['password'])){
	if($data['verified'] == 2){
		// cek jika user login sebagai user
		if($data['role']=="1"){

			// buat session login dan username 
			$_SESSION['username'] = $username;
			$_SESSION['role'] = "1";
			// alihkan ke halaman dashboard user

			header("location:index-pasar.php");


		// cek jika user login sebagai partner
		}else if($data['role']=="2"){
			// buat session login dan username
			$_SESSION['username'] = $username;
			$_SESSION['role'] = "2";
			// alihkan ke halaman dashboard partner
			header("location:index.php");

		// cek jika user login sebagai admin
		}else if($data['role']=="3"){
			// buat session login dan username
			$_SESSION['username'] = $username;
			$_SESSION['role'] = "3";
			// alihkan ke halaman dashboard admin
			header("location:index-informasi.php");

		}else{

			// alihkan ke halaman login kembali
			header("location:login.php?pesan=gagal");
		}	
	}else{
		header("location:login.php?pesan=activate");
	}
}else{
	header("location:login.php?pesan=gagal");
}


}else{
header("location:login.php?pesan=gagal");
}

?>