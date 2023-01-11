<?php
	$id_mnj=$_GET['id'];
	$q_tampil_mnj=mysqli_query($db,"SELECT * FROM tb_manajer WHERE id_mnj='$id_mnj'");
	$r_tampil_mnj=mysqli_fetch_array($q_tampil_mnj);
?>
<div id="label-page"><h3>Edit Data Manajer</h3></div>
<div id="content">
	<form action="proses/manajer-edit-proses.php" method="post" enctype="multipart/form-data">
	<table id="tabel-input">
		<tr>
			<td class="label-formulir">ID Manajer</td>
			<td class="isian-formulir"><input type="text" name="id_manajer" value="<?php echo $r_tampil_mnj['id_mnj']; ?>" readonly="readonly" class="isian-formulir isian-formulir-border warna-formulir-disabled"></td>
		</tr>
		<tr>
			<td class="label-formulir">Nama</td>
			<td class="isian-formulir"><input type="text" name="nama" value="<?php echo $r_tampil_mnj['nama']; ?>" class="isian-formulir isian-formulir-border"></td>
		</tr>
		<tr>
			<td class="label-formulir">Jenis Kelamin</td>			
			<?php
			if($r_tampil_mnj['jeniskelamin']=="Pria")
			{
				echo "<td class='isian-formulir'><input type='radio' name='jenis_kelamin' value='Pria' checked>Pria</label></td>
					</tr>
		<tr>
			<td class='label-formulir'></td>
			<td class='isian-formulir'><input type='radio' name='jenis_kelamin' value='Wanita'>Wanita</td>";
			}
			elseif($r_tampil_mnj['jeniskelamin']=="Wanita")
			{
				echo "<td class='isian-formulir'><input type='radio' name='jenis_kelamin' value='Pria'>Pria</label></td>
					</tr>
		<tr>
			<td class='label-formulir'></td>
			<td class='isian-formulir'><input type='radio' name='jenis_kelamin' value='Wanita' checked>Wanita</td>";
			}
			?>
			<input type="text" name="jenis_kelamin" value="<?php echo $r_tampil_mnj['jeniskelamin']; ?>" class="isian-formulir isian-formulir-border"></td>
		</tr>
		<tr>
			<td class="label-formulir">Divisi</td>
			<td class="isian-formulir"><input type="text" name="divisi" value="<?php echo $r_tampil_mnj['divisi']; ?>" class="isian-formulir isian-formulir-border"></td>
		</tr>
		<tr>
			<td class="label-formulir">Agama</td>
			<td class="isian-formulir"><input type="text" name="agama" value="<?php echo $r_tampil_mnj['agama']; ?>" class="isian-formulir isian-formulir-border"></td>
		</tr>
		<tr>
			<td class="label-formulir">Alamat</td>
			<td class="isian-formulir"><textarea rows="2" cols="40" name="alamat" class="isian-formulir isian-formulir-border"><?php echo $r_tampil_mnj['alamat']; ?></textarea></td>
		</tr>
		<tr>
			<td class="label-formulir"></td>
			<td class="isian-formulir"><input type="submit" name="simpan" value="Simpan" id="tombol-simpan"></td>
		</tr>
	</table>
	</form>
</div>