<?php
include 'koneksi.php';
// $username =$_GET['username'];
session_start();
if ($_SESSION['role'] != "1") {
  header("location:login.php?pesan=gagal");
}
$username = $_SESSION['username'];
$total = 0;


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

$cekkeranjang = pg_query("SELECT * from keranjang where id_pemilik='$username' and status=1");
$keranjangcek = pg_fetch_assoc($cekkeranjang);
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

    
    .tampung {
      padding-left: 0 !important;
      padding-right: 0 !important;
    }
    .stok {
      height: 28px;
      width: 50px;
      text-align: center;
      font-size: 16px;
      border: 1px solid #ddd;
      border-radius: 4px;
      display: inline-block;
      vertical-align: middle;
    }

    .tombol {
      font-size: 12px !important;
      padding: 5px 10px;
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

      .font-q {
        font-size: 12px;
      }

      .foto-p img {
        width: 30px;
        height: 30px;
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

      .pas {
        margin: 0 !important;

      }

      .tombol {
        font-size: 10px !important;
      }

      .aha {
        padding: 0 5px 0 0 !important;

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




  <div class="container-lg mt-5 tampung" style="min-height:71.3vh;">


    <form action="form-checkout.php" method="post" enctype="multipart/form-data">
     

        <?php
        if (isset($keranjangcek['id_keranjang'])) {


        ?>
          <div class="col-md-12 mb-5 jarak">
            <div class="card shadow-sm rounded">
              <div class="card-header shadow-sm rounded-top hijau" style="background-color: #0E8550;">
                <div class="card-title ps-3 fw-bold text-light">Produk dipesan</div>
              </div>
              <div class="card-body">
                <div class="row ms-5 me-5 pas">

                  <div class="d-flex justify-content-end">
                    <!-- <div class="col text-start" style="flex: 1;">
                    <img id="profile-pic" class="rounded-circle my-2 shadow" src="upload/<?php echo $pecah['profile_pic']; ?>" width="40px" height="40px">
                    <h6 class="fw-bold ms-2 list-inline-item font-hijau"><?php echo $pecah['nama_peternakan']; ?> - </h6>
                    <h6 class="fw-bold list-inline-item"><?php echo $pecah['kota']; ?></h6><br>

                  </div> -->


                    <div class="">
                      <a href="index-pasar.php"><span type="submit" name="tambah-pesanan" class="btn btn-success bi bi-plus font-p"> Pesanan</span></a>

                    </div>



                  </div>

                  <?php
                  $i = 0;
                  $result = pg_query($conn, "SELECT keranjang.jumlah, 
            status,id_keranjang,
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
            left join public.user on mitra.id_pemilik=public.user.username where keranjang.id_pemilik='$username' and keranjang.status='1'");
                  while ($user_data = pg_fetch_array($result)) {
                  ?>

                    <div class="card-header shadow-sm bg-body mt-3 rounded" style="background-color: white;">
                      <div class="card-title ps-3 fw-bold">
                        <div class="d-flex justify-content-center">

                          <div style="flex: 1;">
                            <span class="fw-bold bi bi-shop bt"></span>
                            <h6 class="fw-bold ms-2 list-inline-item font-hijau font-q"><?php echo $user_data['nama_peternakan']; ?> </h6>
                            <!-- <h6 class="fw-bold list-inline-item font-q"><?php echo $user_data['kota']; ?></h6> -->
                            <br>

                          </div>
                          <div>
                            <a class="tombol" href="function/delete-keranjang.php?id_keranjang=<?php echo $user_data['id_keranjang']; ?> "><span data-toggle="tooltip" title="hapus data" class="btn btn-danger bi bi-trash tombol"></span></a>

                          </div>
                        </div>

                      </div>
                    </div>
                    <div class="card shadow px-4 py-1 mb-3">
                      <div class="card-body aha">
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

                            <tr class="text-center">
                              <th scope="row" class="foto-p">
                                <img src="assets/produk/<?php echo $user_data['foto']; ?>" alt="">
                              </th>
                              <td class="font-p"><?php echo $user_data['nama_produk']; ?>
                                <br>
                                <p class="fw-bold ms-2 list-inline-item font-hijau font-p"><?php echo $user_data['nama_peternakan']; ?> </p>
                              </td>

                              <input id="" class="id_keranjang" type="hidden" name="id_keranjang[]" value="<?php echo $user_data['id_keranjang']; ?>"  required />
                              <td id="harga-<?php echo $user_data['id_keranjang']; ?>" class="font-p"><?php echo $user_data['harga']; ?></td>
                              <td class="font-p d-flex justify-content-center">
                                <span class="minus" id="minus-<?php echo $user_data['id_keranjang']; ?>" dataid="<?php echo $user_data['id_keranjang']; ?>" onclick="minus(this)">-</span>
                                <input id="stock-<?php echo $user_data['id_keranjang']; ?>" class="stok" type="text" name="kuantitas[]" value="<?php echo $user_data['jumlah']; ?>" onchange="handleChangeStock(this)" required />
                                <span class="plus" id="plus-<?php echo $user_data['id_keranjang']; ?>" onclick="plus(this,this.id)">+</span></td>
                              <td id="total-<?php echo $user_data['id_keranjang']; ?>" class="font-p">
                                  <?php 
                                      $subtotal = $user_data['harga'] * $user_data['jumlah'];
                                      $total = $total+$subtotal;
                                      echo $subtotal; 
                                      
                                      
                                  ?>
                              </td>

                            </tr>


                          </tbody>
                        </table>
                      </div>
                    </div>

                  <?php
                  };
                  ?>






                  <!-- <div class="card-text align-self-end" style="flex: 1; position:relative;">
                    <p class="teks-card d-flex justify-content-end font-hijau fw-bold pe-5">Total Pesanan : &nbsp; <span id="totalsemua"><?php echo $total; ?></span> </small></p>

                  </div> -->

                </div>
              </div>
            </div>

          </div>

          <div class="field mb-5" style="display: flex; justify-content: flex-start; ">
            <button type="submit" name="tambah" class="btn btn-success ps-4 pe-4"> Buat Pesanan</button>

          </div>


        <?php } else {
        ?>



          <section>
            <div class="container">
              <div class="row my-5">
                <div class="col text-center mt-5">
                  <img src="assets/notfound.svg" class="my-5" alt="" width="350px" height="150px">
                  <h5 class="text-muted">Pesanan Belum Ada...</h5>
                  <a href="index-pasar.php" class="btn btn-success mt-2 mb-5">Tambah Pesanan</a>
                </div>
              </div>
            </div>
          </section>


        <?php
        } ?>

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
    // const totalsemua = document.getElementById('totalsemua');
    // totalsemua.innerHTML = 0;
    // const subtotal = parseInt(totalsemua.innerHTML);

    // let a = 0;
    

    function minus(event) {

      const id_keranjang = event.id.split('-')[1];

      const total = document.getElementById(`total-${id_keranjang}`);
      const harga = document.getElementById(`harga-${id_keranjang}`);
      const stock = document.getElementById(`stock-${id_keranjang}`);

      stock.value = parseInt(stock.value) - 1;

      const totalpay = parseInt(harga.innerHTML) * parseInt(stock.value);
      // a= a - (totalpay);
      total.innerHTML = totalpay;
      // totalsemua.innerHTML = a;

    }

    function plus(event) {



      const id_keranjang = event.id.split('-')[1];

      const total = document.getElementById(`total-${id_keranjang}`);
      const harga = document.getElementById(`harga-${id_keranjang}`);
      const stock = document.getElementById(`stock-${id_keranjang}`);

      stock.value = parseInt(stock.value) + 1;

      const totalpay = parseInt(harga.innerHTML) * parseInt(stock.value);
      // a= a + (totalpay);
      total.innerHTML = totalpay;
      // totalsemua.innerHTML = a;

     


    }

    function handleChangeStock(event) {

      const id_keranjang = event.id.split('-')[1];

      const harga = document.getElementById(`harga-${id_keranjang}`);
      const total = document.getElementById(`total-${id_keranjang}`);
      const stock = event.value;

      const totalpay = parseInt(harga.innerHTML) * parseInt(stock);
      // a= a + (totalpay);
      total.innerHTML = totalpay;
      // totalsemua.innerHTML = a;


    }
  </script>
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



    // function minus(event, id_keranjang) {

    //   const total = document.getElementById(`total-${id_keranjang}`);

    //   console.log(total);
    //   total.innerHTML = id_keranjang;


    // }

    // function plus(event, id_keranjang) {

    //   console.log(id_keranjang);


    // }



    // const plus = document.getElementById('plus');
    // const minus = document.getElementById('minus');

    // const harga = document.getElementById('harga');
    // const stock = document.getElementById('stock');
    // const total = document.getElementById('total');
    // const total2 = document.getElementById('total2');


    // total.innerHTML = stock.value * harga.innerHTML;
    // total2.innerHTML = stock.value * harga.innerHTML;


    // plus.addEventListener('click', function() {

    //   stock.value = parseInt(stock.value) + 1;
    //   const totalpay = parseInt(harga.innerHTML) * parseInt(stock.value);
    //   total.innerHTML = totalpay;
    //   total2.innerHTML = totalpay;

    // })


    // minus.addEventListener('click', function() {

    //   stock.value = parseInt(stock.value) - 1;
    //   const totalpay = parseInt(harga.innerHTML) * parseInt(stock.value);
    //   total.innerHTML = totalpay;
    //   total2.innerHTML = totalpay;

    // })

    // stock.addEventListener('change', function(e) {

    //   var stock = e.target.value;
    //   const totalpay = parseInt(harga.innerHTML) * parseInt(stock);
    //   total.innerHTML = totalpay;
    //   total2.innerHTML = totalpay;


    // })
  </script>







</body>

</html>