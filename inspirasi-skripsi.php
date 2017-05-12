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
        session_start();
        include "connect.php";
        ?>

    <body>
        <?php include 'header.php'?>


            <div class="container">
                <?php if (isset($_GET['caris'])){
                        $key=$_GET['katakunci'];
                        $lab=$_GET['lab_riset'];
                        $hasils=mysqli_query($connect,"select * from skripsi where (judul like '%$key%' or topik like '%$key%') and kode_lab like '%$lab%' order by verifikasi desc");
                        $ress=mysqli_query($connect,"select * from skripsi where (judul like '%$key%' or topik like '%$key%') and kode_lab like '%$lab%' order by verifikasi desc");
                        $res=mysqli_fetch_array($ress);
                        $jums=mysqli_query($connect,"select count(id_skripsi) as jum from skripsi where (judul like '%$key%' or topik like '%$key%') and kode_lab like '%$lab%' order by verifikasi desc");
                        $jum=mysqli_fetch_array($jums);?>
                    <br>
                    <h5>Hasil Pencarian Skripsi</h5>
                    <div class="row">
                        <form method="get">
                            <div class="row">
                                <div class="input field col s6">
                                    <select class="browser-default" name="lab_riset" id="lab_riset">
                                        <option value=''>Semua Lab Riset</option>
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
                                            <option <?php if($id==$lab) echo "selected";?> value="<?php echo $id;?>">
                                                <?php echo $nome; ?>
                                            </option>
                                            <?php
							}
						?>
                                    </select>
                                </div>
                                <div class=col s2>
                                </div>
                                <div class="col s3">
                                    <input type="search" name="katakunci" value="<?php echo $key ?>" placeholder="Cari Skripsi">
                                </div>
                                <div class="col s1">
                                    <button class="waves-effect waves-light btn" type="submit" name="caris" value="1"><i class="material-icons">search</i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <?php if($res>0){?>
                        <h6>Berikut adalah <strong><?php echo $jum['jum'] ?> skripsi</strong> yang cocok dengan kriteria pencarian</h6>
                        <div id="hasilcari" class="row">
                            <table class="striped">
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
                                    <th>
                                        Verifikasi
                                    </th>
                                </thead>
                                <?php while($hasil=mysqli_fetch_array($hasils)){ 
                        $idskrip=$hasil['id_skripsi'];
                        $nim=$hasil['nim_mhs'];
                        $mahasiswas=mysqli_query($connect,"select * from mahasiswa where nim_mhs ='$nim'");
                        $mahasiswa=mysqli_fetch_array($mahasiswas);
                        $idlab=$hasil['kode_lab'];
                        $labs=mysqli_query($connect,"select * from lab_riset where kode_lab='$idlab'");
                        $lab=mysqli_fetch_array($labs);?>
                                    <tr>
                                            <td>
                                                <a href='detail_skripsi.php?idskripsi=<?php echo $idskrip?>'>
                                                    <?php echo $hasil['judul'] ?>
                                                </a>
                                            </td>
                                            <td width=25%>
                                                <?php echo $mahasiswa['nama_mhs']?>
                                            </td>
                                            <td>
                                                <?php echo $hasil['topik']?>
                                            </td>
                                            <td>
                                                <?php echo $lab['nama']?>
                                            </td>
                                            <td width=17% class="teal-text">
                                                <?php if($hasil['verifikasi']==1) echo "<i class='material-icons'>turned_in</i>Sudah Diverifikasi"?>
                                            </td>

                                        </tr>


                                    <?php } ?>
                            </table>
                        </div>
                        <?php } else echo "Maaf, kata kunci <strong>'$key'</strong> tidak cocok dengan skripsi apapun";} else {?>
                            <h4> Cari Inspirasi Skripsi di sini 
       </h4>
                            <p>GoSkripsi secara umum bekerja seperti halnya sebuah repository skripsi. Pengguna bisa melakukan pencarian skripsi dengan mekanisme pemilihan berdasarkan Kode Lab atau dengan bar pencarian yang disediakan
                                <br>
                            </p>
                            <h5>Cari Berdasarkan Kategori<br></h5>
                            <form method="get">
                                <div class="row">
                                    <div class="input field col s6">
                                        <select class="browser-default" name="lab_riset" id="lab_riset">
                                            <option value=''>Semua Lab Riset</option>
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
                                                <option value="<?php echo $id;?>">
                                                    <?php echo $nome; ?>
                                                </option>
                                                <?php
							}
						?>
                                        </select>
                                    </div>
                                    <div class=col s2>
                                    </div>
                                    <div class="col s3">
                                        <input type="search" name="katakunci" placeholder="Cari Skripsi">
                                    </div>
                                    <div class="col s1">
                                        <button class="waves-effect waves-light btn" type="submit" name="caris" value="1"><i class="material-icons">search</i></button>
                                    </div>
                                </div>
                            </form>
                            <table class="striped">
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
                                    <th>
                                        Verifikasi
                                    </th>
                                </thead>

                                <?php
            $skripsis=mysqli_query($connect,"select * from skripsi order by verifikasi desc");?>
             <?php while($skripsi=mysqli_fetch_array($skripsis)){
            $nim=$skripsi['nim_mhs'];
            $idskripsi=$skripsi['id_skripsi'];
            $mahasiswas=mysqli_query($connect,"select * from mahasiswa where nim_mhs ='$nim'");
            $mahasiswa=mysqli_fetch_array($mahasiswas);
            $idlab=$skripsi['kode_lab'];
            $labs=mysqli_query($connect,"select * from lab_riset where kode_lab='$idlab'");
            $lab=mysqli_fetch_array($labs);?>
                                        <tr>
                                            <td>
                                                <a href='detail_skripsi.php?idskripsi=<?php echo $idskripsi?>'>
                                                    <?php echo $skripsi['judul'] ?>
                                                </a>
                                            </td>
                                            <td width=25%>
                                                <?php echo $mahasiswa['nama_mhs']?>
                                            </td>
                                            <td>
                                                <?php echo $skripsi['topik']?>
                                            </td>
                                            <td>
                                                <?php echo $lab['nama']?>
                                            </td>
                                            <td width=17% class="teal-text">
                                                <?php if($skripsi['verifikasi']==1) echo "<i class='material-icons'>turned_in</i>Sudah Diverifikasi"?>
                                            </td>

                                        </tr>

                                        <?php } ?>
                            </table>

            </div>
            <?php } ?>
    </body>


</html>