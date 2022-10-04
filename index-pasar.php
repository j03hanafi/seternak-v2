<?php
include 'koneksi.php';
// $username =$_GET['username'];
session_start();
if ($_SESSION['role'] != "1") {
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- owl caurasl min.css -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- owl caurasel Theme.css -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- icon boostrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">

  <!-- fontawesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">







  <title>Seternak</title>
  <style>
    .luas-modal {
      max-width: 700px;
      margin: 4rem auto;
    }

    .checked {
      color: orange;
    }

    .tampung {
      padding-left: 0 !important;
      padding-right: 0 !important;
    }

    #video {
      padding-top: 1rem;
      display: block;
      margin-left: auto;
      margin-right: auto;
    }

    .modal-label {
      color: #0e8550;

    }

    .teks-card {
      margin-bottom: unset;
    }



    .jam-modal {
      color: #0e8550;

    }

    .isi-modal {
      text-align: justify;
    }

    .cari {
      width: 80%;
      text-align: center;

      margin: 0 auto;

    }

    .jabatan {
      text-align: center;
      padding-left: 10px;
      padding-right: 10px;
    }



    .kolom {

      padding: 1rem;

    }

    .desk {
      padding: 5px;
      text-align: justify;
    }

    a {
      text-decoration: none;
      color: unset;

    }

    a:hover {
      text-decoration: none;
      color: unset;

    }

    .bg-body img {
      width: 100%;
      height: 160px;
    }

    .our-team {
      padding: 20px;
      text-align: center;
      overflow: hidden;
      position: relative;
      border-radius: 20px !important;
    }

    .our-team .pic {
      display: inline-block;


      margin-bottom: 10px;
      /* background:#0e8550; */
      position: relative;
      z-index: 1;


    }

    /* .our-team .pic:before {
      content: "";
      width: 100%;
      background: #0e8550;
      position: absolute;
      bottom: 135%;
      right: 0;
      left: 0;
      transform: scale(3);
      transition: all 0.3s linear 0s;
    } */

    /* .our-team:hover .pic:before
		{
			height: 100%;
		} */

    /* .our-team .pic:after {
      content: "";
      width: 100%;
      height: 100%;
      border-radius: 50%; */
    /* background: #ff00ac; */
    /* position: absolute;
      top: 0;
      left: 0;
      z-index: -1;
    } */

    .our-team .pic img {
      width: 130px;
      height: 130px;

      border-radius: 50%;
      transform: scale(1);
      border: 2px solid #0e8550;
      /* transition: all 0.9s ease 0s; */
    }

    /* .our-team:hover .pic img
		{
			box-shadow: 0 0 0 14px #ff00ac;
			transform: scale(0.7);
		} */

    /* .our-team .team-content
		{
			margin-bottom: 30px;
		} */

    .our-team .title {
      font-size: 22px;
      font-weight: 700;
      color: #4e5052;
      letter-spacing: 1px;
      text-transform: capitalize;
      margin-bottom: 5px;
    }



    .our-team .post {
      display: block;
      font-size: 15px;
      color: #4e5052;
      text-transform: capitalize;
    }

    .our-team .social {
      width: 100%;
      padding: 0;
      margin: 0;
      background: #0e8550;
      position: absolute;
      bottom: -100px;
      left: 0;
      transition: all 0.5 ease 0s;
    }

    /* .our-team:hover .social{
			bottom:0;
		} */

    .our-team .social li {
      display: inline-block;
    }

    .our-team .social li a {
      display: block;
      padding: 10px;
      font-size: 17px;
      color: #fff;
      transition: all 0.3s ease 0s;
    }

    @media (max-width: 600px) {
      .kolom {
        flex: 0 0 50%;
        padding: 0.5rem;
        margin-top: unset !important;
        border-radius: 20px !important;

      }

.bg-body{
  height:100%;
}
      video {
        width: 250px;
        height: 150px;
      }

      .our-team .pic img {
        width: 80px;
        height: 80px;

        border-radius: 50%;
        transform: scale(1);
        border: 2px solid #0e8550;
        /* transition: all 0.9s ease 0s; */
      }

      .our-team {
        padding: 15px 5px 10px 5px;
        text-align: center;

      }

      .our-team .post {
        font-size: 12px;
      }

      .our-team .desk {

        text-align: justify;
        font-size: 12px;


      }



      .ukuran-f {
        font-size: 10px;
      }

      .kanan {
        float: inline-end;

      }


      .bg-body img {
        width: 100%;
        height: 100px;
      }





    }
  </style>

  <?php

  include('layout/mitra-navbar.php');
  include('koneksi.php');

  // $id_produk = $_GET['id_produk'];


  // $query1 = pg_query($conn, "SELECT SUM(kuantitas) AS jumlah FROM detail_pemesanan where id_produk='$id_produk'");
  // $data = pg_fetch_array($query1);

  $query = pg_query("SELECT * FROM mitra LEFT JOIN public.user on mitra.id_pemilik=public.user.username where id_pemilik='$username'");
  $pecah = pg_fetch_assoc($query);



  ?>



</head>

<body>
  <!-- Navbar -->

  <!-- Navbar -->


  <!-- Awal Body -->

  <div class="container-lg mt-5 tampung" style="min-height:56.4vh;">

  <?php if (isset($pecah['nama_usaha'], $pecah['alamat_usaha'])) {

?>
    <form action="" method="post">
      <div class="input-group pt-5 pb-3 cari">

        <input type="text" class="form-control" placeholder="temukan produk" name="cari">
        <button class="input-group-text btn btn-success bi bi-search" value="Cari"></button>


      </div>
      <!-- <form action="" method="post" enctype="multipart/form-data"> -->
    </form>

    <div class="row" style="min-height:inherit; margin:1rem;">

    

        <?php

        error_reporting(0);



        if (isset($_POST['cari'])) {

          $cari = strtolower($_POST['cari']);


          $result = pg_query(" SELECT produk.nama_produk,
        harga,
        satuan,
        deskripsi_produk, 
        stok,
        waktu_produksi,
        peternak.nama_peternakan,
        produk.id_produk, 
        produk.foto as foto, 
        public.user.foto as profile_pic,
        public.user.kota from produk left join peternak on produk.id_peternak=peternak.id_peternak
        left join public.user on peternak.id_peternak=public.user.username where produk.stok>0 and LOWER(nama_produk) like '%$cari%' OR
        LOWER(nama_peternakan) like '%$cari%' ");

          $cek = pg_num_rows($result);
        } 
        else {


          $result = pg_query($conn, "SELECT produk.nama_produk,
        harga,
        satuan,
        deskripsi_produk, 
        stok,
        waktu_produksi,
        peternak.nama_peternakan,
        produk.id_produk, 
        produk.foto as foto, 
        public.user.foto as profile_pic,
        public.user.kota from produk left join peternak on produk.id_peternak=peternak.id_peternak
        left join public.user on peternak.id_peternak=public.user.username where produk.stok>0");



          // if(!$result){
          //   echo "<script>alert('Data Tidak Ada'); </script>";
          // }
          // else{
          //   $result = pg_query("SELECT * from ahli");
          // }



        }



        $i = 0;


        while ($user_data = pg_fetch_array($result)) {
        ?>

          <div class="col-md-3 col-sm-6 kolom" data-bs-toggle="modal">


            <a href="form-show-marketplace.php?id_produk=<?php echo $user_data['id_produk']; ?>" target="_blank">
              <div class="card shadow bg-body" >

                <img src="assets/produk/<?php echo $user_data['foto']; ?>" class="card-img-top" alt="...">
                <div class="card-body">
                  <h6 class="card-title font-hijau fw-bold hapuslink"><?php echo $user_data['nama_produk']; ?></h6>
                  <p class="hapuslink">Rp <?php echo number_format($user_data['harga'], '0', ',', '.'); ?>/<?php echo $user_data['satuan']; ?> </p>

                  <div class="d-flex flex-wrap ">

                    <div class="card-text align-self-end ukuran-f" style="flex: 1; position:relative;">
                      <!-- <input  name="rating" class="rating" data-min="0" data-max="5" value="2"> -->

                      <?php

                      $id_produk = $user_data['id_produk'];
                      $rate = pg_query("SELECT AVG(rating) as rate from pemesanan 
                    join detail_pemesanan on pemesanan.no_pemesanan=detail_pemesanan.no_pemesanan where id_produk='$id_produk'");
                      $pecah2 = pg_fetch_array($rate);


                      if (isset($pecah2['rate'])) {
                        for ($i = 0; $i < $pecah2['rate']; $i++) { ?>
                          <span class="fa fa-star checked hapuslink ukuran-f" class="m-1"></span>
                        <?php
                        }
                      } else {
                        ?>
                        <span class="text-black-50 hapuslink ukuran-f">Not Rated</span>
                      <?php } ?>
                    </div>


                    <div class="card-text">
                      <p class="teks-card"><small class="fw-bold hapuslink kanan"><?php echo $user_data['nama_peternakan']; ?></small></p>
                      <p class="teks-card"><small class="font-hijau hapuslink kanan"><?php echo $user_data['waktu_produksi']; ?></small></p>
                      <p class="teks-card"><small class="font-hijau hapuslink kanan"><?php echo $user_data['stok']; ?> stock</small></p>

                    </div>




                  </div>




                </div>
              </div>
            </a>


          </div>


          <!-- untuk melihat bentuk-bentuk modal kalian bisa mengunjungi laman bootstrap dan cari modal di kotak pencariannya -->
          <!-- id setiap modal juga harus berbeda, cara membedakannya dengan menggunakan id_barang -->





        <?php
        }
        ?>



        <?php if ($cek == "0") { ?>

          <div style=" display: flex; justify-content:center; align-items:center;">
            <div class="shadow rounded bg-body our-team p-5">

              <div class="team-content">
                <h5 class="font-hijau fw-bold">Data tidak Ditemukan</h5>

              </div>
            </div>
          </div>


        <?php } ?>




        <!-- Button trigger modal -->

      <?php
      } else {
      ?>



        <section>
          <div class="container">
            <div class="row my-5">
              <div class="col text-center mt-5">
                <img src="assets/notfound.svg" class="my-5" alt="" width="350px" height="150px">
                <h5 class="text-muted">Isi data Mitra terlebih dahulu...</h5>
                <a href="index-profile-mitra.php" class="btn btn-success mt-2 mb-5">Go to profile</a>
              </div>
            </div>
          </div>
        </section>

      <?php } ?>




    </div>


  </div>


  <!-- </form> -->
  </div>



  <!-- Footer -->
  <?php include('layout/mitra-footer.php'); ?>
  <!-- Footer end -->



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script> -->
  <!-- <script src="js/owl.carousel.min.js"></script>
	<script src="js/script.js"></script> -->
  <!-- jquery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <!-- owl cousel min.js -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <script>
    $("#ratinginput").rating();
  </script>

</body>

</html>