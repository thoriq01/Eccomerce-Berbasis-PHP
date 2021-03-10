<?php
session_start();
session_destroy();
echo '<link rel="stylesheet" href="sweetalert.all.min.css">';
echo '<script src="sweetalert.all.min.js"></script>';
echo '<script type="text/javascript">';
echo 'setTimeout(function () { Swal.fire({title:"Sukses",icon:"success",text:"Berhasil Logout!",timer:1500,showLoader:true,showConfirmButton:false}).then((result)=>{ window.location.href = \'dashboard.php\'});';
echo '}, 200);</script>';

// header('location:dashboard.php?success=logout')
?>
