<?php

	// $host = "ec2-18-206-108-36.compute-1.amazonaws.com";
	// $user = "qnfsbntdmiqfum";
	// $pass = "ec57e496747e683bd6f73cc2032c4d929c207005e3c8780ccbf6057d34a58901";
	// $port = "5432";
	// $dbname = "dvaq6sqisd3nt";
	// $conn = pg_connect("host=".$host." port=".$port." dbname=".$dbname." user=".$user." password=".$pass) or die("Gagal");

	$host = "localhost";
	$user = "postgres";
	$pass = "code2016";
	$port = "5432";
	$dbname = "seternak";
	$conn = pg_connect("host=".$host." port=".$port." dbname=".$dbname." user=".$user." password=".$pass) or die("Gagal");
?>
