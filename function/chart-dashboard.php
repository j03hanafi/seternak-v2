<?php
include ('../koneksi.php');
// $username =$_GET['username'];
session_start();
$username = $_SESSION['username'];
// Query Ini buat isset kalo kalo data peternak belum diisi

$this_year = '2022';
$month_index = 1;
while($month_index <= 12){
    if($month_index >= 10){
      $month = (string)$month_index;
    }else{
      $month = "0".(string)$month_index;
    }
    $date = (string)$this_year."-".$month;

    $query=("SELECT produk.harga, detail_pemesanan.kuantitas, tgl_pesan from pemesanan
    left join detail_pemesanan on pemesanan.no_pemesanan=detail_pemesanan.no_pemesanan
    left join produk on detail_pemesanan.id_produk=produk.id_produk 
    left join peternak on produk.id_peternak=peternak.id_peternak 
    where peternak.id_peternak='$username'
    AND detail_pemesanan.status!='1'
    AND to_char(pemesanan.tgl_pesan, 'YYYY-MM') = '$date'");

    $income_this_month = 0;
    $datas = pg_query($conn,$query); 
    while($data = pg_fetch_object($datas)):
      $income_this_month = $income_this_month + ($data->harga * $data->kuantitas);
    endwhile;

    $income [] = $income_this_month;

    // $income_this_month = Rent::join('rent_details', 'rents.id', '=', 'rent_details.rent_id')
    //             ->whereIn('rents.room_id', $room_id)
    //             ->where(DB::raw("DATE_FORMAT(rent_details.started_at, '%Y-%m')"), $date)
    //             ->sum('rent_details.total_price');
    // $total = $total + $income_this_month; 
    // $analyst[$index][$month_index] = $income_this_month;
    // $income->push($income_this_month);
    
    $month_index = $month_index + 1;
}

$myJSON = json_encode($income);

echo $myJSON;
?>