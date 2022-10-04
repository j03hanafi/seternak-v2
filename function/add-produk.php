<?php
    include '../koneksi.php';

    $id_produk = $_POST['id_produk'];
    $id_peternak = $_POST['id_peternak'];
    $nama_produk = $_POST['nama_produk'];
    $id_peternak = $_POST['id_peternak'];
    $harga = $_POST['harga'];
    $satuan = $_POST['satuan'];
    $waktu_produksi = $_POST['waktu_produksi'];
    $deskripsi_produk = $_POST['deskripsi_produk'];
    $stock = $_POST['stock'];
    // $tanggal = date("d-m-Y");
    // var_dump ($waktu_produksi);


    $ekstensi_diperbolehkan	= array('png','jpg','jpeg');
    $foto = $_FILES['foto']['name'];
    $x = explode('.', $foto);
    $ekstensi = strtolower(end($x));
    $ukuran	= $_FILES['foto']['size'];
    $file_tmp = $_FILES['foto']['tmp_name'];	

    
    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
        if($ukuran < 1044070000){			
            move_uploaded_file($file_tmp, '../assets/produk/'.$foto);
            $query = pg_query("INSERT INTO produk (id_produk, id_peternak, nama_produk, harga, foto, deskripsi_produk, stok, satuan, waktu_produksi) 
                                VALUES ('$id_produk', '$id_peternak', '$nama_produk', $harga, '$foto', '$deskripsi_produk', $stock, '$satuan', '$waktu_produksi')");
            if($query){
                echo "<script>
                    alert ('Data Successfully Added');
                </script>";
                header("location:../index-produksaya.php?berhasil=yes");
                
            }else{
                echo "<script>
                    alert ('Data Unsuccessfully Added');
                </script>";
                header("location:../index-produksaya.php?berhasil=no");
                
            }
        }else{
            echo 'UKURAN FILE TERLALU BESAR';
            header("location:../index-produksaya.php?berhasil=no");
        }
    }else{
        echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
        header("location:../index-produksaya.php?berhasil=no");
    }

?>
