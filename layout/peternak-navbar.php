
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark hijau shadow fixed-top">
    <div class="container">
        <a class="navbar-brand" href="index.php#home">
            <img src="assets/logop.png" alt="" width="30" height="30" class="d-inline-block align-text-top">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ">
            <a class="mx-4 nav-link text-light " aria-current="page" href="index-produksaya.php">Produk Saya</a>
            <!-- <a class="mx-4 nav-link  text-light" href="index-dashboard.php">Dashboard</a> -->
            <a class="mx-4 nav-link  text-light" href="index-tanya-ahli.php">Tanya Ahli</a>
            <a class="mx-4 nav-link text-light" href="index-forum.php">Diskusi</a>
            <!-- <a class="mx-4 nav-link text-light" href="index-laporan.php">Laporan</a> -->
        </div>
            <div  class="ms-auto">
            <ul class="navbar-nav ">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Hi, <?php echo $username; ?>
                        </a>


                        <ul class="dropdown-menu dropdown-menu-dark" style="background-color: #0e8550;" aria-labelledby="navbarDarkDropdownMenuLink">
                            <li><a class="dropdown-item" href="index-profile-peternak.php">Profile</a></li>
                            <li><a class="dropdown-item" href="so-belumbayar-peternak.php">Status Order</a></li>
                            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<!-- Navbarend -->