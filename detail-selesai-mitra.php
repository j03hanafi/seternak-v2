<?php
    session_start(); 
	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['role']!="1"){
		header("location:login.php?pesan=gagal");
	}
    $username=$_SESSION['username'];
    include("config.php");
    $error='';
    $id_produk=$_GET['id_produk'];
    $id=$_GET['id'];
    $username = $_SESSION['username'];
    $query=("SELECT produk.foto as foto_produk, * from pemesanan
    left join detail_pemesanan on pemesanan.no_pemesanan=detail_pemesanan.no_pemesanan
    left join produk on detail_pemesanan.id_produk=produk.id_produk 
    left join peternak on produk.id_peternak=peternak.id_peternak
    left join mitra on pemesanan.id_pemilik=mitra.id_pemilik
    left join public.user on mitra.id_pemilik=public.user.username where pemesanan.no_pemesanan='$id'and pemesanan.id_pemilik='$username' and detail_pemesanan.status='4';");
    $datas = pg_query($dbconn,$query); 
    


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
    @import url(./fonts/font-awesome/css/font-awesome.css);

        form,
        label {
            margin: 0;
            padding: 0;
        }

        .content {
            width: 408px;
            border: 1px #ccc solid;
            padding: 15px;
            margin: auto;
            height: 200px;
        }

        .rating {
            border: none;
            float: right;
        }

        .rating>input {
            display: none;
        }

        .rating>label::before {
            margin: 5px;
            font-size: 1.25em;
            font-family: FontAwesome;
            display: inline-block;
            content: "\f005";
        }

        .rating>label {
            color: #ddd;
            float: right;
        }

        .rating>input:checked~label,
        .rating:not(:checked)>label:hover,
        .rating:not(:checked)>label:hover~label {
            color: #f7d106;
        }

        .rating>input:checked+label:hover,
        .rating>input:checked~label:hover,
        .rating>label:hover~input:checked~label,
        .rating>input:checked~label:hover~label {
            color: #fce873;
        }

        h4 {
            font-weight: normal;
            margin-top: 40px;
            margin-bottom: 0px;
        }

        #hasil {
            font-size: 20px;
        }

        #star {
            float: left;
            padding-right: 20px;
        }

        #star span {
            padding: 3px;
            font-size: 20px;
        }

        .on {
            color: #f7d106
        }

        .off {
            color: #ddd;
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
                    <a class="nav-link order" href="so-pengemasan-mitra.php">Pengemasan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link order" href="so-pengiriman-mitra.php">Pengiriman</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link order active" href="so-selesai-mitra.php">Selesai</a>
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
                            <h6 id="left" class="card-title">Kode : <?=$data->id_produk?><?php $id_produk=$data->id_produk ?></h6>
                            <h6 id="left" class="card-title">Metode Pengiriman : 
                                <?php
                                    if($data->metode_pengiriman == 1){
                                        echo "Payokurir";
                                    }elseif($data->metode_pengiriman == 2){
                                        echo "Go-send";
                                    }elseif($data->metode_pengiriman == 3){
                                        echo "Pengantaran Langsung";
                                    }else{
                                        echo "-";
                                    }
                                ?>
                            </h6>
                            <h6 id="left" class="card-title"><?=$data->nama_peternakan?></h6>
                            <h6 id="left" class="card-title"><?=$data->nama_produk?></h6>
                            <p id="left" class="card-text"><?=$data->kuantitas?> <?=$data->satuan?></p>
                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <p id="right" class="card-text">Rp.<?=$data->harga*$data->kuantitas?></p>
                                <a class="btn btn-outline-success" href="invoice.php?id=<?=$data->no_pemesanan?>" style="float:right; role=button">Invoice</a>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <button type="button" class="btn btn-outline-success col-md-2 ms-auto" data-bs-toggle="modal" data-bs-target="#exampleModal<?=$data->id_produk?>" style="float:right;">
                Beri Rating
                </button>
                                    
          
  
    

    <!-- Modal -->
    <div class="modal fade" id="exampleModal<?=$data->id_produk?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
    
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Review</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
        <!-- <input type="text" name="" id="" value="<?=$id?>"> -->
            <form method="POST" action="function/proses_review.php">
                <input type="hidden" name="id_produk" value="<?=$id_produk?>">
                <input type="hidden" id="id" name="id" value="<?=$id?>">
                <div id="rating" class="rating">
                <input type="radio" class="rate" id="star5" name="rating" value="5"/>
                <label for="star5" title="Sempurna - 5 Bintang"></label>

                <input type="radio" class="rate" id="star4" name="rating" value="4"/>
                <label for="star4" title="Sangat Bagus - 4 Bintang"></label>

                <input type="radio" class="rate" id="star3" name="rating" value="3" />
                <label for="star3" title="Bagus - 3 Bintang"></label>

                <input type="radio" class="rate" id="star2" name="rating" value="2" />
                <label for="star2" title="Tidak Buruk - 2 Bintang"></label>

                <input type="radio" class="rate" id="star1" name="rating" value="1" />
                <label for="star1" title="Buruk - 1 Bintang"></label>

                </div>
            <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Komentar</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="feedback" id="feedback"></textarea>
            </div>
            <button type="submit" class="btn btn-success" name="submit" id="submit" value="submit">Submit</button>
            </form>
        </div>
            </div>
    </div>
    </div>


    <?php endwhile; ?>   
                <!-- Button trigger modal -->
                

    </div>
            
            </div>
        </div>
    </div>
    
    <script type="text/javascript" src="./jquery-2.1.4.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () { 
        $('#submit').click(function(){
            var id = $("#id").val(); var rate = $(".rate").val(); var feedback = $("#feedback").val();
                $.ajax({
                    type: "POST", 
                    url: "function/proses_review.php",
                    data:  "id="+id + "&rating="+rate + "&feedback="+feedback,
                    dataType: "JSON",
                    beforeSend:function(){
                          
                    },
                    success: function(data){
                         
                    },
                    error: function(data)
                    {

                    }           
              });

        });
      }); 
    </script>
</body>
    
    <?php     
        
    include('layout/mitra-footer.php');
    ?>
</html>