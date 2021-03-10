<?php
session_start();
include('create.php?action=loginUser');
?>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="header-top">
    <div class="container">
        <div class="container-fluid">
            <div class="d-flex justify-content-between">
                <div class="text-left py-2 text-white" style="font-size: 12px;">
                    <i class="fas fa-mobile"></i> Download Aplikasi TokoOnlen
                </div> 
                <div class="text-right py-2" style="font-size: 12px;">
                    <?php
                    if (isset($_SESSION['status'])) {
                        null;
                    ?>
                    <?php } else { ?>
                        <a href="userRegister.php" class="text-white text-bold">Daftar User</a> |
                    <?php } ?>

                    <?php
                    if (isset($_SESSION['status'])) {
                    ?>
                        <a href="merchantMe.php" class="text-white text-bold"><i class="fas fa-store"></i> Toko Saya</a>
                        
                        <span href="" class="text-white">| <i class="fa fa-user-circle"></i> Hi! <?php echo $_SESSION['namaCustomer'] ?> | <a href="logout.php" class="text-white">Sign Out <i class="fa fa-sign-out" aria-hidden="true"></i> </a></span>
                    <?php } else {
                    ?>
                        <a href="login.php" class="text-white">Login</a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="header-second">
    <div class="container">
        <div class="container-fluid">
            <div class="row py-3">
                <div class="col-md-3 text-white text-bold">
                   <h5>Toko Onlen</h5>   
                   <small class="mb-lg-2">Belinya Susah, Mahal Harganya</small>
                </div>
                <div class="col-md-6">
                    <div class="input-group">
                        <input type="text" placeholder="Cari Disini!" style="border-radius:10px 0px 0px 10px" class="form-control">
                        <div class="input-group-append">
                            <button class="btn btn-white  fa fa-search text-primary input-group-text"></button>
                        </div>
                    </div>
                </div>
                <div class="col-md-3  d-flex justify-content-between mb-3">
                    <a style="font-size:24px;" href="dashboard.php" class="badge badge-light text-primary"><i class="fas fa-home"></i> </a>
                    <span style="font-size:24px;" class="badge badge-light text-primary"><i class="fas fa-cart-plus"></i></span>
                </div>
            </div>
        </div>
    </div>
</div>