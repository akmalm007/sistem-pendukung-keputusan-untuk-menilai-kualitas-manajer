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
	<form action="proses/gm-nilai-proses.php" method="post" enctype="multipart/form-data">
	
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
			<td class="label-formulir">Sikap</td>
			<td class="isian-formulir"><input type="number" name="sikap" class="isian-formulir isian-formulir-border"></td>
		</tr>
		<tr>
			<td class="label-formulir">Tanggung Jawab</td>
			<td class="isian-formulir"><input type="number" name="tjawab" class="isian-formulir isian-formulir-border"></td>
		</tr><tr>
			<td class="label-formulir">Kompetensi</td>
			<td class="isian-formulir"><input type="number" name="kompetensi" class="isian-formulir isian-formulir-border"></td>
		</tr><tr>
			<td class="label-formulir">Rencana</td>
			<td class="isian-formulir"><input type="number" name="rencana" class="isian-formulir isian-formulir-border"></td>
		</tr><tr>
			<td class="label-formulir">Arah</td>
			<td class="isian-formulir"><input type="number" name="arah" class="isian-formulir isian-formulir-border"></td>
		</tr><tr>
			<td class="label-formulir">Organisasi</td>
			<td class="isian-formulir"><input type="number" name="organisasi" class="isian-formulir isian-formulir-border"></td>
		</tr><tr>
			<td class="label-formulir">Masalah</td>
			<td class="isian-formulir"><input type="number" name="masalah" class="isian-formulir isian-formulir-border"></td>
		</tr>
		<tr>
			<td class="label-formulir">Interpersonal</td>
			<td class="isian-formulir"><input type="number" name="interpersonal" class="isian-formulir isian-formulir-border"></td>
		</tr>
			<td class="label-formulir">Komunikasi</td>
			<td class="isian-formulir"><input type="number" name="komunikasi" class="isian-formulir isian-formulir-border"></td>
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
			<th>Sikap</th>
			<th>Tanggung Jawab</th>
			<th>Kompetensi</th>
			<th>Rencana</th>
			<th>Arah</th>
			<th>Organisasi</th>
			<th>Masalah</th>
			<th>Interpersonal</th>
			<th>Komunikasi</th>
			<th>Opsi</th>
		</tr>
		

		
		<?php
		$nomor = 1;
		$query = "SELECT * FROM penilaian ";
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
			<td><?php echo $r_tampil_anggota['n_sikap']; ?></td>
			<td><?php echo $r_tampil_anggota['n_tjawab']; ?></td>
			<td><?php echo $r_tampil_anggota['n_kompetensi']; ?></td>
			<td><?php echo $r_tampil_anggota['n_rencana']; ?></td>
			<td><?php echo $r_tampil_anggota['n_arah']; ?></td>		
			<td><?php echo $r_tampil_anggota['n_organisasi']; ?></td>			
			<td><?php echo $r_tampil_anggota['n_masalah']; ?></td>			
			<td><?php echo $r_tampil_anggota['n_interpersonal']; ?></td>			
			<td><?php echo $r_tampil_anggota['n_komunikasi']; ?></td>
			<td>
				<div class="tombol-opsi-container"><a href="proses/gm-nilai-hapus.php?id=<?php echo $r_tampil_anggota['fk_id_manajer']; ?>" onclick = "return confirm ('Apakah Anda Yakin Akan Menghapus Data Ini?')" class="tombol">Hapus</a></div>
			</td>			
		</tr>		
		<?php $nomor++; } 
		}
		else {
			echo "<tr><td colspan=6>Data Tidak Ditemukan</td></tr>";
		}?>		
	</table>
</div>