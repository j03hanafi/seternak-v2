<?php
session_start();
include("../config.php");

    if(isset($_POST['upload'])){
        $id_produk=$_POST['id_produk'];
        $id=$_POST['id'];
        $ekstensi_diperbolehkan	= array('png','jpg','jpeg');
        $nama = $_FILES['file']['name'];
        $x = explode('.', $nama);
        $ekstensi = strtolower(end($x));
        $ukuran	= $_FILES['file']['size'];
        $file_tmp = $_FILES['file']['tmp_name'];	

        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
            if($ukuran < 1044070){			
                move_uploaded_file($file_tmp, '../upload/'.$nama);
                $query = pg_query($dbconn,"UPDATE detail_pemesanan SET bukti_pembayaran='$nama' WHERE no_pemesanan='$id' AND id_produk='$id_produk'");
                if(pg_affected_rows($query)){
                    echo '<script>'; 
                    echo 'alert("Bukti Pembayaran telah ditambahkan");'; 
                    echo 'window.location.href = "../so-belumbayar-mitra.php";';
                    echo '</script>';
                }else{
                    echo '<script>'; 
                    echo 'alert("Gagal menambahkan Bukti Pembayaran");'; 
                    echo 'window.location.href = "../so-belumbayar-mitra.php";';
                    echo '</script>';
                }
            }else{
                echo '<script>'; 
                echo 'alert("Ukuran data lebih dari 1MB");'; 
                echo 'window.location.href = "../so-belumbayar-mitra.php";';
                echo '</script>';
            }
        }else{
            echo '<script>'; 
            echo 'alert("Tambahkan file .jpg, .png, .jpeg");'; 
            echo 'window.location.href = "../so-belumbayar-mitra.php";';
            echo '</script>';
        }
    }
   
    // if(isset($_POST['upload'])){ 
    //     // File upload configuration
    //     $id=$_POST['id']; 
    //     $targetDir = "../upload/"; 
    //     $allowTypes = array('jpg','png','jpeg','gif'); 
         
    //     $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = ''; 
    //     $fileNames = array_filter($_FILES['files']['name']); 
    //     if(!empty($fileNames)){ 
    //         foreach($_FILES['files']['name'] as $key=>$val){ 
    //             // File upload path 
    //             $fileName = basename($_FILES['files']['name'][$key]); 
    //             $targetFilePath = $targetDir . $fileName; 
                 
    //             // Check whether file type is valid 
    //             $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
    //             if(in_array($fileType, $allowTypes)){ 
    //                 // Upload file to server 
    //                 if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)){ 
    //                     // Image db insert sql 
    //                     $insertValuesSQL .= "('".$fileName."'),"; 
    //                 }else{ 
    //                     $errorUpload .= $_FILES['files']['name'][$key].' | '; 
    //                 } 
    //             }else{ 
    //                 $errorUploadType .= $_FILES['files']['name'][$key].' | '; 
    //             } 
    //         } 
             
    //         // Error message 
    //         $errorUpload = !empty($errorUpload)?'Upload Error: '.trim($errorUpload, ' | '):''; 
    //         $errorUploadType = !empty($errorUploadType)?'File Type Error: '.trim($errorUploadType, ' | '):''; 
    //         $errorMsg = !empty($errorUpload)?'<br/>'.$errorUpload.'<br/>'.$errorUploadType:'<br/>'.$errorUploadType; 
             
    //         if(!empty($insertValuesSQL)){ 
    //             $insertValuesSQL = trim($insertValuesSQL, ','); 
    //             // Insert image file name into database 
    //             $insert = pg_query($dbconn,"UPDATE detail_pemesanan SET bukti_pembayaran=$insertValuesSQL WHERE no_pemesanan='$id'"); 
    //             if($insert){ 
    //                 $statusMsg = "Files are uploaded successfully.".$errorMsg; 
    //             }else{ 
    //                 $statusMsg = "Sorry, there was an error uploading your file."; 
    //             } 
    //         }else{ 
    //             $statusMsg = "Upload failed! ".$errorMsg; 
    //         } 
    //     }else{ 
    //         $statusMsg = 'Please select a file to upload.'; 
    //     } 
    // } 

    // $limit = 10 * 1024;
    // $ekstensi =  array('png','jpg','jpeg','gif');
    // $jumlahFile = count($_FILES['foto']['name']);

    // for($x=0; $x<$jumlahFile; $x++){
    // $namafile = $_FILES['foto']['name'][$x];
    // $tmp = $_FILES['foto']['tmp_name'][$x];
    // $tipe_file = pathinfo($namafile, PATHINFO_EXTENSION);
    // $ukuran = $_FILES['foto']['size'][$x];	
    // if($ukuran > $limit){
    //     header("location:index.php?alert=gagal_ukuran");		
    // }else{
    //     if(!in_array($tipe_file, $ekstensi)){
    //         header("location:index.php?alert=gagal_ektensi");			
    //     }else{		
    //         move_uploaded_file($tmp, 'file/'.date('d-m-Y').'-'.$namafile);
    //         $x = date('d-m-Y').'-'.$namafile;
    //         mysqli_query($koneksi,"INSERT INTO gambar VALUES(NULL, '$x')");
    //         header("location:index.php?alert=simpan");
    //     }
    // }
    // }
?>