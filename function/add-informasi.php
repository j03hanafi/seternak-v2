<?php
    include '../koneksi.php';

    $id_info = $_POST['id_info'];
    $judul_info = $_POST['judul_info'];
    $abstrak = $_POST['abstrak'];
    $author = $_POST['author'];
    $deskripsi_info = $_POST['deskripsi_info'];
    $tanggal = date("d-m-Y");
    // var_dump ($tanggal);


    $ekstensi_diperbolehkan	= array('png','jpg','jpeg');
    $foto = $_FILES['foto']['name'];
    $x = explode('.', $foto);
    $ekstensi = strtolower(end($x));
    $ukuran	= $_FILES['foto']['size'];
    $file_tmp = $_FILES['foto']['tmp_name'];	

    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
        if($ukuran < 1044070000){			
            move_uploaded_file($file_tmp, '../assets/informasi/'.$foto);
            $query = pg_query("INSERT INTO informasi values ('$id_info','$judul_info','$abstrak','$deskripsi_info','$foto','$tanggal','$author')");
            if($query){
                echo "<script>
                    alert ('Data Successfully Added');
                </script>";
                header("location:../index-informasi.php?berhasil=yes");
                
            }else{
                echo "<script>
                    alert ('Data Unsuccessfully Added');
                </script>";
                header("location:../index-informasi.php?berhasil=no");
                
            }
        }else{
            echo 'UKURAN FILE TERLALU BESAR';
            header("location:../index-informasi.php?berhasil=no");
        }
    }else{
        echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
        header("location:../index-informasi.php?berhasil=no");
    }

    // $query = pg_query("INSERT into forum (id_forum, nama_forum, deskripsi_forum, link) VALUES ('$id_forum','$nama_forum','$deskripsi_forum','$link')");


    // if ($query){
    //     echo "<script>
    //     alert ('Data Successfully Added');
    //     </script>";
    // }else{
    //     echo "<script>
    //     alert ('Error');
    //     </script>";
    // }
?>
