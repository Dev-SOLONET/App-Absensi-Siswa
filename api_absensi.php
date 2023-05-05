<?php
require('koneksi.php');

//tanggal hari ini
$jadwal    	= date("Y-m-d");
$keterangan = 'Hadir';
$id_kelas   = '002';
$uid       	= $_POST['uid'];

// pecah uid (array) menjadi 2 karakter
$uid        = explode(' ', $uid);
$string_uid = implode('', $uid);

$npma       = mysqli_query($koneksi, "SELECT npm, nama FROM siswa WHERE uid='$string_uid'");
$npm1       = mysqli_fetch_assoc($npma);
if(!$npm1){
	echo 'Gagal Absen!'	;
	exit();
}
$npm       	= $npm1['npm'];

$check_absensi = mysqli_query($koneksi, "SELECT * FROM absensi WHERE npm='$npm' AND jadwal='$jadwal'");
if (mysqli_num_rows($check_absensi) > 0) {
	echo 'Anda sudah absen!';
	exit();
}

$result = mysqli_query($koneksi, "INSERT INTO absensi (jadwal, keterangan, id_kelas, npm) VALUES ('$jadwal', '$keterangan', '$id_kelas', '$npm')");
if ($result) {
	// echo $npm1['nama']." berhasil absen";
	echo 'Berhasil Absen!';
	/* echo json_encode(array(
		'RESPONSE' 	=> 'SUCCESS',
		'siswa' 	=> $npm1['nama'],
	)); */
	// header("location: tampil.php");
} else {
	echo json_encode(array('RESPONSE' => 'FAILED'));
}

