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

    include 'vendor/autoload.php';

    $mpdf = new \Mpdf\Mpdf();

    $html = '<!DOCTYPE html>
                <html lang="en">

                <head>
                    <meta charset="utf-8">
                    <title>Laporan Penjualan Peternak</title>
                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">
                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">
                    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
                        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
                    <style>
                        @media print {
                            @page {
                                size: landscape
                            }
                        }

                        @page {
                            size: A4 landscape;
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
                            color: white;
                            background-color: #0e8550;
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
                            </div>
                            <div class="col-12">
                                <center>
                                    <h4><b>Laporan Penjualan Peternak</b></h4>
                                </center>
                            </div>
                        </div>
                        <br>
                        <hr>
                        <div class="row">
                            <div class="col-12">
                                <p><strong>Laporan Penjualan pada : '. date_format($date_start,"d M Y") .' s/d '. date_format($date_end,"d M Y") .'</strong></p>
                            </div>
                        </div>
                        
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Produk</th>
                                    <th>Mitra</th>
                                    <th>Tanggal</th>
                                    <th>Kuantitas</th>
                                    <th>Harga</th>
                                </tr>
                            </thead>
                            <tbody>';

                                $no = 1;
                                $total_harga = 0;
                                while($data = pg_fetch_object($datas)): 
                                $harga = "Rp. ".number_format($data->harga, 0, ',', '.'). ",00";
                                $date=date_create($data->tgl_pesan);
                                
                                $html .=
                                    '<tr>
                                        <td>'.$no.'</td>
                                        <td>'.$data->nama_produk.'</td>
                                        <td>'.$data->nama_usaha.'</td>
                                        <td>'.date_format($date,"d M Y").'</td>
                                        <td>'.$data->kuantitas.'</td>
                                        <td>'.$harga.'</td>
                                    </tr>';

                                $total_harga = $total_harga + $data->harga;
                                $no++;
                                endwhile; 

                                $html .= '<tr>
                                    <th colspan="5">Total</th>
                                    <th>'. "Rp. ".number_format($total_harga, 0, ',', '.'). ",00".'</th>
                                </tr>
                            </tbody>
                        </table>

                        <hr>
                    </section>
                </body>

                </html>';

    $mpdf->WriteHTML($html);
    $mpdf->Output('Laporan penjualan.pdf', "I");
?>

