<?php

	// $host = "ec2-18-206-108-36.compute-1.amazonaws.com";
	// $user = "qnfsbntdmiqfum";
	// $pass = "ec57e496747e683bd6f73cc2032c4d929c207005e3c8780ccbf6057d34a58901";
	// $port = "5432";
	// $dbname = "dvaq6sqisd3nt";
	// $conn = pg_connect("host=".$host." port=".$port." dbname=".$dbname." user=".$user." password=".$pass) or die("Gagal");
// ?options=project%3D&lt;project-id&gt;
// options=project%3Dep-icy-snow-409583
// options=project%3Dep-icy-snow-409583
// project=ep-icy-snow-409583;ymtEh6Ve9fJa
	$host = "ep-icy-snow-409583.ap-southeast-1.aws.neon.tech";
	$user = "desimilay";
	$pass = "project=ep-icy-snow-409583;ymtEh6Ve9fJa";
	$port = "5432";
	$dbname = "neondb";
	$conn = pg_connect("host=".$host." port=".$port." dbname=".$dbname." user=".$user." password=".$pass) or die("Gagal Koneksi Database");
?>