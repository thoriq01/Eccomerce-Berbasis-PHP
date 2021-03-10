<?php
session_start();
$koneksi = mysqli_connect('localhost', 'root', '', 'TokoOnline');
$query = mysqli_query($koneksi, 'SELECT * FROM  User , Merchant WHERE IDUser="' . $_SESSION['IDUser'] . '" AND Id_User_M ="' . $_SESSION['IDUser'] . '"');
$query1 = mysqli_query($koneksi, 'SELECT * FROM Produk, Merchant WHERE Id_User_M="' . $_SESSION['IDUser'] . '" AND Id_Merchant_M="' . $_SESSION['IDUser'] . '" ');
$data =    mysqli_fetch_array($query);
$count = mysqli_num_rows($query);
$data1 = mysqli_fetch_array($query1);
$count1 = mysqli_num_rows($query1);
?>
<!doctype html>
<html lang="en">
<style>
    .card-produk {
        box-shadow: 1px 2px 4px gray;
    }
</style>

<head>
    <title>Title</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="sweetalert.all.min.css">
</head>

<body>
    <?php require('header.php'); ?>
    <div class="container">
        <div class="container-fluid">
            <?php
            if (isset($_GET['success']) && $_GET['success'] == 1) {
            ?>
                <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <strong>Berhasil Daftar !</strong>
                </div>
            <?php
            }
            ?>
            <?php
            if ($data['Id_User_M'] !== 0 && $data['Id_User_M'] == $_SESSION['IDUser']) {
            ?>
                <?php
                $query = mysqli_query($koneksi, 'SELECT * FROM  User , Merchant WHERE IDUser="' . $_SESSION['IDUser'] . '" AND Id_User_M ="' . $_SESSION['IDUser'] . '"');
                while ($data = mysqli_fetch_assoc($query)) {
                ?>
                    <div class="card col-lg-4 mt-4">
                        <div class="card-body text-primary">
                            <h5> <i class="fas fa-store"></i> <?php echo  $data['namaMerchant'] ?></h5>
                            <small class="text-muted"> Bergabung Pada : <?php echo $data['tanggalBergabung'] ?> </small>
                        </div>
                    </div>
                <?php
                }
                ?>
                <div class="text-title mt-4">
                    <h5>List Produk Saya</h5>
                    <button class="btn btn-small btn-primary" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus-square" aria-hidden="true"></i> Tambah</button>
                </div>
                <?php require('addProduct.php'); ?>
                <?php
                if ($count1 == 0) {
                ?>
                    <div class="text-center mt-5">
                        <h5 style="font-size: 100px;" class="text-muted"><i class="fa fa-info-circle" aria-hidden="true"></i></h5>
                        <h5 style="font-size:60px" class="text-danger">oops!</h5>
                        <h5 class="text-muted">Produk Kosong, Silahkan Tambah Produk Dulu Bro</h5>
                    </div>
                <?php } else {
                ?>
                    <div class="row mt-2">
                        <?php
                        $query1 = mysqli_query($koneksi, 'SELECT * FROM Produk, Merchant WHERE Id_User_M="' . $_SESSION['IDUser'] . '" AND Id_Merchant_M="' . $_SESSION['IDUser'] . '" ');
                        while ($data1 = mysqli_fetch_array($query1)) {
                        ?>
                            <div class="col-md-3" id="<?php echo $data1['IDUser']; ?>">
                                <div class="card card-produk">
                                    <img style="background-image: url('');" alt="" src="<?php echo $data1['gambarProduk']; ?> " class="card-img-top top-1" srcset="">
                                    <div class="card-body text-kecil">
                                        <span class="text-primary" id="namaProduk" <?php echo $data1['IDProduk'] ?>><?php echo substr($data1['namaProduk'], 0, 20) . '[..]'; ?></span>
                                        <br />
                                        <small class="text-primary"><i class="fas fa-eye"></i> Dilihat 2000</small>
                                        <p class="card-subtitle text-muted t-s">
                                            <i class="mt-2 fa fa-star checked"></i>
                                            <i class="mt-2 fa fa-star checked"></i>
                                            <i class="mt-2 fa fa-star checked"></i>
                                            <i class="mt-2 fa fa-star checked-fill"></i>
                                            <i class="mt-2 fa fa-star"></i>
                                            (7.2)
                                        </p>
                                        <i class="fa fa-comment-o text-success" aria-hidden="true"></i> 42 Komentar
                                    </div>
                                    <div class="d-flex p-1">
                                        <button onclick="edit(<?php echo $data1['IDProduk'] ?>)" data-toggle="modal" data-target="#myModal<?php echo $data1['IDProduk'] ?>" class="btn btn-light btn-small text-dark border-warning w-50 m-1"><i class="fas fa-edit"> Edit</i></button>
                                        <button id="<?php echo $data1['IDProduk'] ?>" onclick="deleteProduk(<?php echo $data1['IDProduk'] ?>);" class="btn btn-danger btn-small text-white w-50 m-1"><i class="fa fa-trash-o" aria-hidden="true"> Hapus</i> </button>
                                    </div>
                                </div>
                            </div>
                            <?php require('editProduk.php'); ?>
                        <?php
                        } ?>
                    </div>
                <?php
                } ?>
            <?php
            } else {
            ?>
                <div class="col-md-5 mt-4">
                    <div class="alert bg-warning alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <div class="d-flex">
                            <div class="w-25 text-center">
                                <i style="font-size: 40px;" class="fa fa-info-circle" aria-hidden="true"></i>
                            </div>
                            <div class="w-75 py-2">
                                <strong>Anda Belum Mempunyai Toko!</strong>
                            </div>
                        </div>
                    </div>
                    <a class="badge badge-info p-3" href="merchant.php">Buat Toko Anda <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i> </a>
                </div>
            <?php } ?>
            <br>
        </div>
    </div>
    <script>
        function edit(id) {
            console.log(id);
            var x = document.getElementById(id);
            console.log(x);
        }
    </script>
    <script>
        function deleteProduk(id) {
            Swal.fire({
                title: "Apakah Anda ingin Menghapus?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: "#d93725",
                confirmButtonText: "Hapus",
                cancelButtonText: "Tidak",
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: 'deleteProduk.php',
                        type: 'post',
                        dataType: 'json',
                        data: {
                            id: id
                        },
                        success: function() {
                            Swal.fire({
                                timer: 1000,
                                title: "Memproses",
                                allowEscapeKey: false,
                                allowOutsideClick: false,
                                onOpen: () => {
                                    Swal.showLoading();
                                }
                            }).then((result) => {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil Di Hapus',
                                    timer: 1000,
                                    showConfirmButton: false,
                                    allowEscapeKey: false,
                                    allowOutsideClick: false,
                                }).then((result) => {
                                    location.reload();
                                })
                            })
                        }
                    })

                } else {
                    Swal.fire({
                        icon: "error",
                        text: "Tidak ada Perubahan!",
                        timer: 900,
                    })
                }
            })
        }
    </script>
    <script src="sweetalert.all.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>