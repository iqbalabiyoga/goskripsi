<!DOCTYPE html>
<html>

<head>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<?php
include "connect.php";
if(isset($_POST['login'])){
$nama=$_POST['nama'];
$password=$_POST['password'];
$queriku= mysqli_query($connect,"SELECT nama, password FROM admin WHERE nama='$nama' AND password='$password'");
if (mysqli_fetch_array($queriku) > 0){
	echo "<script language='javascript'>alert('Login Sebagai Admin Berhasil!')</script>";
	session_start(); //menyimpan data login di browser supaya tetep login
	$_SESSION['admin'] = $nama;
    echo "<script>document.location.href='adminhome.php'</script>";
}
else echo "<script language='javascript'>alert('Login Gagal Periksa nama dan Kata Sandi Anda!')</script>";
}
?>
<body>
    <?php 
    require 'headadmin.php'
    ?>
<div class="container">
    <h4>Masuk sebagai Admin</h4>
    <p>Belum punya Akun? <br> <a href="signup.php">Daftar</a></p>
     <form action=""  method="post" class="col s12">
    <div class="row">
        <div class="input-field col s6">
            <input id="nama" type="text" name="nama"class="validate">
            <label for="nama" data-error="Format nama tidak sesuai">Nama</label>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s6">
            <input id="password" type="password" name="password"class="validate">
            <label for="password">Password</label>
        </div>
    </div>
      <button class="btn waves-effect waves-light" type="submit" name="login" value="1">Login
    <i class="material-icons right">send</i>
  </button>
  </form>
    </div>
    
</body>

<?php

require 'footer.php';

?>

</html>