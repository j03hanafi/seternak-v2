<?php 
$validate='';
	if(isset($_GET['pesan'])){
		if($_GET['pesan']=="gagal"){
			$validate = 'Username dan Password tidak sesuai !';
		}elseif($_GET['pesan']=="activate"){
      $validate = 'Akun belum aktif';
    }
	}
	
  
	?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

     <!-- icon boostrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">

    <title>Masuk Seternak</title>
    <style>
        body{
            background-image: url(assets/bg-login.png);
            background-attachment: fixed;
            background-position: center center;
            background-repeat: no-repeat;
            background-size:cover;
        }
        #kartu{
            margin:50px auto;
            margin-top: 10%;;
           
        }
       
    </style>
</head>
<body>
<div class="container">

  <div id="kartu" class="card" style="max-width: 800px;border:none;">
    <div class="row g-0">
      <div class="col-md-6">
        <div class=text-center>
        <!-- <img src="assets/ayam1.jpg" class="img-fluid" alt="...""> -->
        <div class="card bg-dark text-white" style="border:none;">
        <img src="assets/crop.png" class="img-fluid" alt="..."style="border:none;">
          <div class="card-img-overlay text-start" style="margin-top:35%;">
            <h4 class="card-title">Masuk</h4>
            <p class="card-text">Silahkan masukkan email dan password untuk melanjutkan akses</p>
          </div>
        </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card-body">

          <ul class="list-group list-group-horizontal">
            <li class="list-group-item" style="border: none"><img src="assets/logop.jpg" class="img-fluid" alt="..." style="max-width: 25px;"></li>
            <li class="list-group-item" style="border: none;align:text-end;"><b><h5 class="card-title" style="color:#0E8550;">Seternak</h5></b></li>
          </ul>
          <ul class="list-group list-group-horizontal">
            <li class="list-group-item" style="border: none"><h5 class="card-tittle" style="color:#0E8550;">Selamat Datang di Seternak</h5></li>
          </ul>
        
          <div style="padding:12px;">
            <form action="cek_login.php" method="post">
              <?php if($validate != '') {?>
                    <p class="text-danger"><?= $validate; ?></p>
              <?php }?>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Username</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Username" name="username" required>
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Password</label>

                <div class="d-flex bd-highlight">
                <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="Password" name="password" required>
                <span id=showPassword data-toggle="tooltip" class="btn btn-success" title="Lihat Password"><i id="icon" class="bi bi-eye pt-2 text-light"></i></span>
                </div>

              </div>
              <div class="d-grid gap-2">
                <input type="submit" class="btn btn-success" name="submit" value="Masuk">
              </div>
            </form>

            <ul class="list-group">
              <li class="list-group-item d-flex justify-content-between align-items-center" style="border: none">
                <small><a href="forgot_pass.php" class="link-success">Lupa Password?</a></small>
              <small><a href="regis.php" class="link-success">Belum punya akun?<b>Daftar</b></a></small>
              </li>
            </ul>
            
          </div>
        
        </div>
      </div>
    </div>
  </div>
  </div>
</div>
</body>
</html>

<script>
    var showPassword = document.getElementById('showPassword')
    var password = document.getElementById('password')
    var icon = document.querySelector('#showPassword i')


    showPassword.addEventListener('click', function(e) {
      if (password.type === 'password') {
        password.setAttribute('type', 'text')
        icon.classList.remove('bi bi-eye-slash')
        icon.classList.add('bi bi-eye')
      } else {
        password.setAttribute('type', 'password')
        icon.classList.remove('bi bi-eye')

        icon.classList.add('bi bi-eye-slash')

      }

    })
  </script>

<?php 
if(isset($_GET['activated'])){
  if($_GET['activated']=="true"){
    
?>
<script>alert('Akun anda telah aktif'); </script>
<?php   }
}
?>