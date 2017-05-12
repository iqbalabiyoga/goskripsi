<!DOCTYPE html>
<html>
<?php
	include "connect.php";
	if(isset($_GET['sort'])){
			$sort = $_GET['sort'];
			$sort = "AND s.kode_lab='$sort'"; 
		}
		else{
			$sort = "";
		}
	if(isset($_GET['page'])){
			$pg = $_GET['page'];
			$offset = $_GET['page'] - 1;
			$offset = $offset*5;
		}
		else{
			$pg = "";
			$offset = 0;
		}
	$sqlbuatpage=mysqli_query($connect,"SELECT s.judul, s.nim_mhs, s.topik, s.nama_file,s.dosen_pembimbing, s.tahun_terbit FROM skripsi s inner join lab_riset l WHERE s.kode_lab=l.kode_lab $sort");
	$banyakdata = mysqli_num_rows($sqlbuatpage);
	
?>
<head>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

 <?php
        $ampil=mysqli_query($connect,"SELECT s.id_skripsi,s.judul, s.nim_mhs, s.topik, s.nama_file,s.dosen_pembimbing, s.tahun_terbit, s.kode_lab, s.verifikasi FROM skripsi s inner join lab_riset l WHERE s.kode_lab=l.kode_lab $sort LIMIT $offset, 5");
		?>

<body>
    <?php 
		include 'header.php'
	?>
	
	
    <div class="container">
        <?php $kodelabs=mysqli_fetch_array($ampil);
                $kodelab=$kodelabs['kode_lab'];
            $labs=mysqli_query($connect,"select * from lab_riset where kode_lab='$kodelab'");
            $lab=mysqli_fetch_array($labs);
            $namalab=$lab['nama'];?>
        <strong><h5> Hasil Pencarian Skripsi - Lab Riset : <?php echo $namalab ?> </h5></strong>
    
		<table cellpadding="5" cellspacing="0"border="1" class="striped">
			<thead>
				 <th> Judul </th>
				 <th> NIM Mahasiswa </th>
				 <th> Topik </th>
				 <th> URL </th>
				 <th> Dosen Pembimbing </th>
				 <th> Tahun Terbit </th>
                <th></th>
			 </thead>
	  
	  
		
		<?php while ($skripsi=mysqli_fetch_array($ampil)) {?>
		
		<tr>
		
            <td><a href="detail_skripsi.php?idskripsi=<?php echo $skripsi['id_skripsi']?>"><?php echo $skripsi['judul'];?></a></td>
				<td><?php echo $skripsi['nim_mhs'];?></td>
				<td><?php echo $skripsi['topik'];?></td>
            <td width=30%><a href="<?php echo $skripsi['nama_file'];?>"><?php echo $skripsi['nama_file'];?></a></td>
				<td><?php echo $skripsi['dosen_pembimbing'];?></td>
				<td><?php echo $skripsi['tahun_terbit'];?></td>
                <td><?php if ($skripsi['verifikasi']==1) echo "Sudah Diverifikasi"?></td>
		</tr>
		
		<?php }
			$page = ceil($banyakdata/5);
		?>
	</table>
		<ul class="pagination">
			<li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
			<?php 
				for($i=1;$i<=$page;$i++){
			?>
			<li class="<?php if($pg == $i) {echo 'active';}?>"><a href="skripsi-proses.php?<?php if(isset($_GET['sort'])){echo "sort=".$sort;} ?>page=<?php echo $i ?>"><?php echo $i ?></a></li>
				<?php }  ?>
			<li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
		</ul>
		
        
    </div>
    
	
           
</body>

<?php require 'footer.php'?>


</html>