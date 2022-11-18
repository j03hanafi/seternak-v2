<?php
include ('../koneksi.php');
// $username =$_GET['username'];
session_start();
$username = $_SESSION['username'];
// Query Ini buat isset kalo kalo data peternak belum diisi
$this_year = '2022';

$query1=("SELECT id_produk, nama_produk from produk
where id_peternak='$username'");

$datas = pg_query($conn,$query1); 
$index = 0;
$obj = (object)[];
while($data = pg_fetch_object($datas)):
  
  $obj->produk[$index] = $data->nama_produk;
  
  $query2=("SELECT SUM(detail_pemesanan.kuantitas) AS total from pemesanan
  left join detail_pemesanan on pemesanan.no_pemesanan=detail_pemesanan.no_pemesanan
  left join produk on detail_pemesanan.id_produk=produk.id_produk 
  left join peternak on produk.id_peternak=peternak.id_peternak 
  where peternak.id_peternak='$username'
  AND detail_pemesanan.status!='1'
  AND detail_pemesanan.id_produk = '$data->id_produk'
  AND to_char(pemesanan.tgl_pesan, 'YYYY') = '$this_year'");
$charts = pg_query($conn,$query2); 
while($chart = pg_fetch_object($charts)){
  if($chart->total){
    $obj->kuantitas[$index] = $chart->total;
  }else{
    $obj->kuantitas[$index] = 0;
  }
}
$index++;
endwhile;
  
$myJSON = json_encode($obj);

echo $myJSON;
?>