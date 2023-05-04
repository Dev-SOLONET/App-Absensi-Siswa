<?php
require_once('../config/koneksi.php');

if (isset($_POST['jadwal']) && isset($_POST['keterangan']) && isset($_POST['id_kelas']) && isset($_POST['npm'])) {
	$jadwal   	    = $_POST['jadwal'];
	$keterangan 	= $_POST['keterangan'];
	$id_kelas 	    = $_POST['id_kelas'];
	$npm 			= $_POST['npm'];
	$sql = $conn->prepare("INSERT INTO absensi (jadwal, keterangan, id_kelas, npm) VALUES (?, ?, ?, ?)");
	$sql->bind_param('ssdd', $jadwal, $keterangan, $id_kelas, $npm);
	$sql->execute();
	if ($sql) {
		//echo json_encode(array('RESPONSE' => 'SUCCESS'));
		header("location:../readapi/tampil.php");
	} else {
		echo json_encode(array('RESPONSE' => 'FAILED'));
	}
} else {
	echo "GAGAL";
}