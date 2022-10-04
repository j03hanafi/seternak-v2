<?php
include ('../koneksi.php');

$id_ahli = $_POST['id_ahli'];

$query = pg_query("SELECT * FROM ahli where id_ahli='$id_ahli'");

?>
