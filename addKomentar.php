<?php
session_start();
$_GET['id'];
$koneksi = mysqli_connect('localhost', 'root', '', 'TokoOnline');
$query = mysqli_query($koneksi, 'INSERT INTO Komentar (tanggalKomen, Id_Produk_K,isiKomen,Id_User_K)
    VALUES(CURDATE(),"' . $_POST['IDProduk'] . '","' . $_POST['isiKomen'] . '","' . $_POST['IDUser'] . '")');
if($query){
    echo json_encode(['success'=>'Sukses']);
}
else {
    echo json_encode(['fail'=>'Gagal']);
}
?>
