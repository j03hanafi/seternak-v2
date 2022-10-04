<?php
include 'koneksi.php';
// $username =$_GET['username'];
session_start();
if($_SESSION['role']!="1"){
header("location:login.php?pesan=gagal");
}
$username = $_SESSION['username'];


function generateRandomString($length = 10)
{
  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $charactersLength = strlen($characters);
  $randomString = '';
  for ($i = 0; $i < $length; $i++) {
    $randomString .= $characters[rand(0, $charactersLength - 1)];
  }
  return $randomString;
}

include 'koneksi.php';
// $id_produk = $_GET['id_produk'];

$query = pg_query("SELECT keranjang.jumlah, 
status,
mitra.id_pemilik,nama_usaha,
produk.id_produk, 
produk.nama_produk,
produk.foto,
produk.harga,
peternak.nama_peternakan,
public.user.foto as profile_pic,
public.user.alamat as alamat,
public.user.contact as contact,
public.user.kota from keranjang left join mitra on keranjang.id_pemilik=mitra.id_pemilik
left join produk on keranjang.id_produk=produk.id_produk
left join peternak on produk.id_peternak=peternak.id_peternak
left join public.user on mitra.id_pemilik=public.user.username");
$pecah = pg_fetch_assoc($query);
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
    span {
      cursor: pointer;
    }

    .profile-wrapper {
      padding: 0 1rem;
    }

    .minus,
    .plus {
      width: 25px;
      height: 28px;
      background: #f2f2f2;
      border-radius: 4px;
      /* padding:0px 5px 0px 5px; */
      border: 1px solid #ddd;
      display: inline-block;
      vertical-align: middle;
      text-align: center;
      margin: 0 5px 0 5px;
    }

    #stock {
      height: 28px;
      width: 50px;
      text-align: center;
      font-size: 16px;
      border: 1px solid #ddd;
      border-radius: 4px;
      display: inline-block;
      vertical-align: middle;
    }

    th img {

      width: 150px;
      height: 150px;
    }

    @media (max-width: 600px) {
      th img {

        width: 60px;
        height: 60px;
      }

      .font-p {
        font-size: 10px;
      }

      #stock {
        height: 20px;
        width: 20px;
        text-align: center;
        font-size: 10px;
      }

      .teks-card {
        padding: 0 !important;
      }

      .minus,
      .plus {
        width: 17px;
        height: 20px;

        /* padding:0px 5px 0px 5px; */

        margin: 0 5px 0 5px;
      }

      .card-body {
        padding: 10px;
      }

      .jarak {
        margin-bottom: 1.5rem !important;
      }

    }
  </style>


  <title>Seternak</title>


</head>

<body id="home">


  <!-- Navbar -->
  <?php
  include('layout/mitra-navbar.php');
  ?>
  <!-- Navbar -->



  <div class="container-lg mt-5">

    <form action="" method="post" enctype="multipart/form-data">

      <div class="row profil-wrapper mt-5">


        <div class="col-md-12mt-5 mb-5 jarak">
          <div class="card shadow-sm rounded">
            <div class="card-header shadow-sm rounded-top hijau" style="background-color: #0E8550;">
              <div class="card-title ps-3 fw-bold text-light">Produk dipesan</div>
            </div>
            <div class="card-body">
              <div class="row">

                <div class="d-flex justify-content-end">
                  <!-- <div class="col text-start" style="flex: 1;">
                    <img id="profile-pic" class="rounded-circle my-2 shadow" src="upload/<?php echo $pecah['profile_pic']; ?>" width="40px" height="40px">
                    <h6 class="fw-bold ms-2 list-inline-item font-hijau"><?php echo $pecah['nama_peternakan']; ?> - </h6>
                    <h6 class="fw-bold list-inline-item"><?php echo $pecah['kota']; ?></h6><br>

                  </div> -->


                  <div class="">
                    <a href="index-pasar.php"><span type="submit" name="tambah-pesanan" class="btn btn-success bi bi-plus me-5 font-p"> Pesanan</span></a>

                  </div>



                </div>



                <div class="card-body">

                  <table class="table table-borderless ">
                    <thead class="text-black-50">
                      <tr class="text-center">
                        <th scope="col" style="width:20%; vertical-align: middle;" class="font-p">Produk</th>
                        <th scope="col" style="width:10%; vertical-align: middle;" class="font-p">Nama</th>
                        <th scope="col" style="width:15%; vertical-align: middle;" class="font-p">Harga</th>
                        <th scope="col" style="width:15%; vertical-align: middle;" class="font-p">Jumlah</th>
                        <th scope="col" style="width:10%; vertical-align: middle;" class="font-p">Subtotal Produk</th>
                        
                        
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $i = 0;
                      $result = pg_query($conn, "SELECT keranjang.jumlah, 
                      status,
                      mitra.id_pemilik,nama_usaha,
                      produk.id_produk, 
                      produk.nama_produk,
                      produk.foto,
                      produk.harga,
                      peternak.nama_peternakan,
                      public.user.foto as profile_pic,
                      public.user.alamat as alamat,
                      public.user.contact as contact,
                      public.user.kota from keranjang left join mitra on keranjang.id_pemilik=mitra.id_pemilik
                      left join produk on keranjang.id_produk=produk.id_produk
                      left join peternak on produk.id_peternak=peternak.id_peternak
                      left join public.user on mitra.id_pemilik=public.user.username where keranjang.id_pemilik='$username'");
                      while ($user_data = pg_fetch_array($result)) {
                      ?>
                        <tr class="text-center">
                          <th scope="row" class="foto-p">
                            <img src="assets/produk/<?php echo $user_data['foto']; ?>" alt="">
                          </th>
                          <td class="font-p"><?php echo $user_data['nama_produk']; ?>
                        <br>  <p class="fw-bold ms-2 list-inline-item font-hijau"><?php echo $user_data['nama_peternakan']; ?> </p>
                        </td>


                          <td id="harga" class="font-p"><?php echo $user_data['harga']; ?></td>
                          <td class="font-p d-flex justify-content-center">
                            <span class="minus" id="minus">-</span>
                            <input id="stock" type="text" name="kuantitas" value="<?php echo $user_data['jumlah']; ?>" required />
                            <span class="plus" id="plus">+</span></td>
                          <td id="total" class="font-p"></td>
                          
                        </tr>

                        
                      <?php
                      }
                      ?>

                    </tbody>
                  </table>



                  <hr>


                  <div class="card-text align-self-end" style="flex: 1; position:relative;">
                    <p class="teks-card d-flex justify-content-end font-hijau fw-bold pe-5">Total Pesanan : &nbsp; <span id="total2"></span> </small></p>

                  </div>




                </div>






              </div>
            </div>
          </div>

        </div>

        <div class="field mb-5" style="display: flex; justify-content: flex-start; ">
          <button type="submit" name="tambah" class="btn btn-success ps-4 pe-4">Buat Pesanan</button>

        </div>

      </div>
    </form>
  </div>
  <!-- Footer -->
  <?php include('layout/mitra-footer.php'); ?>
  <!-- Footer end -->


  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/1.10.14/js/jquery.dataTables.min.js"></script>
  <script src="js/main.js"></script>


  <script>
    // $(document).ready(function() {
    //   $('.minus').click(function() {
    //     var $input = $(this).parent().find('input');
    //     var count = parseInt($input.val()) - 1;
    //     count = count < 0 ? 0 : count;
    //     $input.val(count);
    //     $input.change();
    //     return false;
    //   });
    //   $('.plus').click(function() {
    //     var $input = $(this).parent().find('input');
    //     $input.val(parseInt($input.val()) + 1);
    //     $input.change();
    //     return false;
    //   });
    // });


    const plus = document.getElementById('plus');
    const minus = document.getElementById('minus');

    const harga = document.getElementById('harga');
    const stock = document.getElementById('stock');
    const total = document.getElementById('total');
    const total2 = document.getElementById('total2');


    total.innerHTML = stock.innerHTML * harga.innerHTML;
    total2.innerHTML = stock.innerHTML * harga.innerHTML;


    plus.addEventListener('click', function() {

      stock.value = parseInt(stock.value) + 1;
      const totalpay = parseInt(harga.innerHTML) * parseInt(stock.value);
      total.innerHTML = totalpay;
      total2.innerHTML = totalpay;

    })

    minus.addEventListener('click', function() {

      stock.value = parseInt(stock.value) - 1;
      const totalpay = parseInt(harga.innerHTML) * parseInt(stock.value);
      total.innerHTML = totalpay;
      total2.innerHTML = totalpay;

    })

    stock.addEventListener('change', function(e) {

      var stock = e.target.value;
      const totalpay = parseInt(harga.innerHTML) * parseInt(stock);
      total.innerHTML = totalpay;
      total2.innerHTML = totalpay;


    })
  </script>







</body>

</html>