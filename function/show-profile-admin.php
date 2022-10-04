<?php
include ('../koneksi.php');

$username = $_POST['username'];

$query = pg_query("SELECT * FROM public.user where username='$username'");

?>
