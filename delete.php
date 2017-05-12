<?php
include 'connect.php';

$id=$_GET['kirim_id'];

$queriku=pg_query("delete from komentar where id='$id'");
	if($queriku == TRUE){
		echo "Data Berhasil dihapus";
	}
	
	else {
		echo "error";
	}
	?>
	
	