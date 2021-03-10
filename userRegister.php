<!doctype html>
<html lang="en">

<head>
    <title>Register User | Toko Onlen</title>
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
            <div class="row d-flex justify-content-center">

                <div class="col-md-5 mt-5">
                    <div>
                        <?php
                        if (isset($_GET['success'])) {
                        ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                                <strong class="text-light">Berhasil Daftar!</strong>
                            </div>
                        <?php }
                        if (isset($_GET['fail'])) {
                        ?>
                            <div class="alert alert-danger bg-warning alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                                <strong class="text-white" >Gagal, Silahkan dicoba Lagi!</strong>
                            </div>
                        <?php
                        } else {
                            null;
                        }
                        ?>
                    </div>
                    <div class="card nice mt-5">
                        <div class="card-header bg-info">
                            <h5 class="text-white"> Form Register User</h5>
                        </div>
                        <div class="card-body">
                            <form method="post" action="create.php?action=addUser">
                                <div class="form-group">
                                    <small class="text-muted">Nama Lengkap </small>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-light text-info" id="my-addon"><i class="fas fa-edit    "></i></span>
                                        </div>
                                        <input class="form-control" name="namaCustomer" type="text" aria-label="Recipient's " aria-describ bg-dark text-whiteedby="my-addon">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <small for="" class="text-muted">Username</small>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-light text-info" id="my-addon"><i class="fa fa-user-circle-o" aria-hidden="true"></i></span>
                                        </div>
                                        <input class="form-control" name="username" type="text" aria-label="Recipient's " aria-describ bg-dark text-whiteedby="my-addon">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <small class="text-muted" for="">Password</small>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-light text-info" id="my-addon"><i class="fa fa-key" aria-hidden="true"></i></span>
                                        </div>
                                        <input class="form-control" name="password" type="password" aria-label="Recipient's " aria-describ bg-dark text-whiteedby="my-addon">
                                    </div>
                                </div>
                                <button type="submit" name="submit" class="btn btn-info px-4"><i class="fa fa-plus-square" aria-hidden="true"></i> Daftar</button>
                                <div class="text-muted mt-1">Sudah Punya Akun? <span class="ml-2"> <a href="login.php" class="badge badge-success">Login </a></span></div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>