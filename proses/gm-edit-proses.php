<?php
include '../koneksi.php';
$id_gm = $_POST['id_gm'];
$nama = $_POST['nama'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$alamat = $_POST['alamat'];
$agama = $_POST['agama'];
	
	mysqli_query($db,
		"UPDATE tb_gm
		SET nama='$nama', jeniskelamin='$jenis_kelamin', alamat='$alamat', agama = '$agama' 
		WHERE id_gm='$id_gm'"
	);
	header("location:../index.php?p=gm");

?>
