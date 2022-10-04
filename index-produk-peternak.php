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
    #home {
      overflow-wrap:normal;
    }

    @media (max-width: 600px) {
      .tombol {
        margin:3px;

      }

    }
  </style>
</head>

<body id="home">

 
    <!-- Navbar -->
    <?php
    include('layout/admin-navbar.php');
    ?>
    <!-- Navbar -->
  


    <div class="container-lg mt-5">
      <div class="row">
        <div class="col-md-12 mt-5 mb-5">
          <div class="card shadow-sm bg-body rounded">
            <div class="container">
              <div class="card-title mt-4 ms-3 me-3">
                <div class="d-flex align-items-center">
                <h5 class="card-title font-hijau bold" style="flex: 1;">Tabel Daftar Ahli</h5>

                <div>
                <button class="btn btn-success btn-round ml-auto" data-toggle="modal">

                <i class="bi bi-plus"><a href="form-add-ahli.php" class="button is-success" style="color:white !important; text-decoration:none;"></i>

                    Tambah Ahli
                  </a>
                </button>
              </div>

                </div>
                
              </div>
              
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-hover table-responsive">
                    <thead class="bg-light.bg-gradient">
                      <tr class="bg-light">
                        <th scope="col">Foto Produk</th>
                        <th scope="col">Nama Produk</th>
                        <th scope="col">Harga Produk</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Penjualan</th>
                        <th scope="col" style="width:15%;">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $i = 0;
                      $ambil = pg_query($conn, "SELECT * FROM ahli");
                      while ($pecah = pg_fetch_array($ambil)) {
                      ?>
                        <tr>
                          <th scope="row"><?php echo $pecah['nama_ahli']; ?></td>
                          <td><?php echo $pecah['nip']; ?></td>
                          <td><?php echo $pecah['jabatan']; ?></td>
                          <td><?php echo $pecah['deskripsi_ahli']; ?></td>
                          <td>
                            <a href="form-show-ahli.php?id_ahli=<?php echo $pecah['id_ahli']; ?>"><span data-toggle="tooltip" title="lihat detail data"class="btn btn-success bi bi-search font-hijau tombol"></span></a>
                            <a href="form-edit-ahli.php?id_ahli=<?php echo $pecah['id_ahli']; ?>"><span data-toggle="tooltip" title="edit data" class="btn btn-success bi bi-pencil-square font-hijau tombol"></span></a>
                            <a href="function/delete-ahli.php?id_ahli=<?php echo $pecah['id_ahli']; ?>"><span data-toggle="tooltip" title="hapus data" class="btn btn-success bi bi-trash font-hijau tombol"></span></a>

                          </td>
                        </tr>
                      <?php
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


  </body>

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



</html>