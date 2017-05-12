<?php 
include 'connect.php';
$id=$_GET['idskripsi'];
mysqli_query($connect,"update skripsi set verifikasi=1 where id_skripsi='$id'");
echo"<script language='javascript'>alert('Verifikasi Skripsi Berhasil')</script>";
echo"<script>document.location.href='adminhome.php'</script>";