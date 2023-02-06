<?php
include '../koneksi.php';
$id_mnj = $_POST['id_mnj'];
$evaluasi = $_POST['hasil_evaluasi'];

$sqlceknilai = "SELECT * FROM penilaian WHERE fk_id_manajer = $id_mnj";
$sqlcekmnj = "SELECT * from tb_manajer WHERE id_mnj = $id_mnj";
$cekquery = mysqli_query($db, $sqlcekmnj);
	
	mysqli_query($db,
		"UPDATE penilaian
		SET hasil='$evaluasi'
		WHERE fk_id_manajer='$id_mnj'"
	);
	header("location:../halaman-admin.php?p=gm-ranking");

?>
