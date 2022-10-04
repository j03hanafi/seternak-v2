<?php
 
include('../config.php');
 
$username = $_POST['username'];
 
function randomPassword()
{
// function untuk membuat password random 6 digit karakter
 
$digit = 6;
$karakter = "ABCDEFGHJKLMNPQRSTUVWXYZ23456789";
 
srand((double)microtime()*1000000);
$i = 0;
$pass = "";
while ($i <= $digit-1)
{
$num = rand() % 32;
$tmp = substr($karakter,$num,1);
$pass = $pass.$tmp;
$i++;
}
return $pass;
}
 
// membuat password baru secara random -> memanggil function randomPassword
$newPassword = randomPassword();
 
// perlu dibuat sebarang pengacak
// $pengacak  = "NDJS3289JSKS190JISJI";
     
// mengenkripsi password dengan md5() dan pengacak
// $newPasswordEnkrip = md5($pengacak . md5($newPassword) . $pengacak);
$newPasswordEnkrip = password_hash($newPassword, PASSWORD_DEFAULT);
// mencari alamat email si user
$query = "SELECT * FROM public.user WHERE username = '$username'";
$hasil = pg_query($query);
$data  = pg_fetch_array($hasil);
$alamatEmail = $data['email'];
 
// title atau subject email
$title  = "Reset Password";
 
// isi pesan email disertai password
$pesan  = "Username Anda : ".$username.". \nPassword Anda yang baru adalah ".$newPassword;
 
// header email berisi alamat pengirim
$header = "From: seternak@gmail.com";
 
// mengirim email
$kirimEmail = mail($alamatEmail, $title, $pesan, $header);
 
// cek status pengiriman email
if ($kirimEmail) {
 
    // update password baru ke database (jika pengiriman email sukses)
    $query = "UPDATE public.user SET password = '$newPasswordEnkrip' WHERE username = '$username'";
    $hasil = pg_query($query);
     
    if ($hasil) {
        echo '<script>'; 
        echo 'alert("Cek email anda");'; 
        echo 'window.location.href = "../login.php";';
        echo '</script>';
    }else {
        echo '<script>'; 
        echo 'alert("Gagal mengirimkan email");'; 
        echo 'window.location.href = "../login.php";';
        echo '</script>';
    }
}
?>