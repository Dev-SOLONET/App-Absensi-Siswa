<?php
	include "koneksi.php";
	$tgl_absen=$_GET['jadwal'];
	
    $sql="DELETE FROM absensi WHERE jadwal='$tgl_absen'";
	
	
	
	if($res_siswa=mysqli_query($koneksi,$sql)){
		?> <script>alert('Hapus Data Berhasil')</script><?php
		echo '<META HTTP-EQUIV="Refresh" Content="0; URL=lihatabsensi.php">';		
	}else{
		?> <script>alert('Simpan Data Gagal');history.go(-1);</script><?php		
	}
	
?>