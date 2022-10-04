<?php
include('../config.php');

if(isset($_POST['submit'])){
    $feedback=$_POST['feedback'];
    $rating = $_POST['rating'];
    $id_produk = $_POST['id_produk'];
    $id=$_POST['id'];
    $query = pg_query($dbconn,"UPDATE detail_pemesanan SET feedback='$feedback', rating='$rating' WHERE no_pemesanan='$id' and id_produk='$id_produk'");
    // $hasil = pg_affected_rows($query);
    if($query){
        echo '<script>'; 
        echo 'alert("Terima kasih telah memberikan penilaian");'; 
        echo 'window.location.href = "../so-selesai-mitra.php";';
        echo '</script>';
    }else{
        echo '<script>'; 
        echo 'alert("Gagal memberikan penilaian");'; 
        echo 'window.location.href = "../so-selesai-mitra.php";';
        echo '</script>';
    }
}

?>