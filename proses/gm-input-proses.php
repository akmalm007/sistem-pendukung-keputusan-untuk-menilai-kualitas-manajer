<?php
include '../koneksi.php';
$id_gmanajer = $_POST['id_gm'];
$nama = $_POST['nama'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$alamat = $_POST['alamat'];
$agama = $_POST['agama'];
	
$query_manajer = mysqli_query($db, "INSERT INTO tb_gm (id_gm, nama, jeniskelamin, alamat, agama)
value ('$id_gmanajer','$nama', '$jenis_kelamin','$alamat','$agama')");

if ($query_manajer) {
	header("location:../halaman-admin.php?p=gm");

} else {
	echo 'Gagal tersimpan';

}
?>