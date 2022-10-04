<?php
session_start();
require('function-user.php');
$obj = new Db_Class();
$error = '';
$username = $_SESSION['username'];

if (isset($_POST['submit']) and !empty($_POST['submit'])){
    $uname = $_POST['username'];
    $query =pg_query($dbconn,"SELECT * FROM public.user WHERE username='$uname'");
    $cekid =  pg_affected_rows($query);
    if($cekid!=0){
        $error =  'Username sudah digunakan !!';
    }else{
        $ret_val = $obj->createUser();
        if($ret_val==1){
        echo '<script>'; 
        echo 'alert("Record Saved Successfully");'; 
        if($_POST['role']==1){
            $ret_val2 = $obj->tambahMitra();
            if($ret_val2==1){
            echo 'window.location.href = "read-user.php";';
            }
        }else if($_POST['role']==2){
            $ret_val1 = $obj->tambahPeternak();
            if($ret_val1==1){
            echo 'window.location.href = "read-partner.php";';
            }
            
        }
        
        echo '</script>';
        }
    }
}

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
    <title>Tambah User</title>
  </head>
  <body>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
    
    <?php
    include('layout/admin-navbar.php');
    ?>
    
    <div class="container"style="padding-top:100px;padding-bottom:5%;"> 
        <div class="card" >
             <div class="card-header shadow-sm bg-body rounded" style="background-color: white;">
              <div class="card-title ps-3 fw-bold">Form Tambah User/Partner</div>
            </div>
            <div class="card-body">
                <!-- <h5 class="card-title">Special title treatment</h5> -->
                <?php if($error != ''){ ?>
                        <div class="alert alert-danger" role="alert"><?= $error; ?></div>
                    <?php } ?>    
                <!-- formulir-user -->
        <form action="" method="post">
            <div class="container">
                <div class="mb-3" >
                    <label for="exampleFormControlInput1" class="form-label">Name</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="name" name="name" required>
                </div>
                <div class="mb-3" >
                    <label for="exampleFormControlInput1" class="form-label">Username</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="username" name="username" require>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" name="email" require>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="password" name="password" require>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Role</label>
                    <select class="form-select" aria-label="Default select example" name="role" require>
                        <option value="1" >User</option>
                        <option value="2">Partner</option>
                        <option value="3">Admin</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">No. Telp</label>
                    <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="08XXXXXXX" name="contact" require>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">City</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Kota Payakumbuh" name="kota" require>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Address</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="alamat" require></textarea>
                </div>
                
                <input type="submit" class="btn btn-success" name="submit" value="Submit">
            </div>  
        </form>
            <!-- formulir-user -->

            </div>
        </div>
    </div> 


    <?php
    include('layout/admin-footer.php');
    ?>
</html>