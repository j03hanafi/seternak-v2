<?php
include 'koneksi.php';
// }
session_start();
if ($_SESSION['role'] != "1") {
  header("location:login.php?pesan=gagal");
}
$username = $_SESSION['username'];
$total=0;
$id=$_GET['id'];
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
            left join public.user on mitra.id_pemilik=public.user.username where keranjang.id_pemilik='$username' and keranjang.status=1 and keranjang.id_keranjang='$id'"); 
$result2 = pg_query($conn, "SELECT keranjang.jumlah, 
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
            left join public.user on mitra.id_pemilik=public.user.username where keranjang.id_pemilik='$username' and keranjang.status=1 and keranjang.id_keranjang='$id'"); 
// $jml_barang = $_POST['kuantitas'];

// if(isset('tambah')){
//   foreach($_POST['id_keranjang'] as $id_keranjang => $jml_barang){
//     $id_keranjang = $id_keranjang;
//     $jml_barang = $_POST['kuantitas']['key'];

//     $sql = "UPDATE keranjang set jumlah=$ where id_keranjang=?";
//     $query = 

//   }


//   $loop = pg_query("SELECT * from keranjang where id_pemilik='$username' and status=1");
//     while ($data = pg_fetch_array($loop)) {







// $id_keranjang = $_POST['id_keranjang'];
// $kuantitas = $_POST['kuantitas'];

// $chkcount = count($id_keranjang);
// for($i=0; $i<$chkcount; $i++)
// {
//   pg_query("UPDATE keranjang set jumlah=$kuantitas[$i] where id_keranjang='$id_keranjang[$i]'");
//   // pg_query("UPDATE keranjang SET jumlah='$kuantitas[$i]' WHERE id_keranjang=".$id_keranjang[$i]);
// //  $MySQLiconn->query("UPDATE users SET first_name='$fn[$i]', last_name='$ln[$i]' WHERE id=".$id[$i]);
// }
// header("Location: index.php");

// $loop = pg_query("SELECT * from keranjang where id_pemilik='$username' and status=1");
//     while ($data = pg_fetch_array($loop)) {
//       $id_keranjang = $data['id_keranjang'];

// if (isset($_POST['tambah']))
// {
//   for($i=0;$i<count(array($id_keranjang));$i++){
//   // for($i=0;$i<count($id_keranjang);$i++;){
//     $jml_barang = $_POST['id_keranjang']['kuantitas'];
//     pg_sql("UPDATE keranjang set jumlah=$jml_barang where id_keranjang=$id_keranjang");
//   }
// }
// }

// $total = 0;
// // $username =$_GET['username'];
// session_start();
// if ($_SESSION['role'] != "1") {
//   header("location:login.php?pesan=gagal");
// }
// $username = $_SESSION['username'];
// $loop = pg_query("SELECT * from keranjang where id_pemilik='$username' and status=1");
// while ($data = pg_fetch_array($loop)) {
// }

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
// $kuantitas = $_GET['kuantitas'];
$query = pg_query("SELECT * from public.user where username='$username';");
// $query = pg_query("SELECT produk.nama_produk,
// harga,
// satuan,
// deskripsi_produk, 
// stok,
// waktu_produksi,
// peternak.nama_peternakan,
// produk.id_produk, 
// produk.foto as gambar_produk, 
// public.user.foto as profile_pic,
// public.user.alamat as alamat,
// public.user.contact as contact,
// public.user.kota from produk left join peternak on produk.id_peternak=peternak.id_peternak
// left join public.user on peternak.id_peternak=public.user.username where id_produk='$id_produk';");
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

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

    custom-select {
  position: relative;
  font-family: Arial;
}

.custom-select select {
  display: none; /*hide original SELECT element: */
}

.select-selected {
  background-color: DodgerBlue;
}

/* Style the arrow inside the select element: */
.select-selected:after {
  position: absolute;
  content: "";
  top: 14px;
  right: 10px;
  width: 0;
  height: 0;
  border: 6px solid transparent;
  border-color: #fff transparent transparent transparent;
}

/* Point the arrow upwards when the select box is open (active): */
.select-selected.select-arrow-active:after {
  border-color: transparent transparent #fff transparent;
  top: 7px;
}

/* style the items (options), including the selected item: */
.select-items div,.select-selected {
  color: #ffffff;
  padding: 8px 16px;
  border: 1px solid transparent;
  border-color: transparent transparent rgba(0, 0, 0, 0.1) transparent;
  cursor: pointer;
}

/* Style items (options): */
.select-items {
  position: absolute;
  background-color: DodgerBlue;
  top: 100%;
  left: 0;
  right: 0;
  z-index: 99;
}

/* Hide the items when the select box is closed: */
.select-hide {
  display: none;
}

.select-items div:hover, .same-as-selected {
  background-color: rgba(0, 0, 0, 0.1);
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

    <form action="function/tambah-pesanan.php" method="post" enctype="multipart/form-data">

      <div class="row profil-wrapper">

        <div class="col-md-12 mt-5 mb-5 jarak">
          <div class="card shadow-sm rounded">
            <div class="card-header shadow-sm rounded-top hijau" style="background-color: #0E8550;">
              <div class="card-title ps-3 fw-bold text-light">Alamat Pengiriman</div>
            </div>
            <div class="card-body">
              <div class="row">


                <div class="mb-3 pe-5 ps-5">
                  <label for="alamat" class="form-label">Alamat Pengiriman</label>
                  <textarea class="form-control" id="alamat" name="alamat" rows="3" disabled><?php echo $pecah['alamat']; ?></textarea>
                </div>

                <div class="mb-3 pe-5 ps-5">
                  <label for="contact" class="form-label">No.Telepon</label>
                  <input type="text" class="form-control" id="contact" name="contact" disabled value="<?php echo $pecah['contact']; ?>">
                </div>

                <div class="mb-3 pe-5 ps-5">
                  <a href="index-profile-mitra.php" class="btn btn-success mt-2 ">Edit Data Pengiriman</a>
                </div>




              </div>




            </div>
          </div>
        </div>

        <div class="col-md-12 mt-5 mb-5 jarak">
          <div class="card shadow-sm rounded">
            <div class="card-header shadow-sm rounded-top hijau" style="background-color: #0E8550;">
              <div class="card-title ps-3 fw-bold text-light">Metode Pengiriman</div>
            </div>
            <div class="card-body">
              <div class="row">

              <?php while ($user_data = pg_fetch_array($result2)) { 
                $subtotal = $user_data['jumlah']*$user_data['harga'];
                $total = $total + $subtotal;
              }?>

                <div class="mb-3 pe-5 ps-5">
                  <select class="form-select" name="metode_pengiriman" id="metode_pengiriman" required>
                    <option value="1">Payokurir</option>
                    <option value="2">Go-send</option>
                    <?php if($total >= 10000000){ ?>
                    <option value="3">Pengantaran Langsung</option>
                    <?php } ?>
                  </select>

                </div>

              </div>




            </div>
          </div>
        </div>



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


                  <!-- <div class="">
                    <a href="index-pasar.php"><span type="submit" name="tambah-pesanan" class="btn btn-success bi bi-plus font-p"> Pesanan</span></a>

                  </div> -->



                </div>

                <?php
                $i = 0;
                while ($user_data = pg_fetch_array($result)) {
                 
                ?>

                  <div class="card-header shadow-sm bg-body mt-3 rounded" style="background-color: white;">
                    <div class="card-title ps-3 fw-bold">
                      <div class="d-flex justify-content-center">

                        <div style="flex: 1;">
                          <span class="fw-bold bi bi-shop bt"></span>
                          <h5 class="fw-bold ms-2 list-inline-item font-hijau font-q"><?php echo $user_data['nama_peternakan']; ?> </h5>
                          <!-- <h6 class="fw-bold list-inline-item font-q"><?php echo $user_data['kota']; ?></h6><br> -->

                        </div>
                        <!-- <div>
                          <a class="tombol" href="function/delete-keranjang.php?id_keranjang=<?php echo $user_data['id_keranjang']; ?> "><span data-toggle="tooltip" title="hapus data" class="btn btn-danger bi bi-trash tombol"></span></a>
                    
                        </div> -->
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


                            <td id="harga" class="font-p"><?php echo $user_data['harga']; ?></td>
                            <td class="font-p d-flex justify-content-center">
                              <input id="stock" type="text" name="kuantitas" readonly value="<?php echo $user_data['jumlah']; ?>" required />
                              <?php
                              
                              ?>
                            <td id="total" class="font-p">
                              <?php $subtotal = $user_data['jumlah']*$user_data['harga'];
                              echo $subtotal;
                              $total=$total+$subtotal; ?>
                            </td>

                          </tr>


                        </tbody>
                      </table>
                    </div>
                  </div>

                <?php
                };
                ?>






                <div class="card-text align-self-end" style="flex: 1; position:relative;">
                  <p class="teks-card d-flex justify-content-end font-hijau fw-bold pe-5">Total Pesanan : &nbsp; <span id=""><?php echo $total; ?></span> </small></p>

                </div>

              </div>
            </div>
          </div>

        </div>

        <div class="field mb-5" style="display: flex; justify-content: flex-start; ">
          <button type="submit" name="tambah-pesanan" class="btn btn-success ps-4 pe-4">Buat Pesanan</button>
          <!-- <a href="index-pasar.php"><span type="submit" name="tambah-pesanan" class="btn btn-success pe-4 ms-2">Tambah Pesanan</span></a> -->
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


    const plus = document.getElementById('plus');
    const minus = document.getElementById('minus');

    const harga = document.getElementById('harga');
    const stock = document.getElementById('stock');
    const total = document.getElementById('total');
    const total2 = document.getElementById('total2');


    total.innerHTML = stock.value * harga.innerHTML;
    total2.innerHTML = stock.value * harga.innerHTML;


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