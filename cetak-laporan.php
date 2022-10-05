<?php
    session_start(); 
    include 'koneksi.php';
    $username = $_SESSION['username'];
    $start = $_POST['start'];
    $end = $_POST['end'];
    $date_start=date_create($start);
    $date_end=date_create($end);

    $ambil = pg_query($conn, "SELECT * FROM ahli");
    $query=("SELECT * FROM detail_pemesanan
    left join pemesanan on detail_pemesanan.no_pemesanan=pemesanan.no_pemesanan 
    left join produk on detail_pemesanan.id_produk=produk.id_produk 
    left join mitra on pemesanan.id_pemilik=mitra.id_pemilik
    left join peternak on produk.id_peternak=peternak.id_peternak
    left join public.user on peternak.id_peternak=public.user.username
    where peternak.id_peternak='$username' AND pemesanan.tgl_pesan >= '$start' AND pemesanan.tgl_pesan <= '$end'
    ORDER BY pemesanan.tgl_pesan ASC");

    $datas = pg_query($conn,$query); 
?>

