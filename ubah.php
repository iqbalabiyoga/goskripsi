<!DOCTYPE html>
<html>

<head>
    <title>GoSkripsi-Repository Skripsi Inspiratif</title>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<?php
    include 'headadmin.php';
    include 'connect.php';
     $id=$_GET['idskripsi'];
        $skripsis=mysqli_query($connect,"select * from skripsi where id_skripsi = '$id'");
        $skripsi=mysqli_fetch_array($skripsis);
        $nim=$skripsi['nim_mhs'];
        $mahasiswas=mysqli_query($connect,"select * from mahasiswa where nim_mhs ='$nim'");
        $mahasiswa=mysqli_fetch_array($mahasiswas);
        $idlab=$skripsi['kode_lab'];
        $labs=mysqli_query($connect,"select * from lab_riset where kode_lab='$idlab'");
        $lab=mysqli_fetch_array($labs);
    
        
        include "connect.php";
        $nim=$skripsi['nim_mhs'];
        $mahasiswas=mysqli_query($connect,"select * from mahasiswa where nim_mhs='$nim'");
        $mahasiswa=mysqli_fetch_array($mahasiswas);?>

    <body>
        <div class="container">
            <div>
                <h5>Formulir Edit Data Skripsi<br></h5>
                <form action="edit.php?idskripsi=<?php echo $id?>" method="post" class="col s12">
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
                            <input id="judul" type="text" name="judul" class="validate" value="<?php echo $skripsi['judul']?>" required>
                            <label for="judul">Judul Skripsi</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s8">
                            <input id="topik" type="text" name="topik" class="validate" value= "<?php echo $skripsi[ 'topik']?>" required>
                            <label for="topik">Topik Skripsi</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s8">
                            <input id="tahun" type="text" name="tahun" class="validate" value="<?php echo $skripsi[ 'tahun_terbit']?>" required>
                            <label for="tahun">Tahun Terbit</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s8">
                            <input id="dosen_pembimbing" type="text" name="dosen_pembimbing" class="validate" value="<?php echo $skripsi[ 'dosen_pembimbing']?>" required>
                            <label for="dosen_pembimbing">Dosen Pembimbing </label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s8">
                            <input id="file" type="text" name="file" class="validate" value="<?php echo $skripsi[ 'nama_file']?>" required>
                            <label for="file">URL Repository IPB </label>
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
                                    <option <?php if($skripsi['kode_lab']==$id) echo "selected"?> value="<?php echo $id;?>">
                                        <?php echo $nome; ?>
                                    </option>
                                    <?php
							}
							?>
                            </select>

                        </div>
                    </div>
                    
                    <button type="submit" name="benar" value="1" class="waves-effect waves-light btn">Perbarui Skripsi Ini</button>

                </form>
            </div>
        </div>
    </body>

    <?php require 'footer.php'?>

</html>