<?php
// $host = "ec2-18-206-108-36.compute-1.amazonaws.com";
// $dbname = "dvaq6sqisd3nt";
// $user = "qnfsbntdmiqfum";
// $port = "5432";
// $password = "ec57e496747e683bd6f73cc2032c4d929c207005e3c8780ccbf6057d34a58901";
// $connection_string = "host={$host} port={$port} dbname={$dbname} user={$user} password={$password} ";
// $dbconn = pg_connect($connection_string);  

	$host = "ep-icy-snow-409583.ap-southeast-1.aws.neon.tech";
	$user = "desimilay";
	$pass = "project=ep-icy-snow-409583;ymtEh6Ve9fJa";
	$port = "5432";
	$dbname = "neondb";
	$dbconn = pg_connect("host=".$host." port=".$port." dbname=".$dbname." user=".$user." password=".$pass) or die("Gagal");

// $host = "localhost";
// $user = "postgres";
// $pass = "12345678";
// $port = "5433";
// $dbname = "seternak2";
// $dbconn = pg_connect("host=".$host." port=".$port." dbname=".$dbname." user=".$user." password=".$pass) or die("Gagal");
?>
