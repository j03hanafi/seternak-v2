<?php
include 'koneksi.php';
// $username =$_GET['username'];
session_start();
if ($_SESSION['role'] != "1") {
    header("location:login.php?pesan=gagal");
}
$username = $_SESSION['username'];
?>
<?php
include 'koneksi.php';
$id_produk = $_GET['id_produk'];
$query = pg_query("SELECT produk.nama_produk,
harga,
satuan,
deskripsi_produk, 
stok,
waktu_produksi,
peternak.nama_peternakan,
produk.id_produk, 
produk.foto as gambar_produk, 
public.user.foto as profile_pic,
public.user.kota from produk left join peternak on produk.id_peternak=peternak.id_peternak
left join public.user on peternak.id_peternak=public.user.username where id_produk='$id_produk';");
$pecah = pg_fetch_assoc($query);

// $query=pg_query("SELECT produk.nama_produk,
//                         produk.id_produk,
//                         produk.foto as gambar_produk, 
//                         public.user.foto as profile_pic, 
//                         nama_peternakan, 
//                         public.user.kota, 
//                         rating, 
//                         harga, 
//                         satuan, 
//                         stok, 
//                         deskripsi_produk
//                 from pemesanan
//                 left join detail_pemesanan on pemesanan.no_pemesanan=detail_pemesanan.no_pemesanan 
//                 left join produk on detail_pemesanan.id_produk=produk.id_produk left join peternak on produk.id_peternak=peternak.id_peternak 
//                 left join public.user on peternak.id_peternak=public.user.username where produk.id_produk='$id_produk';");
// $pecah=pg_fetch_assoc($query);

$query1 = pg_query($conn, "SELECT SUM(kuantitas) AS jumlah FROM detail_pemesanan where id_produk='$id_produk'");
$data = pg_fetch_array($query1);

$rate = pg_query("SELECT AVG(rating) as rate from pemesanan 
join detail_pemesanan on pemesanan.no_pemesanan=detail_pemesanan.no_pemesanan where id_produk='$id_produk'");
$pecah2 = pg_fetch_array($rate);






// $query1=pg_query("SELECT SUM(kuantitas) AS jumlah FROM detail_pemesanan where id_produk='$id_produk';");
// $pecah2=pg_fetch_assoc($query1);
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

    <!-- Star rating -->
    <!-- <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/css/star-rating.min.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/js/star-rating.min.js"></script> -->

    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Seternak</title>

    <style>
        .checked {
            color: orange;
        }

        span {
            cursor: pointer;
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

        @media (max-width: 768px) {
            * {
                font-size: 14px;
            }

            #foto-produk {
                width: 300px;
                height: 200px;
            }



        }
    </style>


</head>

<body id="home">


    <!-- Navbar -->
    <section>
        <?php
        include('layout/mitra-navbar.php');
        ?>
    </section>
    <!-- Navbar -->

    <!-- Content -->
    <section class="my-5">
        <div class="container mt-5">
            <form action="function/marketplace.php" method="post">
                <input type="hidden" name="id_produk" value="<?php echo $id_produk; ?>">
                <div class="row">
                    <div class="col text-center">
                        <img id="foto-produk" class="rounded-3 shadow mb-4" src="assets/produk/<?php echo $pecah['gambar_produk']; ?>" width="550px" height="350px">
                    </div>
                    <div class="col text-start">
                        <h2 class="fw-bolder"><?php echo $pecah['nama_produk']; ?></h2>
                        <img id="profile-pic" class="rounded-circle my-2 shadow" src="upload/<?php echo $pecah['profile_pic']; ?>" width="40px" height="40px">
                        <h6 class="fw-bold ms-2 list-inline-item font-hijau"><?php echo $pecah['nama_peternakan']; ?> - </h6>
                        <h6 class="fw-bold list-inline-item"><?php echo $pecah['kota']; ?></h6><br>
                        <!-- <input  name="rating" class="rating" data-min="0" data-max="5" value="2"> -->
                        <?php
                        if (isset($pecah2['rate'])) {
                            for ($i = 0; $i < $pecah2['rate']; $i++) { ?>
                                <span class="fa fa-star checked" class="m-1"></span>
                            <?php
                            }
                        } else {
                            ?>
                            <span class="text-black-50">Not Rated</span>
                        <?php } ?>


                        <h6 class=" list-inline-item"> |
                            <?php
                            if (isset($data['jumlah'])) {
                                echo $data['jumlah'];
                            } else {
                                echo "0";
                            }
                            ?> terjual
                        </h6><br>

                        <hr>
                        <span class="fw-bolder fs-3 mt-5 harga">Rp <?php echo number_format($pecah['harga'], '0', ',', '.'); ?> </span> <span> / <?php echo $pecah['satuan']; ?></span>
                        <!-- <h3 class="fw-bolder mt-5 harga">Rp <?php echo number_format($pecah['harga'], '0', ',', '.'); ?> </h3> <p > / <?php echo $pecah['satuan']; ?></p> -->

                        <table class="text-black-50 mt-3">
                            <tr>
                                <td class="pe-4">Stock</td>
                                <td class="pe-4"><?php echo $pecah['stok']; ?></td>
                            </tr>
                            <tr>
                                <td class="pe-4">Waktu Produksi</td>
                                <td class="pe-4"><?php echo $pecah['waktu_produksi']; ?></td>
                            </tr>

                            <tr>
                                <td class="pe-4">Kuantitas</td>
                                <td class="pe-4">
                                    <div class="number">
                                        <span class="minus">-</span>
                                        <input id="stock" type="text" name="kuantitas" value="0" required />
                                        <span class="plus">+</span>
                                       
                                    </div>
                                </td>
                            </tr>



                        </table>
                        <!-- <a  href="form-edit-produk.php?id_produk=<?php echo $pecah['id_produk']; ?>" ><span class="btn btn-success px-5">Ubah</span></a> -->
                        <div class="mt-3">
                            <button type="submit" name="belisekarang" class="btn btn-success px-5 ">Beli Sekarang</button>
                            <button type="submit" name="keranjang" class="btn btn-success bi bi-cart font-hijau ms-2 bold"></button>
                            <!-- <a type="submit" name="belisekarang" href="" class="btn btn-success px-5 ">Beli Sekarang</a> -->
                            <!-- <a><span type="submit" name="keranjang" class="btn btn-success bi bi-cart font-hijau ms-2 bold"></span></a> -->
                        </div>
                    </div>
                </div>
            </form>
            <div class="row">
                <div class="col my-4">
                    <h5 class="fw-bolder text-black-50">Deskripsi Produk</h5>
                    <hr>
                    <p><?php echo $pecah['deskripsi_produk']; ?></p>
                    <h5 class="fw-bolder text-black-50 mt-5">Penilaian Produk</h5>
                    <hr>
                    <?php
                    if (isset($pecah2['rate'])) {
                        $review = pg_query("SELECT detail_pemesanan.rating, 
                                                            detail_pemesanan.feedback,
                                                            mitra.nama_usaha as rm,
                                                            public.user.foto as ava
                                                            from pemesanan 
                                                            left join mitra on pemesanan.id_pemilik=mitra.id_pemilik 
                                                            left join public.user on mitra.id_pemilik=public.user.username 
                                                            right join detail_pemesanan on pemesanan.no_pemesanan=detail_pemesanan.no_pemesanan 
                                                            where detail_pemesanan.id_produk='$id_produk'");
                        while ($pecah1 = pg_fetch_array($review)) {

                    ?>
                            <div class="card p-3 mb-2">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="user d-flex flex-row align-items-center"><img id="profile-pic" class="rounded-circle my-2 shadow" src="upload/<?php echo $pecah1['ava']; ?>" width="40px" height="40px">
                                        <span><small class="font-weight-bold text-primary ms-3">
                                                <h6 class="fw-bold ms-2 list-inline-item font-hijau"><?php echo $pecah1['rm']; ?></h6>
                                            </small><br>
                                            <small class="font-weight-bold ms-4">
                                                <?php
                                                if (isset($pecah1['rating'])) {
                                                    for ($i = 0; $i < $pecah1['rating']; $i++) { ?>
                                                        <span class="fa fa-star checked" class="m-1"></span>
                                                    <?php
                                                    }
                                                } else {
                                                    ?>
                                                    <span class="text-black-50">Not Rated</span>
                                                <?php } ?>
                                            </small></span> </div> <small>.</small>
                                </div>
                                <div class="action d-flex justify-content-between mt-2 align-items-center">
                                    <div class="reply px-4"> <small><?php echo $pecah1['feedback']; ?></small> </div>
                                </div>
                            </div>

                        <?php }
                    } else { ?>
                        <div class="text-center">
                            <span class="text-black-50 text-center">"Not Rated"</span>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- Content End -->
    <!-- https://api.whatsapp.com/send?phone=6281220226849&text=Hallo -->



    <!-- Footer -->
    <?php include('layout/mitra-footer.php'); ?>
    <!-- Footer end -->


    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.14/js/jquery.dataTables.min.js"></script>
    <script src="js/main.js"></script>

    <script>
        $("#ratinginput").rating();
    </script>

    <script>
        $(document).ready(function() {
            $('.minus').click(function() {
                var $input = $(this).parent().find('input');
                var count = parseInt($input.val()) - 1;
                count = count < 0 ? 0 : count;
                $input.val(count);
                $input.change();
                return false;
            });
            $('.plus').click(function() {
                var $input = $(this).parent().find('input');
                $input.val(parseInt($input.val()) + 1);
                $input.change();
                return false;
            });
        });
    </script>

</body>

</html>