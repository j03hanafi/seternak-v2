<?php
    include 'koneksi.php';
    session_start();
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
</head>

<body id="home">

    <!-- Navbar -->
    <?php
    include('layout/unlogin-navbar.php');
    include 'koneksi.php';
    ?>
    <!-- Navbar -->

    <!-- Jumbotron -->
    <section id="jumbotron_home" class="jumbotron" style="padding-top:150px;padding-bottom:100px" class="img-fluid">
        <div class="container">
            <div class="row">
                <div id="hero" class="col-md-4" style="margin-left:190px">
                    <h1 class="display-2 text-light bold fw-bold" class="responsive-font-example">Seternak</h1>
                    <p class="lead text-light">Aplikasi lokapasar komoditas sarana dan hasil produksi peternakan</p>
                    <div class="d-flex">
                        <?php 
                            if($_SESSION){
                        ?>
                        <a href="index-produksaya.php" type="button" class="btn mx-1 text-success shadow hijau text-light">Produk Saya</a>
                        <?php }else{

                        ?>
                        <a href="regis.php" type="button" class="btn btn-light mx-1 text-success shadow">Daftar</a>
                        <a href="login.php" type="button" class="btn mx-1 text-success shadow hijau text-light">Masuk</a>
                        <?php } ?>
                        <!-- <button type="button" class="btn btn-light mx-1 text-success shadow">Daftar</button>
                        <button type="button" class="btn btn-success mx-1 hijau shadow">Masuk</button> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Jumbotronend -->

    <!-- Tujuan Seternak -->
    <!-- <section id="tujuan">
        <div class="container py-5">
            <div class="row px-4 justify-content-center">
                <div id="list" class="col-md-6 py-3">
                    <h2>Tujuan Seternak</h2>
                    <ul class="list-unstyled">
                        <li>Memberikan pemahaman baru kepada peternak dari pakar ahli</li>
                        <li>Memungkinkan semua peternak dapat terhubung secara realtime</li>
                        <li>Efektifitas proses sosialisasi peternak kepada khalayak terkait produktifitas kerja</li>
                        <li>Membantu peternak dalam memasarkan hasil ternak desa secara lebih luas</li>
                    </ul>
                </div>
                <div class="col-md-3 text-center">
                    <img src="assets/ayam.jpg" style="width:115px; height:163px;">

                </div>
            </div>
        </div>
    </section> -->
    <!-- Tujuanseternakend -->

    <br><br>
    <!-- bagaimanahijau -->
    <section id="bagaimana" class="hijau">
        <br><br><br>
        <div class="container">
            <div class="row mb-4">
                <div class="col text-center">
                    <h2 class="text-light mb-4">Bagaimana Seternak Membantu Bisnismu</h2>
                </div>
            </div>
            <div class="row text-center text-light">
                <div class="col-md-6 mb-2 px-2">
                    <img src="assets/marketplace.png" alt="">
                    <h5>Marketplace</h5>
                    <p>Menghubungkan peternak ayam dengan calon konsumen. <br>
                        Dilengkapi dengan fitur pendukung bisnis yang terintegrasi.</p>
                </div>
                <div class="col-md-6 mb-2 px-2">
                    <img src="assets/info.png" alt="">
                    <h5>Berita</h5>
                    <p>Menampilkan harga komoditas peternakan setiap <br> hari serta artikel mengenai kondisi pasar terkini.</p>
                </div>
            </div>
        </div>
        <br><br>
    </section>
    <br><br>
    <!--komoditas -->
    <section id="komoditas">
    <br><br>
    <div class="container">
            <div class="row mb-4">
                <div class="col text-center">
                    <h2 class="mb-4 text-center fw-bold">Update Harga</h2>
                    <?php date_default_timezone_set('Asia/Jakarta');; ?>
                    <p>Harga komoditas per-tanggal <?php echo date('d-m-Y', time()) ; ?></p>
                </div>
            </div>
            <div class="row text-center">
                <?php
                $info = pg_query($conn,"SELECT * FROM komoditas");
                while ($komo = pg_fetch_array($info)){
                ?>
                <div class="col-md-4 mb-3 px-3">
                    <?php if($komo['id_komoditas'] == 'zT0EbrzhG1qK'){ ?>
                    <img src="assets/icon-telur.jpeg" alt="" style="margin-bottom:35px;">
                    <?php }elseif($komo['id_komoditas'] == 'eWvpUlZ99vaU'){ ?>
                    <img src="assets/icon-ayam.jpeg" alt="" style="margin-bottom:35px;">
                    <?php }elseif($komo['id_komoditas'] == 'LOGXAcFR78aR'){ ?>
                    <img src="assets/icon-jagung.jpeg" alt="" style="margin-bottom:35px;">
                    <?php }else{  ?>
                    <img src="assets/commodity.png" alt="" style="margin-bottom:35px;">
                    <?php } ?>
                    <h6><b><?php echo $komo['nama_komoditas']; ?></b></h6>
                    <h3 style="color:green"><b>Rp <?php echo $komo['harga_komoditas']; ?></b></h3>
                    <p>/<?php echo $komo['satuan_komoditas']; ?></p>
                </div>
                <?php
                    }
                ?>
            </div>
        </div>
    <br><br>
</section>
    <!-- bagaimanahijauend -->

    <!-- slider -->
    <!-- <section class="putih">
    <div class="container"><br><br><br>
        <div class="row">
            <div class="col-md-12">
                <div id="carouselExampleIndicators " class="carousel slide shadow" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="courasel-inner">
                        <div class="row">
                            <div class="carousel-item active">
                                <div class="col-md-4">
                                    <div class="single-box">
                                        <div class="card" style="width: 18rem;">
                                            <img src="assets/ayam.jpg" class="card-img-top" alt="..." style="widht:713px;height:250px">
                                            <div class="card-body">
                                                <h5 class="card-title">Fakta Ayam</h5>
                                                <p class="card-text">Ilmuwan menyimpulkan bahwa ayam yang berumur satu hari memiliki keterampilan dan refleks yang sama dengan anak yang berusia tiga tahun.</p>
                                                <a href="#" class="btn btn-primary">Go somewhere</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>  
                            <div class="carousel-item active">
                                <div class="col-md-4">
                                    <div class="single-box">
                                        <div class="card" style="width: 18rem;">
                                            <img src="assets/ayam.jpg" class="card-img-top" alt="..." style="widht:713px;height:250px">
                                            <div class="card-body">
                                                <h5 class="card-title">Fakta Ayam</h5>
                                                <p class="card-text">Ilmuwan menyimpulkan bahwa ayam yang berumur satu hari memiliki keterampilan dan refleks yang sama dengan anak yang berusia tiga tahun.</p>
                                                <a href="#" class="btn btn-primary">Go somewhere</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item active">
                                <div class="col-md-4">
                                    <div class="single-box">
                                        <div class="card" style="width: 18rem;">
                                            <img src="assets/ayam.jpg" class="card-img-top" alt="..." style="widht:713px;height:250px">
                                            <div class="card-body">
                                                <h5 class="card-title">Fakta Ayam</h5>
                                                <p class="card-text">Ilmuwan menyimpulkan bahwa ayam yang berumur satu hari memiliki keterampilan dan refleks yang sama dengan anak yang berusia tiga tahun.</p>
                                                <a href="#" class="btn btn-primary">Go somewhere</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item active">
                                <div class="col-md-4">
                                    <div class="single-box">
                                        <div class="card" style="width: 18rem;">
                                            <img src="assets/ayam.jpg" class="card-img-top" alt="..." style="widht:713px;height:250px">
                                            <div class="card-body">
                                                <h5 class="card-title">Fakta Ayam</h5>
                                                <p class="card-text">Ilmuwan menyimpulkan bahwa ayam yang berumur satu hari memiliki keterampilan dan refleks yang sama dengan anak yang berusia tiga tahun.</p>
                                                <a href="#" class="btn btn-primary">Go somewhere</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            <div class="carousel-item active">
                                <div class="col-md-4">
                                    <div class="single-box">
                                        <div class="card" style="width: 18rem;">
                                            <img src="assets/ayam.jpg" class="card-img-top" alt="..." style="widht:713px;height:250px">
                                            <div class="card-body">
                                                <h5 class="card-title">Fakta Ayam</h5>
                                                <p class="card-text">Ilmuwan menyimpulkan bahwa ayam yang berumur satu hari memiliki keterampilan dan refleks yang sama dengan anak yang berusia tiga tahun.</p>
                                                <a href="#" class="btn btn-primary">Go somewhere</a>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                            </div>
                        </div>
                    </div>
                    
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only text-dark">Previous</span>
                    </a>
                    <a class="carousel-control-next text-dark" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <br><br><br><br>
</section> -->
    <!-- sliderend -->


    <!-- <section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Fakta</h1>
            </div>
        </div>
        <div class="row">


        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="col-md-4">
                    <div class="single-box">
                        <div class="card" style="width: 18rem;">
                            <img src="assets/ayam.jpg" class="card-img-top" alt="..." style="widht:713px;height:250px">
                                <div class="card-body">
                                    <h5 class="card-title">Fakta Ayam</h5>
                                    <p class="card-text">Ilmuwan menyimpulkan bahwa ayam yang berumur satu hari memiliki keterampilan dan refleks yang sama dengan anak yang berusia tiga tahun.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="col-md-4">
                    <div class="single-box">
                        <div class="card" style="width: 18rem;">
                            <img src="assets/bghero.png" class="card-img-top" alt="..." style="widht:713px;height:250px">
                                <div class="card-body">
                                    <h5 class="card-title">Fakta Ayam</h5>
                                    <p class="card-text">Ilmuwan menyimpulkan bahwa ayam yang berumur satu hari memiliki keterampilan dan refleks yang sama dengan anak yang berusia tiga tahun.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="col-md-4">
                    <div class="single-box">
                        <div class="card" style="width: 18rem;">
                            <img src="assets/logop.jpg" class="card-img-top" alt="..." style="widht:713px;height:250px">
                                <div class="card-body">
                                    <h5 class="card-title">Fakta Ayam</h5>
                                    <p class="card-text">Ilmuwan menyimpulkan bahwa ayam yang berumur satu hari memiliki keterampilan dan refleks yang sama dengan anak yang berusia tiga tahun.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
        </div>


        </div>
    </div>
</section> -->

    <!-- Courasel -->
    <!-- <section id="slider" class="pt-5">
  <div class="container">
    <h1 class="text-center"><b>Responsive Owl Carousel</b></h1>
	  <div class="slider">
				<div class="owl-carousel">
					<div class="slider-card">
						<div class="d-flex justify-content-center align-items-center mb-4">
							<img src="images/slide-1.jpg" alt="" >
						</div>
						<h5 class="mb-0 text-center"><b>HTML CSS3 Tutorials</b></h5>
						<p class="text-center p-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam temporibus quidem magni qui doloribus quasi natus inventore nisi velit minima.</p>
					</div>
					<div class="slider-card">
						<div class="d-flex justify-content-center align-items-center mb-4">
							<img src="images/slide-2.jpg" alt="">
						</div>
						<h5 class="mb-0 text-center"><b>Wordpress Tutorials</b></h5>
						<p class="text-center p-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam temporibus quidem magni qui doloribus quasi natus inventore nisi velit minima.</p>
					</div>
					<div class="slider-card">
						<div class="d-flex justify-content-center align-items-center mb-4">
							<img src="images/slide-3.jpg" alt="">
						</div>
						<h5 class="mb-0 text-center"><b>PHP MySQL Tutorials</b></h5>
						<p class="text-center p-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam temporibus quidem magni qui doloribus quasi natus inventore nisi velit minima.</p>
					</div>
					<div class="slider-card">
						<div class="d-flex justify-content-center align-items-center mb-4">
							<img src="images/slide-4.jpg" alt="">
						</div>
						<h5 class="mb-0 text-center"><b>Javascript Tutorials</b></h5>
						<p class="text-center p-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam temporibus quidem magni qui doloribus quasi natus inventore nisi velit minima.</p>
					</div>
					<div class="slider-card">
						<div class="d-flex justify-content-center align-items-center mb-4">
							<img src="images/slide-5.jpg" alt="">
						</div>
						<h5 class="mb-0 text-center"><b>Bootstrap Tutorials</b></h5>
						<p class="text-center p-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam temporibus quidem magni qui doloribus quasi natus inventore nisi velit minima.</p>
					</div>
				</div>
			</div>
  </div>
</section> -->
    <!-- Couraselend -->


<!-- Tahukahkamu -->
<section id="tahukahkamu">
    <br><br>
    <div class="container text-start">
        <h1 class="mb-4 text-center fw-bold">Tahukah Kamu</h1>
        <div class="row">
            <div class="owl-carousel owl-theme">
                <?php
                    $ambil = pg_query($conn,"SELECT * FROM informasi");
                    while ($pecah = pg_fetch_array($ambil)){
                ?>
                <div id="item" class="item ">
                    <div class="card shadow-sm" style="width: 15rem;">
                        <img src="assets/informasi/<?php echo $pecah['foto']; ?>" class="card-img-top" alt="..."  width="300px"  height="150px">
                        <div class="card-body">
                            <h5 class="card-title text-start font-hijau"><?php echo $pecah['judul_info']; ?></h5>
                            <p class="card-text"><?php echo $pecah['abstrak']; ?></p>
                            <a href="detail-info.php?id_info=<?php echo $pecah['id_info'];?>" class="stretched-link"></a>
                        </div>
                    </div>
                </div>
                <?php
                    }
                ?>
                <!-- <div id="item" class="item ">
                    <div class="card shadow-sm" style="width: 15rem;">
                        <img src="assets/fakta2.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title text-start font-hijau">Kehidupan Ayam Kampung</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

                        </div>
                    </div>
                    <div id="item" class="item ">
                        <div class="card shadow-sm" style="width: 15rem;">
                            <img src="assets/fakta3.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title text-start font-hijau">Produksi Telur Ayam</h5>
                                <p class="card-text fs-7 text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>
                    <div id="item" class="item ">
                        <div class="card shadow-sm" style="width: 15rem;">
                            <img src="assets/fakta3.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title text-start font-hijau">5 Fakta Ayam</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
        <br><br>
</section>
<!-- Tahukahkamuend -->




    <!-- FAQ -->
    <section class="faq p-4">
        <h1 class=" mb-5  text-center fw-bold" class="responsive-font-example">Frequently Asked Questions</h1>
        <div class="container accordion accordion-flush justify-content-center " id="accordionFlushExample" style="max-width: 50rem;">

            <?php
            $i = 0;
            $result = pg_query($conn, "SELECT * FROM faq_seternak");
            while ($user_data = pg_fetch_array($result)) {
            ?>

                <div class="accordion-item mb-3 shadow mb-3 bg-white rounded">
                    <h2 class="accordion-header" id="flush-headingOne<?php echo $user_data['id_faq']; ?>">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne<?php echo $user_data['id_faq']; ?>" aria-expanded="false" aria-controls="flush-collapseOne<?php echo $user_data['id_faq']; ?>">
                        <?php echo $user_data['pertanyaan']; ?>
                        </button>
                    </h2>
                    <div id="flush-collapseOne<?php echo $user_data['id_faq']; ?>" class="accordion-collapse collapse" aria-labelledby="flush-headingOne<?php echo $user_data['id_faq']; ?>" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body"><?php echo $user_data['jawaban']; ?></div>
                    </div>
                </div>


            <?php
            }
            ?>




        </div>
    </section>
    <!-- FAQend -->


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

    <!-- init owl caueasel -->
    <script>
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 5
                }
            }
        })
    </script>

</body>

</html>