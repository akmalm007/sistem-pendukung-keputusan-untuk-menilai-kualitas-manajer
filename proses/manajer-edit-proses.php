<?php
include '../koneksi.php';
$id_manajer = $_POST['id_manajer'];
$nama = $_POST['nama'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$divisi = $_POST['divisi'];
$alamat = $_POST['alamat'];
$agama = $_POST['agama'];
	
	mysqli_query($db,
		"UPDATE tb_manajer
		SET nama='$nama', jeniskelamin='$jenis_kelamin', divisi = '$divisi', alamat='$alamat', agama = '$agama' 
		WHERE id_mnj='$id_manajer'"
	);
	header("location:../index.php?p=manajer");

?>
