<?php
	$id_gm = $_GET['id'];
	$q_tampil_gm=mysqli_query($db,"SELECT * FROM tb_gm WHERE id_gm= '$id_gm'");
	$r_tampil_gm=mysqli_fetch_array($q_tampil_gm);
?>
<div id="label-page"><h3>Edit Data General Manajer</h3></div>
<div id="content">
	<form action="proses/gm-edit-proses.php" method="post" enctype="multipart/form-data">
	<table id="tabel-input">
		<tr>
			<td class="label-formulir">ID General Manajer</td>
			<td class="isian-formulir"><input type="text" name="id_gm" value="<?php echo $r_tampil_gm['id_gm']; ?>" readonly="readonly" class="isian-formulir isian-formulir-border warna-formulir-disabled"></td>
		</tr>
		<tr>
			<td class="label-formulir">Nama</td>
			<td class="isian-formulir"><input type="text" name="nama" value="<?php echo $r_tampil_gm['nama']; ?>" class="isian-formulir isian-formulir-border"></td>
		</tr>
		<tr>
			<td class="label-formulir">Jenis Kelamin</td>			
			<?php
			if($r_tampil_gm['jeniskelamin']=="Pria")
			{
				echo "<td class='isian-formulir'><input type='radio' name='jenis_kelamin' value='Pria' checked>Pria</label></td>
					</tr>
		<tr>
			<td class='label-formulir'></td>
			<td class='isian-formulir'><input type='radio' name='jenis_kelamin' value='Wanita'>Wanita</td>";
			}
			elseif($r_tampil_gm['jeniskelamin']=="Wanita")
			{
				echo "<td class='isian-formulir'><input type='radio' name='jenis_kelamin' value='Pria'>Pria</label></td>
					</tr>
		<tr>
			<td class='label-formulir'></td>
			<td class='isian-formulir'><input type='radio' name='jenis_kelamin' value='Wanita' checked>Wanita</td>";
			}
			?>
			<input type="text" name="jenis_kelamin" value="<?php echo $r_tampil_gm['jeniskelamin']; ?>" class="isian-formulir isian-formulir-border"></td>
		</tr>
		<tr>
			<td class="label-formulir">Agama</td>
			<td class="isian-formulir"><input type="text" name="agama" value="<?php echo $r_tampil_gm['agama']; ?>" class="isian-formulir isian-formulir-border"></td>
		</tr>
		<tr>
			<td class="label-formulir">Alamat</td>
			<td class="isian-formulir"><textarea rows="2" cols="40" name="alamat" class="isian-formulir isian-formulir-border"><?php echo $r_tampil_gm['alamat']; ?></textarea></td>
		</tr>
		<tr>
			<td class="label-formulir"></td>
			<td class="isian-formulir"><input type="submit" name="simpan" value="Simpan" id="tombol-simpan"></td>
		</tr>
	</table>
	</form>
</div>