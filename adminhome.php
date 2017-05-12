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
    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
</head>

<body>
    <?php
    session_start();
    if(!isset($_SESSION['admin'])) echo "<script>document.location.href='forbid.php'</script>";
    include 'headadmin.php';
    include 'connect.php';
    $hitungs=mysqli_query($connect,"select count(*) as jum from skripsi");
    $hitung=mysqli_fetch_array($hitungs);
    $jum=$hitung['jum'];?>
        <div>
            <center><h4> Skripsi Terdaftar
       </h4>
            <h6>Total <strong><?php echo $jum ?> skripsi</strong> terdaftar pada Database GoSkripsi</h6></center>
            <table class="bordered striped">
                <thead>
                    <th>
                        Judul Skripsi
                    </th>
                    <th>
                        Nama Mahasiswa
                    </th>
                    <th>
                        Topik Skripsi
                    </th>
                    <th>
                        Lab Riset
                    </th>
                    <th>Verifikasi</th>
                    <th>Kelola</th>
                    <th></th>
                    <th>Update Terakhir</th>
                </thead>

                <?php
            $skripsis=mysqli_query($connect,"select * from skripsi order by id_skripsi asc");?>
                    <?php while($skripsi=mysqli_fetch_array($skripsis)){
            $nim=$skripsi['nim_mhs'];
            $mahasiswas=mysqli_query($connect,"select * from mahasiswa where nim_mhs ='$nim'");
            $mahasiswa=mysqli_fetch_array($mahasiswas);
            $idlab=$skripsi['kode_lab'];
            $idskripsi=$skripsi['id_skripsi'];
            $labs=mysqli_query($connect,"select * from lab_riset where kode_lab='$idlab'");
            $lab=mysqli_fetch_array($labs);?>
                        <tr>
                            <td width=45%>
                                <a href='detail_skripsi.php?idskripsi=<?php echo $idskripsi?>'>
                                    <?php echo $skripsi['judul'] ?>
                                </a>
                            </td>
                            <td width=18%>
                                <?php echo $mahasiswa['nama_mhs']?>
                            </td>
                            <td>
                                <?php echo $skripsi['topik']?>
                            </td>
                            <td>
                                <?php echo $lab['nama']?>
                            </td>
                            <td width=16%>
                                <?php if($skripsi['verifikasi']==0) echo
                                "<a class='waves-effect waves-light btn purple' href='verifikasi.php?idskripsi=$idskripsi'>
                                    Verifikasi
                                </a>"; else echo "<a class='waves-effect waves-light btn teal'>
                                    <i class='material-icons'>turned_in</i>Terverifikasi
                                </a>";?>
                            </td>
                            <td width=2%>
                                <a class="waves-effect waves-light btn cyan" href="ubah.php?idskripsi=<?php echo $idskripsi ?>"><i class="material-icons">mode_edit</i></a>
                            </td>
                            <td width=2%>
                                <a class="waves-effect waves-light btn red modal-trigger" href="#hapus<?php echo $idskripsi ?>"><i class="material-icons">delete</i></a>
                            </td>
                            <td width=20%>
                                <?php if($skripsi['waktu_update']>0) echo $skripsi['waktu_update'] ?>
                            </td>

                        </tr>

                        <!-- Modal Structure -->
                        <div id="hapus<?php echo $idskripsi ?>" class="modal">
                            <div class="modal-content">
                                <h5>Konfirmasi Hapus Skripsi</h5>
                                <p>Apakah Anda ingin menghapus skripsi berjudul <strong>"<?php echo $skripsi['judul']?>"</strong> dari skripsi terdaftar?</p>
                            </div>
                            <div class="modal-footer">
                                <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Batal</a>
                                <a href="hapus.php?idskripsi=<?php echo $idskripsi ?>" class="modal-action modal-close waves-effect waves-green btn-flat">Hapus</a>
                            </div>
                        </div>


                        <?php } ?>
            </table>
            <script>
                $(document).ready(function () {
                    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
                    $('.modal-trigger').leanModal();
                });
            </script>


        </div>


<?php require 'footer.php'?>

</html>