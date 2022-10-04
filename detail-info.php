<?php
    include 'koneksi.php';
    $id_info=$_GET['id_info'];
    $query=pg_query("SELECT * FROM informasi WHERE id_info='$id_info'");
    $pecah=pg_fetch_assoc($query);
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
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <!-- owl caurasl min.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- owl caurasel Theme.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- icon boostrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">


    <title>Seternak</title>

    <style>
        .jumbotron {
            /* background:linear-gradient(rgba(255,255,255,0.5), rgba(255,255,255,0.5)), url('assets/informasi/<?php echo $pecah['foto']; ?>'); */
            background: linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ), url('assets/informasi/<?php echo $pecah['foto']; ?>');
            /* background: url('assets/informasi/<?php echo $pecah['foto']; ?>'); */
            background-attachment:fixed;
            background-repeat: no-repeat;
            background-size: cover;
            height: 100%;
            width: 100%;
            background-position: center center; 
            filter: grayscale(50%);
        }
        #content{
            position:relative;
            margin-top:-20px;
            text-align:justify;
        }
        @media (max-width: 768px) {
            #foto-info {
                width: 250px;
                height: 150px;
            }
        }

    </style>
  </head>
  <body id="home">

    <!-- Navbar -->
    <?php 
    include('layout/unlogin-navbar.php');
    ?>
    <!-- Navbar -->


    <!-- Jumbotron -->
    <section id="jumbo-info"  class="jumbotron" style="padding-top:150px;padding-bottom:100px" class="img-fluid">
        <div class="container">
        <div class="row">
            <div id="hero" class="col">
                <h1 class="display-2 text-light bold fw-bold text-center fs-1 text mb-3" class="responsive-font-example"><?php echo $pecah['judul_info']; ?></h1>
                <!-- <p class="lead text-light">Aplikasi yang mengintegrasikan kegiatan peternak dengan fitur mentoring, forum, marketplace, dan info</p>  -->
                <div class="d-flex">
                        <!-- <button type="button" class="btn btn-light mx-1 text-success shadow">Daftar</button>
                        <button type="button" class="btn btn-success mx-1 hijau shadow">Masuk</button> -->
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- Jumbotronend -->


    <!-- Content -->
    <section>
        <div id="content" class="container shadow p-4  mb-5 bg-body rounded ">
            <div class="row">
                <div class="col px-4">
                    <h5 class="fw-bolder font-hijau"><?php echo $pecah['judul_info']; ?></h5>
                    <h6 class="fw-bolder mb-5"><?php echo $pecah['author']; ?> - <?php $date = date_create($pecah['tgl_info']); echo date_format($date, 'd/m/Y'); ?></h6>
                    <p class="mb-4"><?php echo nl2br($pecah['deskripsi_info']); ?></p>
                    <div class="text-center">
                        <img id="foto-info"  class="rounded-3 p-4 mx-4" src="assets/informasi/<?php echo $pecah['foto']; ?>" width="600px" height="400px">
                    </div>
                </div>
            </div>
        </div>
    </section>
        
    <!-- Content end -->

      <!-- Footer -->
    <?php include('layout/footer.php'); ?>
    <!-- Footer end -->











































  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script> 
	<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" ></script> -->
	<!-- <script src="js/owl.carousel.min.js"></script>
	<script src="js/script.js"></script> -->
    <!-- jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- owl cousel min.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- init owl caueasel -->
    <script>
        $('.owl-carousel').owlCarousel({
            loop:true,
            margin:10,
            nav:true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                1000:{
                    items:5
                }
            }
        })
    </script>
    
  </body>
</html>