<?php
include'../koneksi.php';
$id_gm=$_GET['id_gm'];

mysqli_query($db,
	"DELETE FROM tb_gm
	WHERE id_gm='$id_gm'"
);

header("location:../index.php?p=gm");
?>