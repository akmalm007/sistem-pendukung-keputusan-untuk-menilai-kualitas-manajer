<?php
include '../koneksi.php';
$id_manager = $_POST['id_manajer'];
$nama = $_POST['nama'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$divisi = $_POST['divisi'];
$alamat = $_POST['alamat'];
$agama = $_POST['agama'];
	
$query_manajer = mysqli_query($db, "INSERT INTO tb_manajer (id_mnj, nama, divisi, jeniskelamin, alamat, agama)
value ('$id_manager','$nama','$divisi', '$jenis_kelamin','$alamat','$agama')");

if ($query_manajer) {
	header("location:../halaman-admin.php?p=manajer");

} else {
	echo 'Gagal tersimpan';

}
?>