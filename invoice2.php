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

    $html = '<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <!-- Add icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Status Order</title>
  </head>
  <style type="text/css">
    #left { text-align: left;}
    #right { text-align: right;}
    #center { text-align: center;}
    #justify { text-align: justify;}
    #right-btn { align:right;}
    #image { width: 100px ; height: 100px ; margin-right:20px;}
    #image2 { width: 50px ; height: 50px ; margin-right:20px;}
    .nav-link.order{
    color: #198754 !important;
    }
    
  </style>
  <body>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
    

    <div class="container"style="padding-top:100px;padding-bottom:5%;min-height:71.3vh;">'; 
        while($data = pg_fetch_object($datas)):
        $tgl_pesan=date_create($data->tgl_pesan);
        $html .= '<div class="row profil-wrapper">
          <div class="col-md-12 mb-5 jarak">
            <div class="card shadow-sm rounded">
              <div class="card-header shadow-sm rounded-top hijau" style="background-color: #0E8550;">
                <div class="card-title ps-3 fw-bold text-light">INVOICE</div>
              </div>
              <div class="card-body">
                <div class="row ms-5 me-5 pas">
                  <div class="d-flex justify-content-end">
                  </div>
                    <div class="card-header shadow-sm bg-body mt-3 rounded" style="background-color: white;">
                      <div class="card-title ps-3 fw-bold">
                        <div class="d-flex justify-content-center">

                          <div style="flex: 1;">
                            <span class="fw-bold bi bi-shop bt"></span>
                            <h5 class="fw-bold ms-2 list-inline-item font-hijau font-q">Invoice Pemesanan</h5>
                          </div>
                        </div>
                        <div class="d-flex justify-content-center">

                          <div style="flex: 1;">
                            <h6 class="ms-2 font-hijau font-q">Kode Pemesanan : '.$data->no_pemesanan.'</h6>
                          </div>
                        </div>
                        <div class="d-flex justify-content-center">

                          <div style="flex: 1;">
                            <h6 class="ms-2 font-hijau font-q">Tanggal Pemesanan : '.date_format($tgl_pesan,"d M Y").'</h6>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card shadow px-4 py-1 mb-3">
                      <div class="card-body aha">
                        <table class="table table-borderless ">
                          <thead class="text-black-50">
                            <tr class="text-center">
                              <th scope="col" style="width:20%; vertical-align: middle;" class="font-p">Produk</th>
                              <th scope="col" style="width:10%; vertical-align: middle;" class="font-p">Nama</th>
                              <th scope="col" style="width:15%; vertical-align: middle;" class="font-p">Harga</th>
                              <th scope="col" style="width:15%; vertical-align: middle;" class="font-p">Jumlah</th>
                              <th scope="col" style="width:10%; vertical-align: middle;" class="font-p">Subtotal Produk</th>
                            </tr>
                          </thead>
                          <tbody>

                            <tr class="text-center">
                              <th scope="row" class="foto-p">
                                <img src="assets/produk/'.$data->foto_produk.'" alt="" style="height:100px">
                              </th>
                              <td class="font-p">'. $data->nama_produk .'
                                <br>
                                <p class="fw-bold ms-2 list-inline-item font-hijau font-p">'. $data->nama_peternakan .'</p>
                              </td>
                              <td id="harga" class="font-p">'."Rp. ".number_format($data->harga, 0, ',', '.'). ",00".'</td>
                              <td class="font-p d-flex justify-content-center">
                                '. $data->kuantitas .'
                              <td id="total" class="font-p">'. "Rp. ".number_format($data->harga * $data->kuantitas, 0, ',', '.'). ",00".'
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  <div class="card shadow px-4 py-1 mb-3">
                    <div class="card-body aha">
                      <div class="row">
                        <table>
                          <tr class="font-p">
                            <td width="20%">Nama Mitra</td>
                            <td>'.$data->nama_usaha.'</td>
                          </tr>
                          <tr class="font-p">
                            <td>Alamat Pengiriman</td>
                            <td>'.$data->alamat_usaha.'</td>
                          </tr>
                        </table>
                      </div>
                    </div>
                  </div>
                  

                </div>
              </div>
            </div>

          </div> 
        </div>';
        endwhile;
    
    $html .= '</div>
    
  
</body>
</html>';

$mpdf->WriteHTML($html);
$mpdf->Output('Invoice.pdf', "I");

?>
