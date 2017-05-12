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
$email=$_POST['email'];
$passwords=$_POST['password'];
$password=md5($passwords);
$queriku= mysqli_query($connect,"SELECT email, password FROM mahasiswa WHERE email='$email' AND password='$password'");
$kuerimu= mysqli_query($connect,"select * from mahasiswa where email='$email'");
$ambil= mysqli_fetch_assoc($kuerimu);
if (mysqli_fetch_array($queriku) > 0){
	echo "<script language='javascript'>alert('Login Berhasil!')</script>";
	session_start(); //menyimpan data login di browser supaya tetep login
	$_SESSION['user'] = $email;
    $_SESSION['nim']= $ambil['nim_mhs'];// simpen email di index user sebagai data user
    echo "<script>document.location.href='index.php'</script>";
}
else echo "<script language='javascript'>alert('Login Gagal Periksa Email dan Kata Sandi Anda!')</script>";
}
?>
<body>
    <?php 
    require 'header.php'
    ?>
<div class="container">
    <h4>Masuk ke Akun GoSkripsi</h4>
    <p>Belum punya Akun? <br> <a href="signup.php">Daftar</a></p>
     <form action=""  method="post" class="col s12">
    <div class="row">
        <div class="input-field col s6">
            <input id="email" type="email" name="email"class="validate">
            <label for="email" data-error="Format Email tidak sesuai">Email</label>
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
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
</body>

<?php

require 'footer.php';

?>

</html>