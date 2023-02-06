<?php
$server = "localhost";
$user = "root";
$password = "";
$nama_database = "db_pakhir";

$db = mysqli_connect($server, $user, $password, $nama_database);
$sqlmnj = "SELECT * FROM tb_manajer";

$mnj_select = mysqli_query($db, $sqlmnj);

?>
<div id="label-page"><h3>Input Data Manajer</h3></div>
<div id="content">
	<form action="proses/gm-ranking-proses.php" method="post" enctype="multipart/form-data">
	
	<table id="tabel-input">
		<tr>
			<td class="label-formulir">ID Manajer</td>
			<td class="isian-formulir">
                <select name = "id_mnj">
                <option>Pilih Manajer</option>

                <?php

                    while ($r_mnj = mysqli_fetch_array($mnj_select,MYSQLI_ASSOC)):;
                    
                ?>
                <option value="<?php echo $r_mnj['id_mnj'];?>"><p><?php echo $r_mnj['nama'];?> </p>
                <?php
                endwhile;
                ?>
                </select>
            </td></tr>
		<tr>
			<td class="label-formulir">Masukkan Hasil Nilai Evaluasi</td>
			<td class="isian-formulir"><input type="number" name="hasil_evaluasi" class="isian-formulir isian-formulir-border"></td>
		</tr>

		<tr>
			<td class="label-formulir"></td>
			<td class="isian-formulir"><input type="submit" name="simpan" value="Simpan" class="tombol"></td>
		</tr>
	</table>
	</form>
    <table id="tabel-tampil">
		<tr>
			<th id="label-tampil-no">No</td>
			<th>ID Manajer</th>
			<th>Nama Manajer</th>
			<th>Hasil Evaluasi</th>
			<th>Rekomendasi</th>
		</tr>
		
		
		<?php
		$nomor = 1;
		$query = "SELECT penilaian.fk_id_manajer, penilaian.hasil, tb_manajer.nama, IF(penilaian.hasil >90, 'Layak','Tidak Layak') as rekomendasi FROM penilaian JOIN tb_manajer
		ON penilaian.fk_id_manajer = tb_manajer.id_mnj ORDER BY hasil DESC";
		//$sql="SELECT * FROM tbanggota ORDER BY idanggota DESC";
		$q_tampil_anggota = mysqli_query($db, $query);
		if(mysqli_num_rows($q_tampil_anggota)>0)
		{
		while($r_tampil_anggota=mysqli_fetch_array($q_tampil_anggota)){
			/*if(empty($r_tampil_anggota['foto'])or($r_tampil_anggota['foto']=='-'))
				$foto = "admin-no-photo.jpg";
			else
				$foto = $r_tampil_anggota['foto'];*/
		?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $r_tampil_anggota['fk_id_manajer']; ?></td>
			<td><?php echo $r_tampil_anggota['nama']; ?></td>
			<td><?php echo $r_tampil_anggota['hasil']; ?></td>	
			<td><?php echo $r_tampil_anggota['rekomendasi']; ?></td>	
		</tr>		
		<?php $nomor++; } 
		}
		else {
			echo "<tr><td colspan=6>Data Tidak Ditemukan</td></tr>";
		}?>		
	</table>
</div>