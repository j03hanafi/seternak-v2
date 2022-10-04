<?php
    session_start(); 
	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['role']!="2"){
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
    left join mitra on pemesanan.id_pemilik=mitra.id_pemilik 
    left join peternak on produk.id_peternak=peternak.id_peternak
    left join public.user on mitra.id_pemilik=public.user.username where peternak.id_peternak='$username'AND detail_pemesanan.status='3' AND pemesanan.no_pemesanan='$id' ORDER BY pemesanan.tgl_pesan");
    $datas = pg_query($dbconn,$query); 
    $cek = pg_affected_rows($datas);
    
    if($cek > 0){   
        if(isset($_POST['submitt'])){
        $restatus = $_POST['restatus'];
        $id_produk = $_POST['id_produk'];
        $query3= "UPDATE public.detail_pemesanan SET status = '$restatus' where no_pemesanan='$id' AND id_produk='$id_produk'";
        pg_query($dbconn,$query3);
        echo '<script>'; 
        echo 'alert("Pembayaran sudah dikonfirmasi");'; 
        echo 'window.location.href = " so-pengiriman-peternak.php";';
        echo '</script>';
    }else{
        // echo '<script>'; 
        // echo 'alert("Pembayaran gagal dikonfirmasi");'; 
        // echo 'window.location.href = " so-pengemasan-peternak.php";';
        // echo '</script>';
    }          

}else{
    $error =  'Data Tidak Ditemukan';
}
   

?>
<!doctype html>
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
    .form-check-input:checked {
    background-color: #198754;
    border-color: #198754;
    }
    .nav-link.order {
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
    
    <?php
    include('layout/peternak-navbar.php');
    ?>

    <div class="container"style="padding-top:100px;padding-bottom:5%;min-height:71.3vh;"> 
        <div class="card text-center">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                    <a class="nav-link order" aria-current="true" href="so-belumbayar-peternak.php">Belum dibayar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link order" href="so-pengemasan-peternak.php">Perlu Dikemas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link order active" href="so-pengiriman-peternak.php">Perlu Dikirim</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link order" href="so-selesai-peternak.php">Selesai</a>
                </li>
                </ul>
            </div>
            
            <div class="card-body">
            <div class="card" style="padding:10px;">
            <?php if($error != ''){ ?>
                <div class="alert alert-danger" role="alert"><?= $error; ?></div>
            <?php } ?>
            <!-- <h6 id="left">Pesanan <?=$_GET['nama']?></h6> -->
            <?php while($data = pg_fetch_object($datas)): ?>
                <div class="container">
                    <div class="row g-0">
                        <div style="float:left;">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0" >
                                    <!-- <img id="image2" class="rounded-circle" src="assets/ style="float:left;"> -->
                                </div>
                                <div class="flex-shrink-1">
                                
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="col-md-6" style="margin-top:20px;">
                            <img id="image" class="rounded float-start" src="assets/produk/<?=$data->foto_produk?>" alt="">
                            <h6 id="left" class="card-title">No.<?=$data->no_pemesanan?>/<?=$data->id_produk?>/<?=$data->tgl_pesan?></h6>
                            <h6 id="left" class="card-title">Pesanan <?=$data->id_pemilik?></h6>
                            <h6 id="left" class="card-title"><?=$data->nama_produk?></h6>
                            <p id="left" class="card-text"><?=$data->kuantitas?> <?=$data->satuan?></p>
                            <?php $id_produk=$data->id_produk;  ?>
                            <?php $id=$data->no_pemesanan; ?>
                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <p id="right" class="card-text">Rp.<?=$data->harga*$data->kuantitas?></p>
                            </div>
                        </div>
                        <div class="col">
                             <!-- Button trigger modal -->
                            <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $id_produk; ?>" style="float:right;">
                            Tandai Selesai
                            </button>
                        </div>
                    </div>
                </div>
                <br>
                <form action="" method="post">
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal<?php echo $id_produk; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                    
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Bukti Transfer</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                        
                            <p>Apakah pengiriman sudah sesuai?</p>
                            <input type="hidden" name="id_produk" id="" value="<?=$id_produk?>">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="inlineCheckbox1" name="restatus" value="3" checked>
                                <label class="form-check-label" for="inlineCheckbox1">Belum</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="inlineCheckbox2" name="restatus" value="4">
                                <label class="form-check-label" for="inlineCheckbox2">Sudah</label>
                            </div>
                            
                        </div>
                        
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-success" name="submitt" values="Submit">
                        </div>
                        </div>
                        
                    </div>
                    </div>
                    </form>    
                          
            <?php endwhile; ?>   
          
            </div>
           
            </div>
        </div>
    </div>

    <?php     
        
    include('layout/peternak-footer.php');
    ?>
</html>
