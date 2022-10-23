<?php
    include 'koneksi.php';

    // $username =$_GET['username'];
    session_start();
    if($_SESSION['role']!="3"){
        header("location:login.php?pesan=gagal");
    }

    $username = $_SESSION['username'];
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
      <!-- icon boostrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
    
    <title>Transaksi</title>
  </head>
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
    include('layout/admin-navbar.php');
    ?>
    
    <div class="container"style="padding-top:100px;padding-bottom:5%;"> 
        <div class="card text-center">
            <div class="card-body">
                <!-- <h5 class="card-title">Ini User</h5> -->
                <div class="table-responsive">
                    <h5 style="text-align:left;">Tabel Informasi - Transaksi 
                        <a class="btn btn-success" style="float:right;margin-bottom:2%;" href="form-add-komoditas.php" ><i class="fa fa-plus"></i> Tambah</a>
                    </h5>
                </div>
                <div class="table-responsive">
                <table class="table table-hover" >
                    <thead>
                        <tr>
                            <th class="table-light">No. pesanan</th>
                            <th class="table-light">Produk</th>
                            <th class="table-light">Peternak</th>
                            <th class="table-light">Mitra</th>
                            <th class="table-light">Status</th>
                            <th class="table-light">Kuantitas</th>
                            <th class="table-light">Harga</th>
                            <th class="table-light">Bukti Transfer</th>
                        </tr>
                    </thead>       
                    <tbody>
                        <?php
                            $i=0;
                            $ambil = pg_query($conn,"SELECT produk.foto as foto_produk, * from pemesanan
                                  left join detail_pemesanan on pemesanan.no_pemesanan=detail_pemesanan.no_pemesanan
                                  left join produk on detail_pemesanan.id_produk=produk.id_produk
                                  left join peternak on produk.id_peternak=peternak.id_peternak
                                  left join mitra on pemesanan.id_pemilik=mitra.id_pemilik
                                  left join public.user on mitra.id_pemilik=public.user.username");
                            while ($data = pg_fetch_array($ambil)){
                        ?>
                            <tr>
                                <td><?php echo $data['id_produk']; ?></td>
                                <td><?php echo $data['nama_produk']; ?></td>
                                <td><?php echo $data['nama_peternakan']; ?></td>
                                <td><?php echo $data['id_pemilik']; ?></td>
                                <td>
                                  <?php 
                                    if($data['status'] == 1){
                                      echo "Belum Dibayar";
                                    }else if($data['status'] == 2){
                                      echo "Perlu Dikemas";
                                    }else if($data['status'] == 3){
                                      echo "Perlu Dikirim";
                                    }else if($data['status'] == 4){
                                      echo "Selesai";
                                    }
                                  ?>
                                </td>
                                <td><?php echo $data['kuantitas']; ?> <?php echo $data['satuan']; ?></td>
                                <td>Rp.<?php echo $data['kuantitas']*$data['harga']; ?></td>
                                <td>
                                  <button data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $data['no_pemesanan']; ?>_<?php echo $data['id_produk']; ?>_<?php echo $data['tgl_pesan']; ?>" class="btn btn-info bi bi-search tombol">
                                </td>
                            </tr> 
                            <div class="modal fade" id="exampleModal<?php echo $data['no_pemesanan']; ?>_<?php echo $data['id_produk']; ?>_<?php echo $data['tgl_pesan']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog modal-dialog-centered">
                                  
                                      <div class="modal-content">
                                      <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Bukti Transfer <?=$data['bukti_pembayaran']?></h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>

                                      <div class="modal-body">
                                          
                                          <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                                          <div class="carousel-inner">
                                              <div class="carousel-item active">
                                                  <?php if(isset($data['bukti_pembayaran'])){ ?>
                                                      
                                              <img src="upload/<?=$data['bukti_pembayaran']?>" class="d-block w-100" alt="...">
                                              <?php 
                                                  }else{
                                              ?>
                                              <span class="badge bg-secondary ">Bukti Transfer Belum Dikirim</span>
                                              <?php
                                                  } 
                                              ?>
                                              </div>
                                          </div>
                                          </div>
                                      
                                          
                                      </div>
                                      
                                      <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                      </div>
                                      </div>
                                      
                                  </div>
                                  </div>
                            <?php
                                }
                            ?>
                    </tbody>
                
                </table>
                </div>
            </div>
        </div>
    </div> 


    <?php
    include('layout/admin-footer.php');
    ?>
</html>