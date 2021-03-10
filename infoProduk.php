<?php
session_start();
$koneksi = mysqli_connect('localhost', 'root', '', 'TokoOnline');
$query = mysqli_query($koneksi, 'SELECT * FROM  User , Merchant WHERE IDUser="' . $_SESSION['IDUser'] . '" AND Id_User_M ="' . $_SESSION['IDUser'] . '"');
$data = mysqli_fetch_array($query);
?>
<!doctype html>
<html lang="en">

<head>
  <title>Info Produk</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="sweetalert.all.min.css">
  <script src="sweetalert.all.min.js"></script>
</head>
<?php include('header.php') ?>
<div class="container">
  <div class="container-fluid">
    <div class="row mt-5">
      <?php
      $query1 = mysqli_query($koneksi, 'SELECT * FROM Produk WHERE IDProduk=' . $_GET['id'] . '');
      while ($data1 = mysqli_fetch_array($query1)) {
      ?>
        <div class="col-md-4 ">
          <img src="<?php echo $data1['gambarProduk'] ?>" alt="" class="card-img-top card-2" srcset="">
        </div>
        <div class="col-md-5">
          <h4 class="text-bold"><?php echo $data1['namaProduk'] ?></h4>
          Terjual (2.030) | <i class="fa fa-star checked" aria-hidden="true"></i> 7.3 | <i class="fa fa-comment-o text-success" aria-hidden="true"></i> 230
          <h3 class="mt-2">Rp. 39.300</h3>
          <div class="">
            <div class="card-header bg-white border-top">
              <h5 class="text-primary"> Detail Produk</h5>
            </div>
            <div class="card-body">
              <table>
                <tr>
                  <td>Kondisi</td>
                  <td>:</td>
                  <td class="text-primary"><?php echo $data1['kondisiProduk'] ?></td>
                </tr>
                <tr>
                  <td>Berat</td>
                  <td>:</td>
                  <td class="text-primary">200 Ton</td>
                </tr>
                <tr>
                  <td>Kategori</td>
                  <td>:</td>
                  <td class="text-primary"><?php echo $data1['Kategori'] ?></td>
                </tr>
              </table>
              <h5 class="mt-2 text-primary">Deskripsi</h5>
              <div class="border"></div>
              <h6 class="text-dark mt-2"><?php echo $data1['deskripsiProduk'] ?></h6>
            </div>
          </div>

        </div>
        <div class="col-md-3">
        </div>
      <?php } ?>
    </div>
    <div class="row">
      <div class="col-md-12">
        <h5> <i class="fa fa-commenting text-primary" aria-hidden="true"></i> Komentar Produk</h5>
      </div>
    </div>
    <!-- Tambah Komentar -->
    <?php
    if (isset($_SESSION['status'])) {
    ?>
      <div class="row">
        <div class="col-md-9">
          <form name="myForm" action="" id="myForm">
            <div class="input-group">
              <input id="myInputs" onkeyup="myInput()" type="text" style="height: 50px" class="form-control" name="isiKomen">
              <input type="hidden" name="IDUser" value="<?php echo $data['IDUser']; ?>">
              <input type="hidden" name="IDProduk" value="<?php echo $_GET['id']; ?>">
              <div class="input-group-append">
                <button id="myButton" type="submit" class="btn btn-success" class="" disabled> <i class="fas fa-comment-dots"></i> Tambah Komentar</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    <?php } ?>
    <!-- Menampilkan Komentar -->
    <?php
    $query2 = mysqli_query($koneksi, 'SELECT * FROM Komentar JOIN User on User.IDUser = Komentar.Id_User_K WHERE Id_Produk_K=' . $_GET['id'] . ' ORDER BY Komentar.tanggalKomen ASC ');
    if (mysqli_num_rows($query2) > 0) {
      while ($data2 = mysqli_fetch_array($query2)) {
    ?>
        <div id="oke2" class="row my-2">
          <div class="col-md-2 py-2">
            <div class="d-block mx-auto">
              <img src="https://demos.creative-tim.com/argon-dashboard-pro/assets/img/theme/team-4.jpg" class="rounded-sm rounded-circle w-25" alt="" srcset="">
              <small> <?php echo $data2['namaCustomer'] ?> </small>
            </div>
          </div>
          <div class="col-md-7 bg-light" style="border-radius:15px">
            <h5 style="line-height: 40px;"><?php echo $data2['isiKomen'] ?></h5>
            <small><?php echo $data2['tanggalKomen'] ?></small>
          </div>
        </div>
      <?php
      }
    } else {
      ?>
      <div class="row my-5 d-block text-center">
        <p style="font-size: 80px;"><i class="fa fa-info-circle text-primary" aria-hidden="true"></i></p>
        <p style="margin-top: -40px;font-size:24px" class="text-primary">Belum ada Ulasan! <br> Jadilah orang pertama yang mengulas Produk Ini</p>
        <?php if (!$_SESSION['status']) {  ?>
          <button class="btn btn-light text-primary border-primary">Login Dulu</button>
        <?php } ?>
      </div>
    <?php
    } ?>
    <!-- End Menampilkan User -->
  </div>
</div>

<body>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script type="text/javascript">
      $('#myForm').on('submit',function() {
        $.ajax({
          type: 'post',
          url: 'addKomentar.php',
          cache: false,
          data: $(this).serialize(),
          dataType: 'json',
          success: function(data) {
            location.reload();
          }
        })
        return false;
      })
  </script>
  <script type="text/javascript">
    function myInput() {
      if (document.getElementById("myInputs").value.length != 0) {
        document.getElementById("myButton").disabled = false;
      } else {
        document.getElementById("myButton").disabled = true;
      }
    }
  </script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>