<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <link rel="stylesheet" href="sweetalert.all.min.css">
    <script src="sweetalert.all.min.js"></script>

    <title>Toko Onlen | Tempat Jual Beli Kucing beserta Pemilik </title>
</head>

<body>
    <?php include("header.php"); ?>
    <div class="container">
        <div class="container-fluid">
            <div class="row mt-3">
                <div class="col-md-3">
                    <div class="card flex-row flex-wrap p-1 card-3">
                        <div class="text-center mx-auto; w-25">
                            <img src="img/truck.svg" class="mt-3" width="30px" alt="">
                        </div>
                        <div class="text-white p-2 w-75 card-1 rounded">
                            <h6 class="text-title">Gratis Biaya Kirim</h6>
                        </div>
                    </div>
                    <div class="card flex-row flex-wrap p-1 mt-2 card-3">
                        <div class="text-center mx-auto; w-25">
                            <img src="img/money.svg" class="mt-3" width="30px" alt="">
                        </div>
                        <div class="text-white p-2 w-75 card-1 rounded">
                            <h6 class="text-title">Garansi Uang Kembali</h6>
                        </div>
                    </div>
                    <div class="card flex-row flex-wrap p-1 mt-2 card-3">
                        <div class="text-center mx-auto; w-25">
                            <img src="img/support.svg" class="mt-3" width="30px" alt="">
                        </div>
                        <div class="text-white p-2 w-75 card-1 rounded">
                            <h6 class="text-title">Layanan Customer 24 Jam</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card overflow-hidden border-0 rounded-0 text-center">
                        <img src="https://about.zination.com/wp-content/uploads/2018/05/ecommerce-banner11.png" height="232px" class="card-img cover" alt="...">
                        <div class="card-img-overlay d-flex flex-column justify-content-center">

                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-12">
                    <div class="">
                        <h5 class="text">Makanan Ringan dan Minuman </h5>
                    </div>
                </div>
            </div>
            <div class="row mb-2">
                <?php
                $koneksi = mysqli_connect('localhost', 'root', '', 'TokoOnline');
                $query = mysqli_query($koneksi, 'SELECT * FROM Produk');
                if ($query->num_rows != 0) {
                    while ($data = mysqli_fetch_array($query)) {
                ?>

                        <div class="col-md-2 py-1">
                            <div class="card nice">
                                <div class="top-top d-flex justify-content-center m-1">
                                    <img src="<?php echo $data['gambarProduk'] ?>" class="card-img-top rounded top-1" alt="">
                                </div>
                                <div class="card-body ">
                                    <a href="infoProduk.php?id=<?php echo $data['IDProduk'] ?>">
                                        <div class="card-title text-left text-capitalize card-height">
                                            <h5 class="middle-r"><?php echo substr($data['namaProduk'], 0, 24) . '..' ?></h5>
                                        </div>
                                    </a>
                                    <div class="text text-small text-primary">
                                        <span class="badge badge-danger" style="font-size: 10px;">40<i class="fa fa-percent" aria-hidden="true"></i></span><small class="text-muted"><del style="font-size:10px">Rp.672.900</del></small>
                                        <br>
                                        <small> Rp. 422.000 </small>
                                    </div>
                                    <div class="mt-1">
                                        <div class="mt-1 t-s">
                                            <i class="bi bi-star-fill checked"></i>
                                            <i class="bi bi-star-fill checked"></i>
                                            <i class="bi bi-star-fill checked"></i>
                                            <i class="bi bi-star-fill checked-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            (7.2)
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php }?>
                <?php
                    }else{
                ?>
                <div class="row w-100 d-block mt-5">
                    <div class="text-center text-danger">
                        <i style="font-size: 100px;" class="fas fa-search"></i>
                        <p style="font-size: 40px;">Wah Produk Kosong Bos!</p>
                        <p>Tidak ada Produk, Penjual Belom Daftar!</p>
                        <p>Jadilah pendaftar Pertama dan Jadilah <span><i class="fas fa-money-bill-wave " style="font-size: 30px;"></i> Kaya</span></p>
                    </div>
                </div>
            <?php } ?>
            </div>
        </div>
    </div>
</body>

</html>