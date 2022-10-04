<?php
    session_start(); 
	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['role']!="1"){
		header("location:login.php?pesan=gagal");
	}
    $username=$_SESSION['username'];
    include("config.php");
    $error='';
    $username = $_SESSION['username'];
    $query=("SELECT DISTINCT ON (detail_pemesanan.no_pemesanan) *
    FROM detail_pemesanan
    left join pemesanan on detail_pemesanan.no_pemesanan=pemesanan.no_pemesanan
    left join mitra on pemesanan.id_pemilik=mitra.id_pemilik
    left join public.user on mitra.id_pemilik=public.user.username
    where mitra.id_pemilik='$username' AND detail_pemesanan.status='2'
    ORDER BY detail_pemesanan.no_pemesanan ASC");
    $datas = pg_query($dbconn,$query); 
    $cek = pg_affected_rows($datas);
    if($cek > 0){
        
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
    include('layout/mitra-navbar.php');
    ?>


    <div class="container"style="padding-top:100px;padding-bottom:5%;min-height:71.3vh;"> 
        <div class="card text-center">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                    <a class="nav-link order" aria-current="true" href="so-belumbayar-mitra.php">Belum dibayar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link order active" href="so-pengemasan-mitra.php">Pengemasan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link order" href="so-pengiriman-mitra.php">Pengiriman</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link order" href="so-selesai-mitra.php">Selesai</a>
                </li>
                </ul>
            </div>
            

            
            <div class="card-body">
                <div class="card text-start" style="padding:10px;">
                <?php if($error != ''){ ?>
                    <div class="alert alert-danger" role="alert" id="center"><?= $error; ?></div>
                <?php } ?>
                <ul class="list-group list-group-flush">
                    <?php while($data = pg_fetch_object($datas)): ?>
                        <li class="list-group-item">
                        <h5>No.pemesanan: <?=$data->no_pemesanan?></h5>
                        <?php echo date("d F Y", strtotime($data->tgl_pesan)) ?>
                            <a class="btn btn-outline-success" href="detail-pengemasan-mitra.php?id=<?=$data->no_pemesanan?>" style="float:right; role=button">Detail</a>
                        </li>
                    <?php endwhile; ?>   
                </ul>
                    
                </div>
            </div>
            
        </div>
    </div>
    
    <?php     
        
    include('layout/mitra-footer.php');
    ?>
</html>