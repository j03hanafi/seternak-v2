<?php

include '../koneksi.php';



if(isset($_POST['edit']))
{
    // $foto   = $_POST['foto'];
    // var_dump ($tanggal);
    $id_produk = $_POST['id_produk'];
    $id_peternak = $_POST['id_peternak'];
    $nama_produk = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $satuan = $_POST['satuan'];
    $waktu_produksi = $_POST['waktu_produksi'];
    $deskripsi_produk = $_POST['deskripsi_produk'];
    $stock = $_POST['stock'];

    $allowExt 			= array( 'png', 'jpg', 'jpeg' );
	$fileName 			= $_FILES['foto']['name'];
	// $fileExt			= strtolower(end(explode('.', $fileName)));
    $fileExt            = pathinfo($fileName, PATHINFO_EXTENSION); 
	$fileSize			= $_FILES['foto']['size'];
	$fileTemp 			= $_FILES['foto']['tmp_name'];
	$base 				= basename ($fileName);
	$foto 			    = str_replace(' ','_',$base);

    if($_FILES['foto']['size']>0)
        {
            if(in_array($fileExt, $allowExt) === true)
            {
                if($fileSize < 1044070000) //untuk mengecek ukuran file
                {			
                    if(move_uploaded_file($fileTemp, '../assets/produk/'.$foto))
                    {
                        $query = pg_query("UPDATE produk SET 
                                nama_produk='$nama_produk',
                                harga='$harga', 
                                satuan='$satuan',  
                                waktu_produksi='$waktu_produksi',  
                                deskripsi_produk='$deskripsi_produk', 
                                stok='$stock', 
                                foto='$foto' 
                                WHERE id_produk='$id_produk' ");
                        if($query)
                        {
                            header("location:../index-produksaya.php?berhasil=yes");
                            echo "<script>
                            alert ('Data Successfully Added');
                            </script>";
                        }
                        else
                        {
                            header("location:../index-produksaya.php?berhasil=no");
                            echo "<script>
                                alert ('Data Unsuccessfully Added');
                            </script>";
                        }
                    }
                    else
                    {
                        echo 'FILE TIDAK TERUPDATE';
                        header("location:../index-produksaya.php?berhasil=no");   
                        echo "<script>
                        alert ('FILE TIDAK TERUPDATE');
                        </script>";
                    }
                }
                else
                {
                    echo 'UKURAN FILE TERLALU BESAR';
                    header("location:../index-produksaya.php?berhasil=no");
                    echo "<script>
                    alert ('UKURAN FILE TERLALU BESAR');
                    </script>";
                }
            }
            else
            {
                echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
                header("location:../index-produksaya.php?berhasil=no");
                echo "<script>
                    alert ('EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN');
                    </script>";
            }
        }
        else
        {
            $query = pg_query("UPDATE produk SET 
                                nama_produk='$nama_produk',
                                harga='$harga', 
                                satuan='$satuan',  
                                waktu_produksi='$waktu_produksi',  
                                deskripsi_produk='$deskripsi_produk', 
                                stok='$stock'  
                                WHERE id_produk='$id_produk' ");

        if($query)
        {
            header("location:../index-produksaya.php?berhasil=yes");
            echo "<script>
                alert ('Data Successfully Added');
            </script>";
        }
        else
        {
            header("location:../index-produksaya.php?berhasil=no");
            echo "<script>
                alert ('Data Unsuccessfully Added');
            </script>";
        }
        }



}


?>