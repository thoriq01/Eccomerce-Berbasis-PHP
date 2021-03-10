<?php include('create.php');
session_start();
$koneksi = mysqli_connect('localhost', 'root', '', 'TokoOnline');

?>
<!doctype html>
<html lang="en">

<head>
    <title>Daftar Merchant</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">    
</head>

<body>
    <div class="container">
        <div class="container-fluid">
            <div class="d-flex justify-content-center mt-5">
                <div class="col-md-5 mt-5">
                    <div class="card nice">
                        <div class="card-header bg-info">
                            <h5 class="text-white"> Form Register Merchant </h5>
                        </div>
                        <div class="card-body">
                            <form method="post" action="create.php?action=addMerchant">
                                <div class="form-group">
                                    <small class="text-muted">Nama Merchant</small>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-light text-info" id="my-addon"><i class="fas fa-store"></i></span>
                                        </div>
                                        <input class="form-control" name="namaMerchant" type="text" aria-label="Recipient's " aria-describ bg-dark text-whiteedby="my-addon">
                                    </div>
                                </div>
                                <input type="hidden" name="UserID" value="<?php echo $_SESSION['IDUser'] ?>">
                                <button type="submit" name="submit" class="btn btn-info px-4"><i class="fa fa-plus-square" aria-hidden="true"></i> Daftar</button>
                                <div class="text-muted mt-1">Sudah Punya Akun? <span class="ml-2"> <a href="login.php" class="badge badge-success">Login </a></span></div>
                            </form>
                        </div>
                    </div>
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
                    if (isset($_GET['fail']) && $_GET['fail'] == 0) {
                    ?>
                        <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                            <strong>Gagal, Silahkan Daftar Kembali !</strong>
                        </div>
                    <?php } else {
                        return false;
                    }

                    ?>
                </div>
                
            </div>
        </div>
    </div>
    <style>
        body {
            background-color: rgb(221, 232, 241);
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>