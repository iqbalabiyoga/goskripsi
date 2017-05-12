<!DOCTYPE html>
<html>

<head>
    <title>GoSkripsi-Repository Skripsi Inspiratif</title>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.css" media="screen,projection" />

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>
    <?php session_start();
    if(isset($_SESSION['admin'])) include 'headadmin.php'; else
    include 'header.php';
    include 'connect.php';
    $id=$_GET['idskripsi'];
        $skripsis=mysqli_query($connect,"select * from skripsi where id_skripsi = '$id'");
        $skripsi=mysqli_fetch_array($skripsis);
        $nim=$skripsi['nim_mhs'];
        $mahasiswas=mysqli_query($connect,"select * from mahasiswa where nim_mhs ='$nim'");
        $mahasiswa=mysqli_fetch_array($mahasiswas);
        $idlab=$skripsi['kode_lab'];
        $labs=mysqli_query($connect,"select * from lab_riset where kode_lab='$idlab'");
        $lab=mysqli_fetch_array($labs);?>
        <div class="container">
            <br>
            <br>
            <h5>Rincian Skripsi</h5>
            <div class="row">
                <div class="card col s4">
                    <br>
                    <img width=100px src="foto/ipb_logo.png">
                    <strong><h5><?php echo $skripsi['judul']?></h5></strong>
                    <h6><strong><?php echo $mahasiswa['nama_mhs']?></strong></h6>
                    <h7 class="grey-text">
                        <?php echo $mahasiswa['nim_mhs']?>
                    </h7>
                </div>
                <div class="col s6">
                    <br>
                    <br>
                    <div class="row">
                        <div class="col s1">
                        </div>
                        <div class="col s3">
                            Topik
                        </div>
                        <div class="col s8">
                            :
                            <?php echo $skripsi['topik']?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s1">
                        </div>
                        <div class="col s3">
                            Dosen Pembimbing
                        </div>
                        <div class="col s8">
                            :
                            <?php echo $skripsi['dosen_pembimbing']?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s1">
                        </div>
                        <div class="col s3">
                            Lab Riset
                        </div>
                        <div class="col s8">
                            :
                            <?php echo $lab['nama']?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s1">
                        </div>
                        <div class="col s3">
                            Tahun Terbit
                        </div>
                        <div class="col s8">
                            :
                            <?php echo $skripsi['tahun_terbit']?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s1">
                        </div>
                        <div class="col s3">
                            Kata Kunci
                        </div>
                        <div class="col s8">
                            :
                            <?php
                                $katakunci=mysqli_query($connect,"select * from kata_kunci where idskripsi='$id'");
                                while($kuncis=mysqli_fetch_array($katakunci)){
                                $kunci=$kuncis['katakunci'];
                                echo $kunci.", ";
                            }?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s1">
                        </div>
                        <div class="col s3">
                            Unduh File
                        </div>
                        <div class="col s8">
                            : <a href="<?php echo $skripsi['nama_file']?>">URL Repository IPB</a>
                        </div>
                    </div>
                    <?php if($skripsi['verifikasi']==1){?>
                        <div class="row">
                            <div class="col s1">
                            </div>
                            <div class="col s9">
                                <h5 class="white-text teal lighten-2"><i class="material-icons">turned_in</i>Sudah diverifikasi</h5>
                            </div>
                        </div>
                        <?php } ?>
                </div>
            </div>
        </div>

</body>