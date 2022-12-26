<?php
    include 'koneksi.php';
    // $username =$_GET['username'];
    session_start();
    if($_SESSION['role']!="2"){
		header("location:login.php?pesan=gagal");
	}
    $username = $_SESSION['username'];
    // Query Ini buat isset kalo kalo data peternak belum diisi
    $query=pg_query("SELECT * FROM peternak LEFT JOIN public.user on peternak.id_peternak=public.user.username where id_peternak='$username'");
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

    <!-- Datatable -->
    <link rel="stylesheet" type="text/css" media="screen" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    


    <title>Seternak</title>
    <style>
        .container-lg mt-5{
            margin-top:200px;
        }
        .p-30{
            padding:30px;
        }

        .main-datatable {
            padding: 0px; 
            border: 1px solid #f3f2f2;
            border-bottom: 0;
            box-shadow: 0px 2px 10px rgba(0,0,0,.05);
        }
        .searchInput {
            width: 50%;
            display: flex;
            align-items: center;
            position: relative;
            justify-content: flex-end;
            margin: 20px 0px;
            padding: 0px 4px;
        }
        .searchInput input {
            border: 1px solid #e5e5e5;
            border-radius: 5px;
            margin-left: 8px;
            height: 34px;
            width: 100%;
            padding: 0px 25px 0px 10px;
            /* transition: all .6s ease; */
        }
        .searchInput label {
            color: #767676;
            font-weight: normal;
        }

        .main-datatable .dataTable.no-footer {
            border-bottom: 1px solid #eee;
        }

        .main-datatable .dataTables_wrapper .dataTables_paginate .paginate_button {
            color: #7A7474 !important;
            background-color: #f6f6f6 !important;
            border-color: #0E8550 !important;
            border-radius: 5px;
            margin: 5px 3px;
            padding:5px;
        }
        .main-datatable .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            color: white !important;
            border: 1px solid #3d96f5 !important;
            background: #0E8550 !important;
            box-shadow: none;
        }
        .main-datatable .dataTables_wrapper .dataTables_paginate .paginate_button.current, 
        .main-datatable .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
            color: white !important;
            border-color: transparent !important;
            background: #0E8550 !important;
        }
        .main-datatable .dataTables_paginate {
            padding-top: 0 !important;
            margin: 15px 10px;
            float: right !important;
        }

        @media only screen and (max-width:768px){
            .table-responsive{
                overflow-x:scroll;
            }
            .table-responsive::-webkit-scrollbar{
                width:5px;
                height:6px;
            }
            .table-responsive::-webkit-scrollbar-thumb{
                background-color: #888;
            }
            .table-responsive::-webkit-scrollbar-track{
                background-color: #f1f1f1;
            }

            .form-group.searchInput{
                width: auto;
            }
        }

    </style>
</head>
<body id="home">

<section class=:>
    <!-- Navbar -->
    <?php 
        include('layout/peternak-navbar.php');
    ?>
    <!-- Navbar -->
</section>


<?php if(isset($pecah['nama_peternakan'],$pecah['alamat_peternakan'])) {
    
    ?>
<section>
    <div class="container-lg mt-5">
        <div class="row">
            <div class="col-md-12 mt-5 mb-5 main-datatable">
                    <div class="card shadow-sm bg-body rounded">
                        <div class="container">
                                <div class="card-body">
                                <div class="row d-flex mb-4">
                                    <div class="col-sm-8 add_flex">
                                        <div class="form-group searchInput">
                                            <label for="email">Search:</label>
                                            <input type="search" class="form-control" id="filterbox" placeholder=" ">
                                        </div>
                                    </div>
                                    <div class="col d-flex align-items-center flex-row-reverse me-3 mt-3">
                                        <button class="btn btn-success btn-round ml-auto" data-toggle="modal">
                                            <i class="bi bi-plus"><a href="form-add-produk.php" class="button is-success" style="color:white !important; text-decoration:none;"></i>Tambah Produk</a>
                                        </button>
                                    </div> 
                                </div>
                                    <div class="table-responsive">
                                    <table class="table table-hover table-responsive" id="filtertable" >
                                        <thead class="bg-light.bg-gradient">
                                            <tr class="hijau text-light">
                                                <th scope="col">Foto Produk</th>
                                                <th scope="col">Nama Produk</th>
                                                <th class="text-center" scope="col">Harga Produk</th>
                                                <th class="text-center" scope="col">Stock</th>
                                                <th class="text-center" scope="col">Penjualan</th>
                                                <th class="text-center" scope="col" style="width:15%;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $i=0;
                                            $ambil = pg_query($conn,"select * from produk where id_peternak='$username'");
                                            while ($pecah = pg_fetch_array($ambil)){
                                        ?>
                                            <tr>
                                                <th scope="row">
                                                    <img src="assets/produk/<?php echo $pecah['foto']; ?>" alt="" style="width:100px;height: 100px;">
                                                </td>
                                                <td><?php echo $pecah['nama_produk']; ?></td>
                                                <td class="text-center"><?php echo number_format($pecah['harga'],0,".","."); ?></td>
                                                <td class="text-center">
                                                    <?php 
                                                        if($pecah['stok']<1){
                                                    ?>
                                                            <span class="badge bg-danger">Out of stock</span>
                                                    <?php
                                                        }else{
                                                        echo $pecah['stok'];  }
                                                    ?>
                                                
                                                </td>
                                                <td class="text-center">
                                                    <?php
                                                        $id_produk = $pecah['id_produk'];                                                        
                                                        $ambil_pesanan = pg_query($conn,"SELECT SUM(kuantitas) AS jumlah FROM detail_pemesanan where id_produk='$id_produk'");
                                                        $data = pg_fetch_array($ambil_pesanan);
                                                        if( isset( $data['jumlah'] ) ) {
                                                            echo $data['jumlah'];
                                                        }else
                                                        {
                                                            echo "-";
                                                        }
                                                        
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <a  href="form-show-produksaya.php?id_produk=<?php echo $pecah['id_produk'];?>"><span class="btn btn-success bi bi-search font-hijau"></span></a>
                                                    <a  href="form-edit-produk.php?id_produk=<?php echo $pecah['id_produk'];?>" ><span class="btn btn-success bi bi-pencil-square font-hijau"></span></a>
                                                    <a  href="function/delete-produk.php?id_produk=<?php echo $pecah['id_produk'];?>" ><span class="btn btn-success bi bi-trash font-hijau"></span></a>
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
</section>
<?php
}else{
?>



<section>
    <div class="container">
        <div class="row my-5">
            <div class="col text-center mt-5">
                <img src="assets/notfound.svg" class="my-5" alt="" width="350px" height="150px">
                <h5 class="text-muted">Isi data peternak terlebih dahulu...</h5>
                <a href="index-profile-peternak.php" class="btn btn-success mt-2 mb-5">Go to profile</a>
            </div>
        </div>
    </div>
</section>

<?php } ?>


    <!-- Footer -->
    <?php include('layout/peternak-footer.php'); ?>
<!-- Footer end -->
 

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.14/js/jquery.dataTables.min.js"></script>
<script src="js/main.js"></script>

<!-- jquery -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->

<script>
    $(document).ready(function() {
        var dataTable = $('#filtertable').DataTable({
            "pageLength":5,
            'aoColumnDefs':[{
                'bSortable':false,
                'aTargets':['nosort'],
            }],
            columnDefs:[
                {type:'date-dd-mm-yyyy',aTargets:[5]}
            ],
            "aoColumns":[
                null,
                null,
                null,
                null,
                null,
                null
            ],
            "order":false,
            "bLengthChange":false,
            "dom":'<"top">ct<"top"p><"clear">'
        });
        $("#filterbox").keyup(function(){
            dataTable.search(this.value).draw();
        });
    } );

</script>

</body>
</html>