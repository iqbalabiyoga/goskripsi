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
        include 'connect.php';
        if(isset($_POST['daftar'])){ // kondisi di klik
        $nama= $_POST['nama']; //nampung sementara, $_POST itu sesuai yg dipake di form, yg dalam kurung sesuai name
        $email= $_POST['email'];
        $passwords= $_POST['password'];
        $password=md5($passwords);
        $nim= $_POST['nim'];
        
      $queriku= mysqli_query($connect,"INSERT INTO mahasiswa(nim_mhs, nama_mhs, email, password)
 VALUES('$nim','$nama','$email','$password') ");
   if($queriku){
        echo "<script language='javascript'>alert('Mendaftar Berhasil!')</script>";
        echo "<script>document.location.href='signin.php';</script>";
        
   }
   else echo "<script language='javascript'>alert('Mendaftar Gagal!')</script>";            
        }
        ?>
<body>

    <?php include 'header.php'?>

    <div class="container">
        <h5 class="row col s6">Pendaftaran</h5>

        <p class="row">Sudah Punya Akun?
            <br>
            <a href="signin.php">Sign In</a>
            <div class="row">
                <form action=""  method="post" class="col s12">
                    <div class="row">
                        <div class="input-field col s8">
                            <input id="nama" type="text" name="nama" class="validate" required>
                            <label for="nama">Nama Lengkap</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s8">
                            <input id="nim" type="text" name="nim" value="G64" class="validate" required>
                            <label for="nim">Nomor Induk Mahasiswa</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s8">
                            <input id="email" type="email" name="email" class="validate" required>
                            <label for="email" data-error="Format Email tidak sesuai">Email</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s8">
                            <input id="password" type="password" name="password" class="validate" required>
                            <label for="password">Password</label>
                        </div>
                    </div>
                    <div class="row">
                        <input type="checkbox" id="test5" name="setuju" value="ya" required>
                        <label for="test5">Dengan ini saya menyatakan setuju dengan <a class="modal-trigger" href="#syarat">Syarat dan Ketentuan Layanan</a></label>
                    </div>
                    <button class="btn waves-effect waves-light" type="submit" name="daftar" value="1">Daftar
                        <i class="material-icons right">assignment_ind</i>
                    </button>
                </form>
            </div>
    </div>
    <script>
        $('.modal-trigger').leanModal({
            dismissible: true, // Modal can be dismissed by clicking outside of the modal
            opacity: .5, // Opacity of modal background
            in_duration: 300, // Transition in duration
            out_duration: 200, // Transition out duration

        });
    </script>
    <!-- Modal Structure -->
    <div id="syarat" class="modal">
        <div class="modal-content">
            <h4>Syarat dan Ketentuan Layanan</h4> Dengan mencentang bagian ini, pengguna menyatakan setuju dengan hal-hal sebagai berikut :
            <ol>
                <li>Skripsi yang diterbitkan oleh pengguna pada sistem ini sepenuhnya merupakan Hak Cipta dan Tanggung Jawab Pengguna</li>
                <li>Pastikan bahwa skripsi yang diterbitkan telah mendapatkan persetujuan dan dinyatakan lulus/layak terbit</li>
                <li>Layanan repository GoSkripsi bersifat inspiratif, bukan untuk mengakomodasi plagiarisme</li>
                <li>Segala bentuk plagiarisme menjadi tanggung jawab pihak berwajib</li>
            </ol>
        </div>
        <div class="modal-footer">
            <a href="#test5" class=" modal-action modal-close waves-effect waves-green btn-flat">Setuju</a>
        </div>
    </div>
</body>

<?php require 'footer.php'?>

</html>