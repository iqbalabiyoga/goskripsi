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

<body>
    <?php
        session_start();
        include 'header.php';
        include 'connect.php'?>
    <form method="get">
        <input type="search" name="katakunci" placeholder="Cari skripsi berdasarkan kata kunci">
    </form>
    <div class="container">
        <h4> Cari Inspirasi Skripsi di sini 
       </h4>
        <p>GoSkripsi secara umum bekerja seperti halnya sebuah repository skripsi. Pengguna bisa melakukan pencarian skripsi dengan mekanisme pemilihan berdasarkan kategori atau dengan bar pencarian yang disediakan
            <br>
        </p>
        <table>
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
            </thead>
        
        <?php
            $skripsis=mysqli_query($connect,"select * from skripsi");?>  
    <?php while($skripsi=mysqli_fetch_array($skripsis)){
            $nim=$skripsi['nim_mhs'];
            $mahasiswas=mysqli_query($connect,"select * from mahasiswa where nim_mhs ='$nim'");
            $mahasiswa=mysqli_fetch_array($mahasiswas);
            $idlab=$skripsi['kode_lab'];
            $labs=mysqli_query($connect,"select * from lab_riset where kode_lab='$idlab'");
            $lab=mysqli_fetch_array($labs);?>
            <tr>
                <td><a href='detail_skripsi.php?idskripsi=<?php echo $skripsi['id_skripsi']?>'><?php echo $skripsi['judul'] ?></a></td>
                <td><?php echo $mahasiswa['nama_mhs']?></td>
                <td><?php echo $skripsi['topik']?></td>
                <td><?php echo $lab['nama']?></td>
                <td><?php if($skripsi['verifikasi']==1) echo "Sudah Diverifikasi"?></td>
                
            </tr>
    
        <?php } ?>
        </table>
        
    </div>
</body>

<?php require 'footer.php'?>

</html>