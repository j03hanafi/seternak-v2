<?php 
include 'koneksi.php';
// $username =$_GET['username'];
session_start();
if($_SESSION['role']!="2"){
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






  <title>Seternak</title>
  <style>
    .luas-modal {
      max-width: 700px;
      margin: 4rem auto;
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


    }
  </style>

  <?php

  include('layout/peternak-navbar.php');
  include('koneksi.php');



  ?>



</head>

<body>
  <!-- Navbar -->

  <!-- Navbar -->


  <!-- Awal Body -->

  <div class="container-lg mt-5 tampung" style="min-height:56.4vh;">


    <form action="" method="post">
      <div class="input-group pt-5 cari">

        <input type="text" class="form-control" placeholder="temukan ahli" name="cari">
        <button class="input-group-text btn btn-success bi bi-search" value="Cari"></button>


      </div>
      <!-- <form action="" method="post" enctype="multipart/form-data"> -->
    </form>

    <div class="row" style="min-height:inherit; margin:1rem;">

      <?php

      error_reporting(0);


      if (isset($_POST['cari'])) {

        $cari = strtolower($_POST['cari']);
        $result = pg_query("SELECT * from ahli where LOWER(nama_ahli) like '%$cari%'");
        $cek = pg_num_rows($result);
      } else {


        $result = pg_query("SELECT * from ahli");
      }

      // if(!$result){
      //   echo "<script>alert('Data Tidak Ada'); </script>";
      // }
      // else{
      //   $result = pg_query("SELECT * from ahli");
      // }







      $i = 0;


      while ($user_data = pg_fetch_array($result)) {
      ?>




        <div class="col-md-3 col-sm-6 mt-3 mb-3 kolom" data-bs-toggle="modal" data-bs-target="#addRowModal<?php echo $user_data['id_ahli']; ?>">
          <div class="our-team shadow bg-body" style="height:100%">
            <div class="pic">
              <img src="upload/<?php echo $user_data['foto']; ?>" alt="">
            </div>
            <div class="team-content">
              <h5 class="font-hijau fw-bold"><?php echo $user_data['nama_ahli']; ?></h5>
              <span class="post">NIP <?php echo $user_data['nip']; ?></span>
              <span class="fw-bold jabatan"><?php echo $user_data['jabatan']; ?></span>
              <p class="desk"><?php echo $user_data['deskripsi_ahli']; ?></p>
            </div>
          </div>
        </div>


        <!-- untuk melihat bentuk-bentuk modal kalian bisa mengunjungi laman bootstrap dan cari modal di kotak pencariannya -->
        <!-- id setiap modal juga harus berbeda, cara membedakannya dengan menggunakan id_barang -->
        <div class="modal fade" id="addRowModal<?php echo $user_data['id_ahli']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog luas-modal">
            <div class="modal-content rounded-3">
              <div class="modal-header">

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>


              </div>
              <!-- di dalam modal-body terdapat 4 form input yang berisi data.
                    data-data tersebut ditampilkan sama seperti menampilkan data pada tabel. -->
              <div class="modal-body">
                <form>
                  <div class="form-group">
                    <label for="exampleFormControlInput1" class="modal-label fw-bold">Profil Singkat</label>
                    <p class="isi-modal"><?php echo $user_data['profil_singkat']; ?></p>
                  </div>

                  <div class="form-group">
                    <span class="jam-modal">Available &nbsp : <?php echo $user_data['jam_available']; ?></span>
                  </div>

                  <div class="form-group">
                    <span class="jam-modal">Contact &nbsp &nbsp : <?php echo $user_data['contact']; ?></span>
                  </div>

                  <div class="form-group">
                    <video id="video" width="600" height="300" controls>
                      <source src="video_upload/<?php echo $user_data['video']; ?>">
                    </video>
                  </div>

                  <!-- FAQ -->

                  <section class="faq">
                    <h5 class="fw-bold mb-3 mt-3 text-center" class="responsive-font-example">Frequently Asked Questions</h5>
                    <div class="container accordion accordion-flush justify-content-center " id="accordionFlushExample" style="max-width: 50rem;">



                      <?php
                      $i = 0;
                      $id = $user_data['id_ahli'];
                  
                      $coba = pg_query($conn, "SELECT * FROM  faq_ahli where id_ahli='$id'");
                      while ($gas = pg_fetch_array($coba)) {
                      ?>

                        <div class="accordion-item mb-3 shadow mb-3 bg-white rounded">
                          <h2 class="accordion-header" id="flush-headingOne<?php echo $gas['id_faq_ahli']; ?>">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne<?php echo $gas['id_faq_ahli']; ?>" aria-expanded="false" aria-controls="flush-collapseOne<?php echo $gas['id_faq_ahli']; ?>">
                              <?php echo $gas['pertanyaan']; ?>
                            </button>
                          </h2>
                          <div id="flush-collapseOne<?php echo $gas['id_faq_ahli']; ?>" class="accordion-collapse collapse" aria-labelledby="flush-headingOne<?php echo $gas['id_faq_ahli']; ?>" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body"><?php echo $gas['jawaban']; ?></div>
                          </div>
                        </div>


                      <?php
                      }
                      ?>


                    </div>
                  </section>



                </form>
              </div>
              <div class="modal-footer">
                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
              </div>
            </div>
          </div>
        </div>



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




    </div>


  </div>


  <!-- </form> -->
  </div>



  <!-- Footer -->
  <?php include('layout/peternak-footer.php'); ?>
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


</body>

</html>