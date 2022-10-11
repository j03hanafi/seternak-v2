<?php
    include 'koneksi.php';
    // $username =$_GET['username'];
    session_start();
    if($_SESSION['role']!="2"){
		header("location:login.php?pesan=gagal");
	}
    $username = $_SESSION['username'];
    // echo $username;
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
    .field {
      padding: 1rem;
      margin-left: 1.3rem;
    }

    .profile-badge {
      /* border: 1px solid #c1c1c1; */
      height: 350px;
      position: relative;

      max-width: 300px;
      width: 100%;
    }

    .profile-badge img {
      height: 150px;
      width: 100%;



    }

    .user-detail {

      position: relative;
      padding: 10px 0px 10px 0px;
      color: #8B8B89;
    }

    .user-detail h5,
    h4 {
      margin: 0px;
      margin: 0px 0px 5px 0px;
      color: #000;
    }

    .user-detail p {
      font-size: 14px;
    }

    .user-detail .btn {
      margin-bottom: 10px;

      border: 1px solid #DEDEDE;
      border-radius: 0px;
      color: black;
    }

    .user-detail .btn i {
      color: #D35B4D;
      padding-right: 18px;
    }

    .profile-pic {
      position: absolute;
      height: 120px;
      width: 120px;
      left: 50%;
      transform: translateX(-50%);
      top: 100px;
      z-index: 1001;
    }

    .profile-pic img {
      height: 100%;
      width: 100%;
      border-radius: 50%;
      /* box-shadow: 0px 0px 5px 0px #c1c1c1; */
      border: 5px solid white;
    }

    .hover-detail {
      background-color: #fff;
      border: 1px solid #7C7C7C;
      position: absolute;
      width: 200px;
      box-shadow: 0px 0px 6px 0px #7C7C7C;
      display: none;
      top: 145px;
      left: 50%;
      transform: translateX(-50%);
    }

    .hover-detail:hover,
    .user-detail .btn:hover~.hover-detail {
      display: block;
    }

    .checkbox label {
      text-align: left;
      width: 100%;
    }

    .Following label {
      padding-bottom: 5px;
      border-bottom: 1px solid #c2c2c2;
    }

    .checkbox label span {
      float: right;
    }

    .hover-detail {
      padding: 5px;
    }




    @media (max-width: 600px) {
      .profile-container {
        flex-direction: column;
        margin-bottom: unset;

      }

      .profile-badge {
        max-width: unset;
        padding: 1rem;

        height: 230px;
        margin-bottom: 0px !important;

      }

      .profile-badge img {
        height: 100px;
        width: 100%;

      }

      .profile-pic {
        position: absolute;
        height: 120px;
        width: 120px;
        left: 50%;
        transform: translateX(-50%);
        top: 50px;
        z-index: 1001;
      }

      .profile-2 {
        margin-top: 1rem !important;
      }

      .profile-wrapper {
        padding: 0 1rem;
      }

      .input-profile {
        flex-direction: column;
      }

      .input-wrapper {
        width: 100%;
        margin: 0 !important;
      }

      .form-container {
        margin: 0 !important;
        padding: 0 !important;
      }

      .field {
        margin-left: unset;
        padding-left: 5px;
        margin-top: 1rem;
      }
    }
  </style>

  <?php

  include('layout/admin-navbar.php');
  include('koneksi.php');

  if (isset($username)) {
    $username = $_GET['username'];
    $sql = pg_query("select * from peternak join public.user on peternak.id_peternak=public.user.username where username='" . $username . "'");
    $user_data = pg_fetch_array($sql);
    $hashPass = password_hash($user_data['password'], PASSWORD_DEFAULT);
    echo $hashPass;

  ?>
  <?php

  }

  ?>

  <script>
    WebFont.load({
      google: {
        "families": ["Lato:300,400,700,900"]
      },
      custom: {
        "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"],
        urls: [" <?php echo $data . '/assets/css/fonts.min.css'; ?>"]
      },
      active: function() {
        sessionStorage.fonts = true;
      }
    });
  </script>

</head>

<body>
  <!-- Navbar -->

  <!-- Navbar -->


  <!-- Awal Body -->

  <div class="container-lg mt-5">

    <form action="function/edit-profile-peternak.php" method="post" enctype="multipart/form-data">


      <div class="row profile-wrapper">

        <div class="d-flex profile-container">

          <div class="col-sm-6 col-md-12 col-lg-3 profile-badge mt-5 mb-5 me-3 shadow p-3 bg-body rounded" style="padding: 0px !important;">

            <img src="assets/bg-profil.jpg" style=" filter: brightness(50%);">

            <div class="profile-pic">
              <img src="upload/<?php echo $user_data['foto']; ?>">
            </div>
            <div style="margin-top: 5rem; padding-left:10px;padding-right:10px;">
              <input type="file" class="form-control" id="foto" name="foto" value="<?php echo $user_data['foto']; ?>">
            </div>

            <br>
          <br>
          <br>
          <br>
          <br>
          <div class="card shadow-sm bg-body rounded">
            <div class="card-header shadow-sm rounded" style="background-color: #0e8550;">
              <div class="card-title ps-3 text-light fw-bold">Business Support</div>
            </div>
            <div class="card-body">
            <a class="mx-4 nav-link text-dark" href="index-dashboard.php">Dashboard Bisnis</a>
            <hr>
            <a class="mx-4 nav-link text-dark" href="index-laporan.php">Laporan Penjualan</a>
            </div>

          </div>

          <br>
          <div class="card shadow-sm bg-body rounded">
            <div class="card-header shadow-sm rounded" style="background-color: #0e8550;">
              <div class="card-title ps-3 text-light fw-bold">Profil Rekening</div>
            </div>
            <div class="card-body">
              <div class="input-wrapper" style="flex: 1;">
                <label for="email" class="form-label">No Rekening</label>
                <input type="text" class="form-control" id="no_rek" name="no_rek" value="<?php echo $user_data['no_rek']; ?>" >
              </div>
              <div class="input-wrapper" style="flex: 1;">
                <label for="email" class="form-label">Nama Pemilik Rekening</label>
                <input type="text" class="form-control" id="pemilik_rek" name="pemilik_rek" value="<?php echo $user_data['pemilik_rek']; ?>" >
              </div>
              <div class="input-wrapper" style="flex: 1;">
                <label for="email" class="form-label">Nama Bank</label>
                <input type="text" class="form-control" id="bank_rek" name="bank_rek" value="<?php echo $user_data['bank_rek']; ?>" >
              </div>
            </div>

          </div>


          </div>



          <div class="col-md-9 mt-5 mb-5 profile-2">
            <div class="card shadow-sm bg-body rounded">
              <div class="card-header shadow-sm rounded" style="background-color: #0e8550;">
                <div class="card-title ps-3 text-light fw-bold">Profil</div>
              </div>
              <div class="card-body">


                <div class="row profile-wrapper">


                  <div class="card-title mt-4 ps-5 form-container">
                    <div class="d-flex flex-wrap align-items-center">

                      <div class="mb-3 col-lg-6 col-xs-12 me-4 input-wrapper" style="flex: 1;">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email" value="<?php echo $user_data['email']; ?>">
                      </div>


                      <div class="mb-3 col-lg-6 col-xs-12 me-2 input-wrapper ">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" value="<?php echo $user_data['username']; ?>">
                      </div>



                    </div>
                  </div>

                  <!-- <div class="card-title ps-5 form-container">
                    <div class="d-flex flex-wrap align-items-center"> -->

                      <div class="class=mb-3 col-lg-6 ps-5 col-xs-12 input-wrapper form-container">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $user_data['name']; ?>">
                      </div>

                      <input id="password" name="password" type="hidden" class="form-control p-2 flex-grow-1 bd-highlight" value="<?php echo $user_data['password']; ?>" >
                      <!-- <div class="mb-3 col-lg-6 col-xs-12 me-2 input-wrapper ">
                        <label for="password" class="form-label">Password</label>
                        <div class="d-flex bd-highlight">
                          <input id="password" name="password" type="password" class="form-control p-2 flex-grow-1 bd-highlight" placeholder="masukkan password" value="<?php echo $hashPass ?>">
                          <span id=showPassword data-toggle="tooltip" class="btn btn-success" title="Lihat Password"><i id="icon" class="bi bi-eye pt-2 text-light"></i></span>
                        </div>
                      </div> -->


<!-- 
                    </div>
                  </div> -->

                  <hr style="margin-top: 1rem;">

                  <div class="card-title mt-4  ps-5 form-container ">
                    <div class="d-flex flex-wrap align-items-center ">

                      <div class="mb-3 col-lg-6 col-xs-12 me-4 input-wrapper" style="flex: 1;">
                        <label for="contact" class="form-label">No Telepon</label>
                        <input type="text" class="form-control" id="contact" name="contact" value="<?php echo $user_data['contact']; ?>">
                      </div>


                      <div class="mb-3 col-lg-6 col-xs-12 me-2 input-wrapper ">
                        <label for="kota" class="form-label">Kota</label>
                        <input type="text" class="form-control" id="kota" name="kota" value="<?php echo $user_data['kota']; ?>">
                      </div>



                    </div>
                  </div>



                  <div class="mb-3 col-lg-12 ps-5 pe-3 col-md-12 input-wrapper form-container">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea class="form-control" id="alamat" name="alamat" rows="3"><?php echo $user_data['alamat']; ?></textarea>
                  </div>
             


                <hr style="margin-top: 1rem;">



                <div class="card-title mt-4  ps-5 form-container ">
                  <div class="d-flex flex-wrap align-items-center ">

                    <div class="mb-3 col-lg-6 col-xs-12 me-4 input-wrapper" style="flex: 1;">
                      <label for="id_peternak" class="form-label">ID Peternak</label>
                      <input type="text" class="form-control" id="id_peternak" name="id_peternak" value="<?php echo $user_data['id_peternak']; ?>">
                    </div>


                    <div class="mb-3 col-lg-6 col-xs-12 me-2 input-wrapper ">
                      <label for="nama_peternakan" class="form-label">Nama Peternakan</label>
                      <input type="text" class="form-control" id="nama_peternakan" name="nama_peternakan" value="<?php echo $user_data['nama_peternakan']; ?>">
                    </div>




                  </div>
                </div>

                <div class="mb-3 col-lg-12 ps-5 pe-3 col-md-12 input-wrapper form-container">
                  <label for="alamat_peternakan" class="form-label">Alamat Peternakan</label>
                  <textarea class="form-control" id="alamat_peternakan" name="alamat_peternakan" rows="3"><?php echo $user_data['alamat_peternakan']; ?></textarea>
                </div>



                <div class="mb-3 col-lg-12 ps-5 pe-3 col-md-12 input-wrapper form-container">
                  <label for="deskripsi_usaha" class="form-label">Deskripsi Usaha</label>
                  <textarea class="form-control" id="deskripsi_usaha" name="deskripsi_usaha" rows="3"><?php echo $user_data['deskripsi_usaha']; ?></textarea>
                </div>
                </div>

              <div class="field " style="display: flex; justify-content: flex-start; ">
                <button type="submit" name="edit" class="btn btn-success ps-4 pe-4">Save</button>
              </div>
              

             

              </div>


            </div>

          </div>
        </div>
      </div>
  </div>

  </div>



  </form>
  </div>







  <!-- Footer -->
  <?php include('layout/admin-footer.php'); ?>
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
    var showPassword = document.getElementById('showPassword')
    var password = document.getElementById('password')
    var icon = document.querySelector('#showPassword i')


    showPassword.addEventListener('click', function(e) {
      if (password.type === 'password') {
        password.setAttribute('type', 'text')
        icon.classList.remove('bi bi-eye-slash')
        icon.classList.add('bi bi-eye')
      } else {
        password.setAttribute('type', 'password')
        icon.classList.remove('bi bi-eye')

        icon.classList.add('bi bi-eye-slash')

      }

    })
  </script>
</body>

</html>