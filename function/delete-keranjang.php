<?php 
include('../koneksi.php');

$id_keranjang = $_GET['id_keranjang'];

$hasil = pg_query("DELETE FROM public.keranjang WHERE keranjang.id_keranjang='$id_keranjang'");

if($hasil)
{
	echo "<script>
				alert('data berhasil dihapus');
				document.location.href='../index-keranjang.php';
				
			</script>";
	} else{
		echo "			
			<script>
				alert('data gagal dihapus');
				document.location.href='../index-keranjang.php';
			</script>
		";
	}

?>