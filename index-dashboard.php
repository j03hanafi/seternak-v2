<?php
    include 'koneksi.php';
    // $username =$_GET['username'];
    session_start();
    if($_SESSION['role']!="2"){
		header("location:login.php?pesan=gagal");
	}
    $username = $_SESSION['username'];
    // Query Ini buat isset kalo kalo data peternak belum diisi
    $query=("SELECT produk.foto as foto_produk, * from pemesanan
    left join detail_pemesanan on pemesanan.no_pemesanan=detail_pemesanan.no_pemesanan
    left join produk on detail_pemesanan.id_produk=produk.id_produk 
    left join peternak on produk.id_peternak=peternak.id_peternak where peternak.id_peternak='$username'AND detail_pemesanan.status!='1'");
    $datas = pg_query($conn,$query); 
    $pecah=pg_fetch_assoc($datas);
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
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Morris -->
    <link href="css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
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
            <div class="col-md-8 mt-5 mb-5 main-datatable">
                    <div class="card shadow-sm bg-body rounded">
                        <div class="container">
                                <div class="ibox ">
                    <div class="ibox-content">
                        <div>
                                        <span class="float-right text-right">
                                        <small>Penjualan tertinggi tahun ini terdapat pada bulan: <strong id="month"></strong></small>
                                            <br/>
                                            <p id="total">Total pendapatan: </p>
                                        </span>
                            <h3 class="font-bold no-margins">
                                Penghasilan Tahunan
                            </h3>
                            <small>Grafik penjualan.</small>
                        </div>

                        <div class="m-t-sm">

                            <div class="row">
                                <div class="col-md-12">
                                    <div>
                                        <canvas id="lineChart" height="114"></canvas>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                        </div>
                    </div>
            </div>
            <div class="col-md-4 mt-5 mb-5 main-datatable">
                    <div class="card shadow-sm bg-body rounded">
                        <div class="container">
                                <div class="ibox ">
                    <div class="ibox-content">

                        <div class="m-t-sm">

                            <div class="row">
                                <div class="col-md-12">
                                    <div>
                                        <canvas id="chart-line" height="285"></canvas>
                                    </div>
                                </div>
                            </div>

                        </div>

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

    <!-- ChartJS-->
    <script src="js/plugins/chartJs/Chart.min.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.bundle.min.js'></script>
    <script>
        $(document).ready(function() {
            //Line Chart
            let base_url = "/seternakv2-master/function/chart-dashboard.php";
            $.ajax({
                url: base_url,
                dataType: 'json',
                cache: false,
                dataSrc: '',

                success: function (data) {
                    var total = 0;
                    var highest = 0;
                    var highest_index = 0;
                    var month = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
                    for(var i=0; i<data.length; i++){
                        total = total + data[i];
                        if(highest < data[i]){
                            highest = data[i];
                            highest_index = i;
                        }
                    }
                    var lineData = {
                        labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
                        datasets: [
                            {
                                label: "Pendapatan",
                                backgroundColor: "rgba(26,179,148,0.5)",
                                borderColor: "rgba(26,179,148,0.7)",
                                pointBackgroundColor: "rgba(26,179,148,1)",
                                pointBorderColor: "#fff",
                                data: data
                            }
                        ]
                    };
                    var lineOptions = {
                        responsive: true
                    };

                    var ctx = document.getElementById("lineChart").getContext("2d");
                    new Chart(ctx, {type: 'line', data: lineData, options:lineOptions});
                    total = convertRupiah(total, "Rp. ");
                    $("#total").html('Total pendapatan: '+total);
                    $("#month").html(month[highest_index]);
                }
            });

            //Doughnut Chart
            let url = "/seternakv2-master/function/doughnut-chart-dashboard.php";
            $.ajax({
                url: url,
                dataType: 'json',
                cache: false,
                dataSrc: '',

                success: function (data) {
                    var labels = [];
                    var dataset = [];
                    var backgroundColor = [];

                    var rgba_backgroundColor = [
                                    "rgba(26,179,148,0.5)",
                                    "rgba(176, 0, 0, 0.5)",
                                    "rgba(0, 99, 221, 0.5)",
                                    "rgba(255, 127, 80, 0.5)",
                                    "rgba(100, 149, 237, 0.5)",
                                    "rgba(220, 20, 60, 0.5)",
                                    "rgba(0, 139, 139, 0.5)",
                                    "rgba(189, 183, 107, 0.5)",
                                    "rgba(0, 0, 139, 0.5)",
                                    "rgba(169, 169, 169, 0.5)",
                                    "rgba(143, 188, 143, 0.5)",
                                    "rgba(47, 79, 79, 0.5)",
                                    "rgba(105, 105, 105, 0.5)",
                                    "rgba(30, 144, 255, 0.5)",
                                    "rgba(178, 34, 34, 0.5)",
                                    "rgba(205, 92, 92, 0.5)",
                                    "rgba(70, 130, 180, 0.5)",
                                    "rgba(32, 178, 170, 0.5)",
                                    "rgba(135, 206, 250, 0.5)",
                                    "rgba(127, 255, 212, 0.5)"
                                ];
                    for(var i=0; i<data.produk.length; i++){
                        labels.push(data.produk[i]);
                        dataset.push(data.kuantitas[i]);
                        backgroundColor.push(rgba_backgroundColor[i]);
                    }
                    var ctx = $("#chart-line");
                    var myLineChart = new Chart(ctx, {
                        type: 'doughnut',
                        data: {
                            labels: labels,
                            datasets: [{
                                data: dataset,
                                backgroundColor: backgroundColor
                            }]
                        },
                        options: {
                            title: {
                                display: true,
                                text: 'Penjualan produk tahun 2022'
                            }
                        }
                    });
                }
            });
        });

        function convertRupiah(angka, prefix) {
            var number_string = angka.toString().replace(/[^,\d]/g, "").toString(),
                split = number_string.split(","),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? "." : "";
                rupiah += separator + ribuan.join(".");
            }

            rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
            return prefix == undefined ? rupiah : rupiah ? prefix + rupiah : "";
        }
    </script>


</body>
</html>