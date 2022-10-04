<?php 
include 'koneksi.php';
// $username =$_GET['username'];
session_start();
if($_SESSION['role']!="2"){
header("location:login.php?pesan=gagal");
}
$username = $_SESSION['username'];
?>
<?php
 include 'koneksi.php';
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"> -->
  <!-- owl caurasl min.css -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
    integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- owl caurasel Theme.css -->
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
    integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- icon boostrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="assets/asset/daterangepicker.css">

  <title>Seternak</title>

  <style>
    .card:hover {
      box-shadow: 8px 8px 5px;
      transform: scale(1.01);
    }
  </style>
</head>

<body id="home">

  <!-- Navbar -->
  <section>
    <?php 
    include('layout/peternak-navbar.php');
  ?>
  </section>
  <!-- Navbar -->





  <!-- Content -->
  <section>
    <div class="container " style="margin-top:100px;min-height:59vh;">
      <form action="cetak-laporan.php" method="post" target="_blank">

        <div class="row profil-wrapper">

          <div class="col-md-12 mt-5 mb-5 jarak">
            <div class="card shadow-sm rounded">
              <div class="card-header shadow-sm rounded-top hijau" style="background-color: #0E8550;">
                <div class="card-title ps-3 fw-bold text-light">Cetak Laporan</div>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="mb-3 pe-5 ps-5">
                    <label for="alamat" class="form-label">Mulai dari</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="bi-calendar-range"></i>
                            </span>
                        </div>
                        <input type="date" name="start" class="form-control float-right" required>
                    </div>
                  </div>
                  <div class="mb-3 pe-5 ps-5">
                    <label for="alamat" class="form-label">Hingga</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="bi-calendar-range"></i>
                            </span>
                        </div>
                        <input type="date" name="end" class="form-control float-right" required>
                    </div>
                  </div>
                  <div class="mb-3 pe-5 ps-5">
                    <button type="submit" class="btn btn-success mt-2 ">Cetak Laporan</button>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </form>
    </div>

  </section>

  <!-- Footer -->
  <?php include('layout/peternak-footer.php'); ?>
  <!-- Footer end -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
  </script>
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" ></script> -->
  <!-- <script src="js/owl.carousel.min.js"></script>
	<script src="js/script.js"></script> -->
  <!-- jquery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <!-- owl cousel min.js -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
    integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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
<script src="assets/asset/daterangepicker.js"></script>
</body>

</html>