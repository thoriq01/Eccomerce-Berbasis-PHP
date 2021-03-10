
<?php
include('koneksi.php');
$database = new Database();
$action = $_GET['action'];
// if ($action == "add") {
//     //insert customer
//     $sqlcustomer = "insert into customer (uniqID_Customer,email_customer,nama_customer,bod_customer,phone_customer)
//     values ('$uniqID','" . $_POST['inputEmail'] . "','" . $_POST['inputName'] . "','" . $_POST['inputBOD'] . "','" . $_POST['inputPhone'] . "')";
//     $hasil = $jalur->insert($sqlcustomer);

//     //insert alamat
//     $sqladdress = "insert into alamat (id_customers,alamat)
//     values ('$uniqID','" . $_POST['inputAddress'] . "')";
//     $hasil = $jalur->insert($sqladdress);

//     //insert rekening
//     $sqlbank = "insert into rekening (id_customers,nomor_rekening,bank_rekening)
//     values ('$uniqID','" . $_POST['inputRekening'] . "','" . $_POST['inputBank'] . "')";
//     $hasil = $jalur->insert($sqlbank);

//     if ($hasil == true) {
//         header('location:index.php');
//     } else {
//         var_dump($hasil);
//     }
// }
if ($action == "addMerchant") {
    $koneksi = mysqli_connect('localhost', 'root', '', 'TokoOnline');
    $sqlMerchant = mysqli_query($koneksi, 'INSERT INTO Merchant(namaMerchant, tanggalBergabung, Id_User_M) 
    VALUES ("' . $_POST['namaMerchant'] . '" , CURDATE() , ' . $_POST['UserID'] . ')');
    if ($sqlMerchant) {
        header('location:merchantMe.php?success=1');
    } else {
        // header('location:merchant.php?fail=0');
        echo '' . $koneksi->error;
    }
}
if ($action == "addUser") {
    $koneksi = mysqli_connect('localhost', 'root', '', 'TokoOnline');

    $sqlUser = mysqli_query($koneksi, 'INSERT INTO User(namaCustomer,username,user_password)
        VALUES("' . $_POST['namaCustomer'] . '" ,"' . $_POST['username'] . '","' . md5($_POST['password']) . '")');
    if ($sqlUser) {
        header('location:login.php?success');
    } else {
        header('location:userRegister.php?fail');
    }
}
if ($action == "loginUser") {
    $koneksi = mysqli_connect('localhost', 'root', '', 'TokoOnline');
    $username = $_POST['username'];
    $password = md5($_POST['user_password']);
    $query = mysqli_query($koneksi, 'SELECT * FROM User WHERE username ="' . $username . '" AND user_password="' . $password . '" ');
    $cek = mysqli_num_rows($query);
    if ($cek) {
        session_start();
        $data = mysqli_fetch_array($query);
        $_SESSION['username'] = $username;
        $_SESSION['status'] = 'user';
        $_SESSION['IDUser'] = $data['IDUser'];
        $_SESSION['Id_User_M'] = $data['Id_User_M'];
        $_SESSION['namaCustomer'] = $data['namaCustomer'];
        $_SESSION['status'] = 'login';
        // header('location:dashboard.php');
        echo '<link rel="stylesheet" href="sweetalert.all.min.css">';
        echo '<script src="sweetalert.all.min.js"></script>';
        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { Swal.fire({title:"Berhasil Login!",icon:"success",text:"Selamat Datang '.$data['namaCustomer'].'",timer:1500,showConfirmButton:false}).then((result)=>{ window.location.href = \'dashboard.php\'});';
        echo '}, 200);</script>';
    } else {
        header('location:login.php?fail');
        // var_dump($cek , $koneksi->error);
    }
}
if($action=="addProduk"){
    $koneksi = mysqli_connect('localhost', 'root', '', 'TokoOnline');
    $MerchantId=$_POST['IdMerchant'];
    $query = mysqli_query($koneksi,'INSERT INTO Produk (namaProduk,deskripsiProduk,gambarProduk, kondisiProduk,Kategori,Id_Merchant_M)
    VALUES("'.$_POST['namaProduk'].'","'.$_POST['deskripsiProduk'].'","'.$_POST['gambarProduk'].'","'.$_POST['kondisiProduk'].'","'.$_POST['kategori'].'",'.$MerchantId.' )');
    if($query){
        echo '<link rel="stylesheet" href="sweetalert.all.min.css">';
        echo '<script src="sweetalert.all.min.js"></script>';
        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { Swal.fire({title:"Sukses",icon:"success",text:"Berhasil di Tambah!",timer:1500}).then((result)=>{ window.location.href = \'merchantMe.php\'});';
        echo '}, 200);</script>';
    }
    else{
        echo ''. $koneksi->error;   
    }
}
$id = $_GET['id'];
if($action=='editProduk'){
    $koneksi=mysqli_connect('localhost','root','','TokoOnline');
    $query=mysqli_query($koneksi,'UPDATE Produk SET namaProduk="'.$_POST['namaProduk'].'", deskripsiProduk="'.$_POST['deskripsiProduk'].'",gambarProduk="'.$_POST['gambarProduk'].'",
    kondisiProduk="'.$_POST['kondisiProduk'].'", Kategori="'.$_POST['kategori'].'"WHERE IDProduk="'.$_POST['IDProduk'].'" ');
    if($query){
        echo '<link rel="stylesheet" href="sweetalert.all.min.css">';
        echo '<script src="sweetalert.all.min.js"></script>';
        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { Swal.fire({title:"Sedang Mengupdate",timer:2000,showConfirmButton:false,
               onOpen: () => {Swal.showLoading();}}).then((result =>{ Swal.fire({title:"Berhasil Di Edit",icon:"success",timer:2000,showConfirmButton:false}) })).then((result)=>{ window.location.href = \'merchantMe.php\'});';
        echo '}, 200);</script>';
    }
    else {
        echo ''. $koneksi->error;
    }
}


