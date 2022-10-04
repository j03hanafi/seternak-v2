<?php
include 'koneksi.php';
// $username =$_GET['username'];
session_start();
if($_SESSION['role']!="2"){
header("location:login.php?pesan=gagal");
}
$username = $_SESSION['username'];


function generateRandomString($length = 10) {
  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $charactersLength = strlen($characters);
  $randomString = '';
  for ($i = 0; $i < $length; $i++) {
      $randomString .= $characters[rand(0, $charactersLength - 1)];
  }
  return $randomString;
}
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


    <style>
        /* .number{
			margin:5px;
		} */
        span {cursor:pointer; }
		.minus, .plus{
			width:20px;
			height:25px;
			background:#f2f2f2;
			border-radius:4px;
			/* padding:0px 5px 0px 5px; */
			border:1px solid #ddd;
            display: inline-block;
            vertical-align: middle;
            text-align: center;
		}
		#stock{
			height:28px;
            width: 50px;
            text-align: center;
            font-size: 16px;
			border:1px solid #ddd;
			border-radius:4px;
            display: inline-block;
            vertical-align: middle;
        }
    </style>


    <title>Seternak</title>


  </head>
  <body id="home">

  
  <!-- Navbar -->
    <?php 
        include('layout/peternak-navbar.php');
    ?>
  <!-- Navbar -->



   <div class="container-lg mt-5">

    <form action="function/add-produk.php" method="post" enctype="multipart/form-data">

    <div class="row">
        <div class="col-md-12 mt-5 mb-5">
          <div class="card shadow-sm rounded">
            <div class="card-header shadow-sm rounded-top hijau" style="background-color: #0E8550;">
              <div class="card-title ps-3 fw-bold text-light">Form  Tambah Produk</div>
            </div>
            <div class="card-body">
              <div class="row">
                    <div class="mb-3 pe-5 ps-5">
                    <label for="id_produk" class="form-label">ID Produk</label>
                    <input type="text" class="form-control" id="id_produk" name="id_produk" readonly  value="<?php echo generateRandomString(8); ?>" required>
                    </div>

                    <div class="mb-3 pe-5 ps-5">
                    <label for="nama_produk" class="form-label">Nama Produk</label>
                    <input type="text" class="form-control" id="nama_produk" name="nama_produk" required >
                    </div>

                    <div class="mb-3 pe-5 ps-5">
                    <label for="harga" class="form-label">Harga Produk</label>
                    <input type="number" class="form-control" id="harga" name="harga"  required>
                    </div>

                    <div class="mb-3 pe-5 ps-5" type="hidden">
                    <!-- <label for="id_peternak" class="form-label">ID Peternak</label> -->
                    <input type="hidden" class="form-control" id="id_peternak" name="id_peternak" value="<?php echo $username;?>" required >
                    </div>

                    <div class="mb-3 pe-5 ps-5">
                    <label for="satuan" class="form-label">Satuan Produk</label>
                    <input type="text" class="form-control" id="satuan" name="satuan" maxlength="150"  required>
                    </div>

                    <div class="mb-3 pe-5 ps-5">
                    <label for="waktu_produksi" class="form-label">Waktu Produksi</label>
                    <input type="date" class="form-control" id="waktu_produksi" name="waktu_produksi"  required>
                    </div>

                    <div class="mb-3 pe-5 ps-5">
                    <label for="stock" class="form-label">Stock</label>
                        <div class="number">
                            <span class="minus">-</span>
                            <input id="stock" type="text" name="stock" value="0" required/>
                            <span class="plus">+</span>
                        </div>
                    </div>

                    <div class="mb-3 pe-5 ps-5">
                    <label for="deskripsi_produk" class="form-label">Deskripsi Produk</label>
                    <textarea class="form-control" id="deskripsi_produk" name="deskripsi_produk" rows="10" required ></textarea>
                    </div>

                    <div class="mb-3 pe-5 ps-5">
                    <label for="foto" class="form-label">Gambar</label>
                    <p class="text-black-50">*Maksimal ukuran gambar : 10MB </p>
                    <input type="file" class="form-control" name="foto" id="foto" required >
                    </div>
              </div>

              
              <div class="field" style="display: flex; justify-content: flex-start; padding: 1rem; margin-left:1rem;">
                  <button type="submit" name="edit" class="btn btn-success ps-4 pe-4">Submit</button>
              </div>


            </div>
          </div>
        </div>
      </div>

  </div>

  <!-- Footer -->
<?php include('layout/peternak-footer.php'); ?>
<!-- Footer end -->


<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.14/js/jquery.dataTables.min.js"></script>
<script src="js/main.js"></script>


        <script>
            	$(document).ready(function() {
                    $('.minus').click(function () {
                        var $input = $(this).parent().find('input');
                        var count = parseInt($input.val()) - 1;
                        count = count < 0 ? 0 : count;
                        $input.val(count);
                        $input.change();
                        return false;
                    });
                    $('.plus').click(function () {
                        var $input = $(this).parent().find('input');
                        $input.val(parseInt($input.val()) + 1);
                        $input.change();
                        return false;
                    });
                });
        </script>

  </body>
</html>
