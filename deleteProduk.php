<?php 
    session_start();
    $id = $_POST['id'];
    $koneksi = mysqli_connect('localhost','root','','TokoOnline');
    $query = mysqli_query($koneksi,'DELETE FROM Produk WHERE IDProduk="'. $id .'"');
    if($query){ 
        echo json_encode(['success'=> 'Sukses']);
    }
    else{
        echo 'Fail';
    }
?>