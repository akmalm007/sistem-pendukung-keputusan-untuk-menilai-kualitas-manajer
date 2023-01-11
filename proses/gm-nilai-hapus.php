<?php
include '../koneksi.php';
$id_gm = $_GET['fk_id_manajer'];

mysqli_query($db,
	"DELETE FROM penilaian
	WHERE fk_id_manajer = '$id_gm'"
);

header("location:../halaman-gm.php?p=gm");
?>