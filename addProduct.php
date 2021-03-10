<?php
session_start();
?>
<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="my-modal-title">Form Tambah Produk</h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="create.php?action=addProduk">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <small>Nama Produk</small>
                                <input type="text" class="form-control" name="namaProduk">
                            </div>
                            <div class="form-group col-md-6">
                                <small>Gambar Produk</small>
                                <input type="text" class="form-control" name="gambarProduk">
                            </div>
                        </div>
                        <div class="form-group">
                            <small>Deskripsi Produk</small>
                            <input type="text" class="form-control" name="deskripsiProduk">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <small>Kondisi Produk</small>
                                <input type="text" class="form-control" name="kondisiProduk">
                            </div>
                            <div class="form-group">
                                <small>Kategori</small>
                                <select name="kategori" class="form-control" id="">
                                    <option value="elektronik">Elektronik</option>
                                    <option value="makanan">Makanan</option>
                                    <option value="pakaian">Pakaian</option>
                                    <option value="perlengkapan">Perlengkapan Rumah</option>
                                </select>
                            </div>
                        </div>
                        <input type="hidden" name="IdMerchant" value="<?php echo $_SESSION['IDUser'] ?>">
                        <button type="submit" class="btn btn-info"><i class="fa fa-plus-square-o" aria-hidden="true"></i> Tambah Produk</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>