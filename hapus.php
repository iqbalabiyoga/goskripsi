<?php
session_start();
$id=$_GET['idskripsi'];
include 'connect.php';
mysqli_query($connect, "delete from kata_kunci where idskripsi='$id'");
mysqli_query($connect, "DELETE FROM `skripsi` WHERE `skripsi`.`id_skripsi` ='$id'");
echo "<script language='javascript'>alert('Penghapusan Skripsi Berhasil Dilakukan')</script>";
echo "<script>document.location.href='adminhome.php'</script>";