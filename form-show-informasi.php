<?php 
include 'koneksi.php';
// $username =$_GET['username'];
session_start();
if($_SESSION['role']!="3"){
header("location:login.php?pesan=gagal");
}
$username = $_SESSION['username'];
?>
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
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
        include('layout/admin-navbar.php');
    ?>
  <!-- Navbar -->



   <div class="container-lg mt-5">

    <form action="function/edit-informasi.php" method="post" enctype="multipart/form-data">

    <div class="row">
        <div class="col-md-12 mt-5 mb-5">
          <div class="card shadow-sm bg-body rounded">
            <div class="card-header shadow-sm bg-body rounded" style="background-color: white;">
              <div class="card-title ps-3 fw-bold">Form  Detail Informasi</div>
            </div>
            <div class="card-body">
              <div class="row">
                    <div class="mb-3 pe-5 ps-5">
                    <label for="id_info" class="form-label">ID Informasi</label>
                    <input type="text" class="form-control" id="id_info" name="id_info"  value="<?php echo $pecah['id_info']; ?>" disabled>
                    </div>

                    <div class="mb-3 pe-5 ps-5">
                    <label for="judul_info" class="form-label">Judul Informasi</label>
                    <input type="text" class="form-control" id="judul_info" name="judul_info"  value="<?php echo $pecah['judul_info'] ?>" disabled>
                    </div>

                    <div class="mb-3 pe-5 ps-5">
                    <label for="abstrak" class="form-label">Abstrak Informasi</label>
                    <input type="url" class="form-control" id="abstrak" name="abstrak"  value="<?php echo $pecah['abstrak'] ?>" disabled>
                    </div>

                    <div class="mb-3 pe-5 ps-5">
                    <label for="deskripsi_info" class="form-label">Deskripsi Informasi</label>
                    <textarea class="form-control" id="deskripsi_info" name="deskripsi_info" rows="20" disabled><?php echo $pecah['deskripsi_info'] ?></textarea>
                    </div>

                    <div class="mb-3 pe-5 ps-5">
                    <label for="foto" class="form-label"> </label>
                    <img src="assets/informasi/<?php echo $pecah['foto']; ?>" alt="" style="width:100px;height: 100px;">
                    <input type="file" class="form-control" name="foto" id="foto" value="<?php echo $pecah['foto'] ?>" disabled>
                    <!-- <textarea class="form-control" id="foto" name="foto" rows="3" ><?php echo $pecah['foto'] ?></textarea> -->
                    </div>
              </div>

              
              <!-- <div class="field" style="display: flex; justify-content: flex-start; padding: 1rem; margin-left:1rem;">
                  <button type="submit" name="edit" class="btn btn-success ps-4 pe-4">Submit</button>
              </div> -->


            </div>
          </div>
        </div>
      </div>

  </div>

    <!-- Footer -->
    <?php include('layout/admin-footer.php'); ?>
    <!-- Footer end -->

  </body>
