<?php
 session_start();
 if($_SESSION['role']!="3"){
    header("location:login.php?pesan=gagal");
}
$username = $_SESSION['username'];
 require('function-user.php');
 $obj = new Db_Class();

 $user = $_SESSION['user'];
 if(isset($_POST['update']) and !empty($_POST['update'])){
     $ret_val = $obj->updateUser();
     if($ret_val==1){
        echo '<script type="text/javascript">'; 
        echo 'alert("Record Updated Successfully");'; 
        echo 'window.location.href = "read-user.php";';
        echo '</script>';
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
              <div class="card-title ps-3 fw-bold">Form Update User</div>
            </div>
            <div class="card-body">
                <!-- <h5 class="card-title">Special title treatment</h5> -->
            
                <!-- formulir-user -->
                <form action="" method="post">
                    <div class="container">
                        <div class="mb-3" >
                            <label for="exampleFormControlInput1" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" value="<?=$user->name?>">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Email address</label>
                            <input type="text" class="form-control" value= "<?=$user->email?>" name="email" >
                        </div>
                        <!-- <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" value= "<?=$user->password?>">
                        </div> -->
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Role</label>
                            <select class="form-select" aria-label="Default select example" name="role">
                                
                                <?php
                                    $role = $user->role;
                                    if($role == 1){
                                        echo'<option selected value="1">User</option>';
                                        echo'<option value="2">Partner</option>';
                                    }else{
                                        echo'<option selected value="1">Partner</option>';
                                        echo'<option value="1">User</option>';
                                    }
                                ?>
                                                                
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">No. Telp</label>
                            <input type="number" class="form-control" name="contact" value= "<?=$user->contact?>"">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">City</label>
                            <input type="text" class="form-control" name="kota" value= "<?=$user->kota?>">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Address</label>
                            <textarea class="form-control" rows="3" name="alamat" ><?=$user->alamat?></textarea>
                        </div>
                       
                        <input type="hidden" name="id" value= "<?=$user->username?>">
                        <input type="submit" class="btn btn-success" name="update" value="Update">
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