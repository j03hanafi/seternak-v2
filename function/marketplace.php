<?php
  include '../koneksi.php';


session_start();
if($_SESSION['role']!="1"){
header("location:login.php?pesan=gagal");
}
$username = $_SESSION['username'];


  $kuantitas = $_POST['kuantitas'];
  $id_produk= $_POST['id_produk'];
  $id_pemilik= $username;

  function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
  }
  $id_keranjang = generateRandomString();

  

  if(isset($_POST['belisekarang'])){


    $cekstock = pg_query("SELECT * FROM produk where id_produk='$id_produk'");
      $pecah=pg_fetch_assoc($cekstock);
      $stock = $pecah['stok'];
      if($kuantitas>$stock){
        echo "<script>
        alert ('Pesananmu melebihi stock');
        </script>";
        // header("location:../index-pasar.php");
        echo "<meta http-equiv='refresh' content='1;url=../index-pasar.php'>";
      }else{
    $query = pg_query($conn, "INSERT INTO keranjang (id_keranjang,id_produk,id_pemilik,jumlah,status) VALUES ('$id_keranjang','$id_produk','$id_pemilik','$kuantitas',1)");
    header("location:../check-out.php?id=$id_keranjang");
      }
    // $no_pemesanan=generateRandomString();
    // $tanggal=date('Y-m-d');

    // $query = pg_query("INSERT INTO pemesanan (no_pemesanan, id_pemilik, tgl_pesan, status) 
    //                                   VALUES ('$no_pemesanan', '$username', '$tanggal', 1);");

    // $querydetail= pg_query("INSERT INTO public.detail_pemesanan (
    //   no_pemesanan, id_produk, kuantitas) VALUES (
    //   '$no_pemesanan', '$id_pemilik, $kuantitas);");
    // $loop = pg_query("SELECT * from keranjang where id_pemilik='$username' and status=1");
    // while ($data = pg_fetch_array($loop)) {
      // Insert into detail
      // $id_produk= $data['id_produk'];
      // $kuantitas= $data['jumlah'];
      // $id_keranjang = $data['id_keranjang'];
      // $detailquery = pg_query("INSERT INTO detail_pemesanan (no_pemesanan, id_produk, kuantitas) 
                                                    //  VALUES ('$no_pemesanan','$id_produk',$kuantitas);");
      // $selectstock = pg_query("SELECT * from produk where id_produk='$id_produk'");
      // $datastock = pg_fetch_assoc($selectstock);
      // $stock = $datastock['stok'];
      // $sisa = $stock - $jml_barang;
      // $updatestock = pg_query("UPDATE produk SET stok =$sisa WHERE id_produk = '$id_produk';") ;
      // $updatekeranjang = pg_query("UPDATE keranjang SET status =2 WHERE id_keranjang = '$id_keranjang';") ;
      // header("location:../index-keranjang.php?pesanan=berhasil");

    // header("location:../form-checkout.php?id_produk=$id_produk&kuantitas=$kuantitas");
  }

  if(isset($_POST['keranjang'])){  
  
 
      $cekstock = pg_query("SELECT * FROM produk where id_produk='$id_produk'");
      $pecah=pg_fetch_assoc($cekstock);
      $stock = $pecah['stok'];
      if($kuantitas>$stock){
        echo "<script>
        alert ('Pesananmu melebihi stock');
        </script>";
        // header("location:../index-pasar.php");
        echo "<meta http-equiv='refresh' content='1;url=../index-pasar.php'>";
      }else{
            $query = pg_query($conn, "INSERT INTO keranjang (id_keranjang,id_produk,id_pemilik,jumlah,status) VALUES ('$id_keranjang','$id_produk','$id_pemilik','$kuantitas',1)");
      header("location:../index-keranjang.php");
      }


      
  }
?>