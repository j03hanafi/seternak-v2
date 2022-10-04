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
        .jumbotron_about{
            background-image: url(assets/heroaboutus.png) !important;}
    </style>
  </head>
<body>
    <!-- Navbar -->
        <?php 
            include('layout/unlogin-navbar.php');
        ?>
    <!-- Navbar -->


    <!-- Jumbotron -->
        <section class="jumbotron_about" class="jumbotron" style="padding-top:150px;padding-bottom:100px" class="img-fluid">
            <div class="container fluid">
            <div class="row">
                <div id="hero" class="col-md-8 px-4" style="margin-left:190px" >
                    <h1 class="display-4 text-light bold fw-bold" class="responsive-font-example">Apa itu Seternak</h1>
                    <p class="lead text-light">Seternak adalah sebuah aplikasi yang mengintegrasikan kegiatan peternak dengan fitur mentoring, forum, marketplace, dan info. </p> 
                    <!-- <div class="d-flex">
                            <button type="button" class="btn btn-light mx-1 text-success shadow">Daftar</button>
                            <button type="button" class="btn btn-success mx-1 hijau shadow">Masuk</button>
                    </div> -->
                </div>
            </div>
            </div>
        </section>
    <!-- Jumbotronend -->


    <!-- Siapa Ambyar -->
    <section class="my-4">
        <div class="container pb-4">
            <div class="row text-center pt-4">
                <div class="col font-hijau">
                    <h1>
                    Siapa itu Ambyar
                    </h1>
                </div>
            </div>
            <div class="row justify-content-center">
                    <div class="col-md-6 text-center py-4">
                        <p>Ambyar adalah akronim dari Anak Muda Berbudaya dan Berkarya, sekumpulan muda mudi yang menyamakan visi untuk memanfaatkan perhelatan kebudayaan lokal sebagai bentuk pengabdian terhadap pemajuan kebudayaan lewat perlombaan Kemah Budaya Kaum Muda. </p>
                    </div>
            </div>
            <div class="row d-flex justify-content-center text-center">
                <div class="col-lg-2 col-md-6">
                    <img id="mmbr" src="assets/galih.png" alt="" style="height:200px;">
                    <h5 class="font-hijau pt-3">Galih</h5>
                    <p>Project Manager</p>
                </div>
                <div class="col-lg-2 col-md-6">
                    <img id="mmbr" src="assets/rahmat.png" alt="">
                    <h5 class="font-hijau pt-3">Rahmat</h5>
                    <p>Software Developer</p>
                </div>
                <div class="col-lg-2 col-md-6">
                    <img id="mmbr" src="assets/dinda.png" alt="">
                    <h5 class="font-hijau pt-3">Dinda</h5>
                    <p>Administration & Finances Manager</p>
                </div>
                <div class="col-lg-2 col-md-6">
                    <img id="mmbr" src="assets/fathur.png" alt="">
                    <h5 class="font-hijau pt-3">Fathur</h5>
                    <p>Research & Business Development Managerr</p>
                </div>
                <div class="col-lg-2 col-md-6">
                    <img id="mmbr" src="assets/athaya.png" alt=""> 
                    <h5 class="font-hijau pt-3">Athaya</h5>
                    <p>Visual Designer</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Siapa Ambyar end -->

    <!-- Quote -->
        <section class="hijau py-4 px-4">
            <div class="container-fluid py-4 ">
                <div class="row text-light justify-content-center">
                    <div class="col-md-5 text-center">
                        <p>"Kami percaya bahwa gabungan nilai-nilai otentik yang terus dipertahankan dan pengalaman peternak desa dalam aktivitas peternakan adalah potensi yang luar biasa jika dipadukan dengan teknologi digital"</p>
                    </div>
                </div>
            </div>
        </section>
    <!-- Quote end -->


      


    <!-- Ayo Bergabung Dengan Kami -->
    <?php include('layout/ayobergabung.php'); ?>
    <!-- Ayo bergabung end -->

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
</body>