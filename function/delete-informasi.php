<?php 
include('../koneksi.php');

$id_info = $_GET["id_info"];

$hasil = pg_query("DELETE FROM informasi WHERE id_info='$id_info'");

if($hasil)
{
	echo "<script>
				alert('data berhasil dihapus');
				document.location.href='../index-informasi.php';
				
			</script>";
	} else{
		echo "			
			<script>
				alert('data gagal dihapus');
				document.location.href='../index-informasi.php';
			</script>
		";
	}

?>