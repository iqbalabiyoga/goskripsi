<?php
        include "connect.php";
        // kondisi di klik
        $nama_mhs= $_POST['nama_mhs']; //nampung sementara, $_POST itu sesuai yg dipake di form, yg dalam kurung sesuai name
        $email= $_POST['email'];
        $password= $_POST['password'];
        $nim_mhs= $_POST['nim_mhs'];
		$judul=$_POST['judul'];
		$topik=$_POST['topik'];
		// $nama_file=$_FILES['nama_file'];
		$dosen_pembimbing=$_POST['dosen_pembimbing'];
		$lab_riset=$_POST['lab_riset'];
		
      $queriku= mysqli_query($connect,"INSERT INTO skripsi(nama_mhs, nim_mhs, email, password, judul, topik , dosen_pembimbing, lab_riset)
 VALUES('$nama_mhs','$nim_mhs','$email','$password','$judul','$topik', '$dosen_pembimbing','$lab_riset') ");
   if($queriku){
        echo "<script language='javascript'>alert('Mendaftar Berhasil!')</script>";
        
   }
   else echo "<script language='javascript'>alert('Mendaftar Gagal!')</script>";            
        
        ?>