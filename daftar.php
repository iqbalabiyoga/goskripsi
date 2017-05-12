<!doctype html>
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
    session_start();
    if(empty($_SESSION['user'])){
        echo "<script language='javascript'> alert('Silakan Login sebagai user terlebih dahulu!')</script>";
        echo "<script>document.location.href = 'signin.php';</script>";}
        
        include "connect.php";
        $nim=$_SESSION['nim'];
        $mahasiswas=mysqli_query($connect,"select * from mahasiswa where nim_mhs='$nim'");
        $mahasiswa=mysqli_fetch_array($mahasiswas);
        if(isset($_POST['daftar'])){ // kondisi di klik
        $nama_mhs= $_POST['nama_mhs']; //nampung sementara, $_POST itu sesuai yg dipake di form, yg dalam kurung sesuai name
        $email= $_POST['email'];
        $nim_mhs= $_POST['nim_mhs'];
		$judul=$_POST['judul'];
		$topik=$_POST['topik'];
		$file=$_POST['file'];
		$dosen_pembimbing=$_POST['dosen_pembimbing'];
		$lab_riset=$_POST['lab_riset'];
		$tahun=$_POST['tahun'];
		$katakunci1=$_POST['katakunci1'];
		$katakunci2=$_POST['katakunci2'];
		$katakunci3=$_POST['katakunci3'];
		
      $queriku= mysqli_query($connect,"INSERT INTO skripsi(nim_mhs,judul, topik , dosen_pembimbing, kode_lab,tahun_terbit,nama_file)
 VALUES('$nim_mhs','$judul','$topik', '$dosen_pembimbing','$lab_riset', '$tahun','$file')");
	$idskripsi= $connect->insert_id;
	//$ambil=mysqli_query($connect, "SELECT id_skripsi FROM skripsi WHERE id_skripsi=$idskripsi");
	$kunci1=mysqli_query($connect,"INSERT INTO kata_kunci(katakunci,idskripsi) VALUES ('$katakunci1','$idskripsi')");
	$kunci2=mysqli_query($connect,"INSERT INTO kata_kunci(katakunci,idskripsi) VALUES ('$katakunci2','$idskripsi')");
	$kunci3=mysqli_query($connect,"INSERT INTO kata_kunci(katakunci,idskripsi) VALUES ('$katakunci3','$idskripsi')");
   if($queriku){
	   
        echo "<script language='javascript'>alert('Mendaftar Berhasil!')</script>";
        
   }
   else echo "<script language='javascript'>alert('Mendaftar Gagal!')</script>";            
        }
        ?>
    <body>
       <?php include 'header.php';?>
    <div class="container">
        <h4>Pendaftaran Skripsi ke Database GoSkripsi</h4>
        <p class="section">
            Unggah skripsi karyamu ke sini untuk dapat menjadi inspirasi dan referensi bagi pejuang skripsi yang lain.
        </p>
        <div>
            <h5>Formulir Pengunggahan Skripsi<br></h5>
                <form action=""  method="post" class="col s12">
				    <div class="row">
                        <div class="input-field col s8">
                            <input id="nama" type="text" name="nama_mhs" class="validate" value="<?php echo $mahasiswa['nama_mhs']?>" required>
                            <label for="nama">Nama Mahasiswa</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s8">
                            <input id="nim" type="text" name="nim_mhs" class="validate" value="<?php echo $mahasiswa['nim_mhs']?>" required>
                            <label for="nim">Nomor Induk Mahasiswa</label>
                        </div>
                    </div>
                       <div class="row">
                        <div class="input-field col s8">
                            <input id="email" type="text" name="email" class="validate" value="<?php echo $mahasiswa['email']?>" required>
                            <label for="email">Alamat Email</label>
                        </div>
                    </div>
					<div class="row">
                        <div class="input-field col s8">
                            <input id="judul" type="text" name="judul" class="validate" required>
                            <label for="judul">Judul Skripsi</label>
                        </div>
                    </div>
					
					<div class="row">
                        <div class="input-field col s8">
                            <input id="topik" type="text" name="topik" class="validate" required>
                            <label for="topik">Topik Skripsi</label>
                        </div>
                    </div>
					
					<div class="row">
                        <div class="input-field col s8">
                            <input id="tahun" type="number" name="tahun" class="validate" max="<?php echo date('Y')?>" required>
                            <label for="tahun">Tahun Terbit</label>
                        </div>
                    </div>
					
					<div class="row">
                        <div class="input-field col s8">
                            <input id="dosen_pembimbing" type="text" name="dosen_pembimbing" class="validate" required>
                            <label for="dosen_pembimbing">Dosen Pembimbing </label>
                        </div>
                    </div>
					
					<div class="row">
                        <div class="input-field col s8">
                            <input id="file" type="text" name="file" class="validate" required>
                            <label for="file">URL Repository IPB </label>
                        </div>
                    </div>
				
					<div class="row">
                        <div class="input-field col s8">
                            <input id="katakunci1" type="text" name="katakunci1" class="validate" required>
                            <label for="katakunci1">Kata Kunci 1</label>
                        </div>
                    </div>
					
					
					<div class="row">
                        <div class="input-field col s8">
                            <input id="katakunci2" type="text" name="katakunci2" class="validate" required>
                            <label for="katakunci2">Kata Kunci 2</label>
                        </div>
                    </div>
					
					<div class="row">
                        <div class="input-field col s8">
                            <input id="katakunci3" type="text" name="katakunci3" class="validate" required>
                            <label for="katakunci3">Kata Kunci 3</label>
                        </div>
                    </div>
					
				
					<div class="row">
						<div class="input-field col s8">
							<select class="browser-default" name="lab_riset">
							<option>Pilih Lab Riset</option>
								<?php 
									require('connect.php');
									$query = mysqli_query($connect, "SELECT * FROM lab_riset order by kode_lab ASC");
									$num_righe = mysqli_num_rows($query);
									for($x=0; $x<$num_righe; $x++)
									{
									$rs = mysqli_fetch_row($query);
									$id = $rs[0];
									$nome = $rs[1];
									?>
						<option value="<?php echo $id;?>"> <?php echo $nome; ?></option>
							<?php
							}
							?>
							</select>
            
						</div>
                    </div>       
					
                    <div class="row">
                        <input type="checkbox" id="test5" name="setuju" value="ya" required/>
                        <label for="test5">Dengan ini saya menyatakan setuju dengan <a href="#syarat" class="modal-trigger">Syarat dan Ketentuan Layanan</a></label>
                    </div>
                    <button class="btn waves-effect waves-light" type="submit" name="daftar" value="Sign Up">Daftar
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