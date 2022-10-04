<?php 
include('../koneksi.php');

$id_produk = $_GET["id_produk"];

$hasil = pg_query("DELETE FROM produk WHERE id_produk='$id_produk'");

if($hasil)
{
	echo "<script>
				alert('data berhasil dihapus');
				document.location.href='../index-produksaya.php';
				
			</script>";
	} else{
		echo "			
			<script>
				alert('data gagal dihapus');
				document.location.href='../index-produksaya.php';
			</script>
		";
	}

?>