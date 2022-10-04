<?php 
include('../koneksi.php');

$id_forum = $_GET["id_forum"];

$hasil = pg_query("DELETE FROM forum WHERE id_forum='$id_forum'");

if($hasil)
{
	echo "<script>
				alert('data berhasil dihapus');
				document.location.href='../index-diskusi.php';
				
			</script>";
	} else{
		echo "			
			<script>
				alert('data gagal dihapus');
				document.location.href='../index-diskusi.php';
			</script>
		";
	}

?>