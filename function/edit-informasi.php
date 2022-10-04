<?php

include '../koneksi.php';



if(isset($_POST['edit']))
{
    $id_info = $_POST['id_info'];
    $judul_info = $_POST['judul_info'];
    $abstrak = $_POST['abstrak'];
    $author = $_POST['author'];
    $deskripsi_info = $_POST['deskripsi_info'];
    $tanggal = date("d-m-Y");
    // $foto   = $_POST['foto'];
    // var_dump ($tanggal);

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
                    if(move_uploaded_file($fileTemp, '../assets/informasi/'.$foto))
                    {
                        $query = pg_query("UPDATE informasi SET 
                                judul_info='$judul_info',
                                abstrak='$abstrak', 
                                author='$author',  
                                deskripsi_info='$deskripsi_info', 
                                foto='$foto' 
                                WHERE id_info='$id_info' ");
                        if($query)
                        {
                            header("location:../index-informasi.php?berhasil=yes");
                            echo "<script>
                            alert ('Data Successfully Added');
                            </script>";
                        }
                        else
                        {
                            header("location:../index-informasi.php?berhasil=no");
                            echo "<script>
                                alert ('Data Unsuccessfully Added');
                            </script>";
                        }
                    }
                    else
                    {
                        echo 'FILE TIDAK TERUPDATE';
                        header("location:../index-informasi.php?berhasil=no");   
                        echo "<script>
                        alert ('FILE TIDAK TERUPDATE');
                        </script>";
                    }
                }
                else
                {
                    echo 'UKURAN FILE TERLALU BESAR';
                    header("location:../index-informasi.php?berhasil=no");
                    echo "<script>
                    alert ('UKURAN FILE TERLALU BESAR');
                    </script>";
                }
            }
            else
            {
                echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
                header("location:../index-informasi.php?berhasil=no");
                echo "<script>
                    alert ('EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN');
                    </script>";
            }
        }
        else
        {
            $query = pg_query("UPDATE informasi SET 
            judul_info='$judul_info',
            abstrak='$abstrak', 
            author='$author',  
            deskripsi_info='$deskripsi_info'  
            WHERE id_info='$id_info' ");

        if($query)
        {
            header("location:../index-informasi.php?berhasil=yes");
            echo "<script>
                alert ('Data Successfully Added');
            </script>";
        }
        else
        {
            header("location:../index-informasi.php?berhasil=no");
            echo "<script>
                alert ('Data Unsuccessfully Added');
            </script>";
        }
        }



}


?>