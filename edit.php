<?php
        include 'connect.php';
        $id=$_GET['idskripsi'];
        $nama_mhs= $_POST['nama_mhs']; //nampung sementara, $_POST itu sesuai yg dipake di form, yg dalam kurung sesuai name
        $email= $_POST['email'];
        $nim_mhs= $_POST['nim_mhs'];
		$judul=$_POST['judul'];
		$topik=$_POST['topik'];
		$file=$_POST['file'];
		$dosen_pembimbing=$_POST['dosen_pembimbing'];
		$lab_riset=$_POST['lab_riset'];
		$tahun=$_POST['tahun'];       
            
      $queriku= mysqli_query($connect,"update skripsi set nim_mhs = '$nim_mhs', judul = '$judul', topik = '$topik', dosen_pembimbing = '$dosen_pembimbing', kode_lab = '$lab_riset',tahun_terbit ='$tahun', nama_file = '$file' where id_skripsi='$id'");
            
   if($queriku){
	   
        echo "<script language='javascript'>alert('Pembaruan berhasil dilakukan!')</script>";
        echo "<script>document.location.href='adminhome.php'</script>";
        
   }
   else echo "<script language='javascript'>alert('Pembaruan Gagal!')</script>";            
        ?>