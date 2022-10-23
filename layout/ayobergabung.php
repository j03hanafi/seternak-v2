<section class="bergabung" style="background-image: url(assets/bergabung.png); background-size: cover;
  height: 100%; padding: 2rem 1rem;" class="img-fluid">
  <h1 class="display-6 text-light bold fw-bold text-center" class="responsive-font-example">Ayo Bergabung Dengan Kami</h1>
   <div class="d-flex justify-content-center mt-4">
        <?php 
            if(!$_SESSION){
        ?>
        <a href="regis.php" type="button" class="btn btn-light mx-1 text-success shadow">Daftar</a>
        <a href="login.php" type="button" class="btn mx-1 text-success shadow hijau text-light">Masuk</a>
        <?php } ?>
  </div>
</section>