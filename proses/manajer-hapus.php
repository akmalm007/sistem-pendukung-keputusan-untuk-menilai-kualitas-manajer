<?php
include'../koneksi.php';
$id_mnj=$_GET['id_mnj'];

mysqli_query($db,
	"DELETE FROM tb_manajer
	WHERE id_mnj='$id_mnj'"
);

header("location:../halaman-admin.php?p=manajer");
?>