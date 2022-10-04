<?php 
  session_start(); 
	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['role']!="1"){
		header("location:login.php?pesan=gagal");
	}
  $username=$_SESSION['username'];
  include("config.php");
  $error='';
  $id=$_GET['id'];
  $username = $_SESSION['username'];
  $query=("SELECT produk.foto as foto_produk, * from pemesanan
  left join detail_pemesanan on pemesanan.no_pemesanan=detail_pemesanan.no_pemesanan
  left join produk on detail_pemesanan.id_produk=produk.id_produk 
  left join peternak on produk.id_peternak=peternak.id_peternak
  left join mitra on pemesanan.id_pemilik=mitra.id_pemilik
  left join public.user on mitra.id_pemilik=public.user.username where pemesanan.no_pemesanan='$id'");
  $datas = pg_query($dbconn,$query); 
  
  require_once __DIR__ . '/vendor/autoload.php';

  $mpdf = new \Mpdf\Mpdf();

  while($data = pg_fetch_object($datas)): 
  $html = '<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Laporan Transaksi Booking Lapangan Futsal</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">
    <style>
        @media print {
            @page {
                size: landscape
            }
        }

        @page {
            size: A4 landscape;
        }
        body{
            font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
        }

        h1 {
            font-weight: bold;
            font-size: 20pt;
            text-align: center;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        .table th {
            padding: 8px 8px;
            border: 1px solid #000000;
            font-weight: bold;
            text-align: center;
            color: rgb(17, 39, 17);
            background-color: rgb(255, 252, 252);
        }

        .table td {
            padding: 3px 3px;
            border: 1px solid #000000;
            text-align: center;
            background-color: white;
        }

        .text-center {
            text-align: center;
        }
    </style>
    <style type="text/css" media="print">
        .page {
            -webkit-transform: rotate(-90deg);
            -moz-transform: rotate(-90deg);
            filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=3);
        }
    </style>
</head>

<body>
    <section class="sheet padding-10mm">
        <div class="row">
            <div class="col-12">
                <table>
                    <tr>
                        <td style="width:5%;">
                            <img src="assets/logop.jpg" style="width: 100%; max-width: 80px" />
                        </td>
                        <td><center><b>INVOICE</b><br>
                            <b>Kode Pemesanan : '.$id.'</b>
                            </center>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <br>
        <hr><br>
        <div class="row">
            <div class="col-12">
                <table>
                    <tr>
                        <td style="width:15% ;">Nama Mitra</td>
                        <td style="width:2% ;">:</td>
                        <td>'.$data->nama_usaha.'</td>
                    </tr>
                    <tr>
                        <td>Tanggal Pemesanan</td>
                        <td>:</td>
                        <td>'.$data->tgl_pesan.'</td>
                    </tr>
                    <tr>
                        <td>Alamat Pengiriman</td>
                        <td>:</td>
                        <td>'.$data->alamat_usaha.'</td>
                    </tr>
                </table>
            </div>
        </div><br>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Produk - Peternak</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>'.$data->nama_produk.'</td>
                    <td>'. "Rp. ".number_format($data->harga, 0, ',', '.'). ",00".'</td>
                    <td>'.$data->kuantitas.'</td>
                    <td>'. "Rp. ".number_format($data->harga * $data->kuantitas, 0, ',', '.'). ",00".'</td>
                </tr>
                <tr>
                    <th colspan="4">Total</th>
                    <th>'. "Rp. ".number_format($data->harga * $data->kuantitas, 0, ',', '.'). ",00".'</th>
                </tr>
            </tbody>
        </table>

        <hr>
    </section>
</body>

</html>';
      endwhile;
$mpdf->WriteHTML($html);
$mpdf->Output('Invoice.pdf', "I");
?>
