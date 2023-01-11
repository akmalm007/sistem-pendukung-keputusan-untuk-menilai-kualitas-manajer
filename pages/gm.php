<div id="label-page"><h3>Tampil Data General Manajer</h3></div>
<div id="content">
	
	<p id="tombol-tambah-container"><a href="halaman-admin.php?p=gm-input" class="tombol">Tambah General Manajer</a>
	<a target="_blank" href="pages/cetak.php"><img src="print.png" height="50px" height="50px"></a>
	<FORM CLASS="form-inline" METHOD="POST">
	<div align="right"><form method=post><input type="text" name="pencarian"><input type="submit" name="search" value="search" class="tombol"></form>
	</FORM>
	</p>
	<table id="tabel-tampil">
		<tr>
			<th id="label-tampil-no">No</td>
			<th>ID General Manajer</th>
			<th>Nama</th>
			<th>Jenis Kelamin</th>
			<th>Alamat</th>
			<th>Agama</th>
			<th id="label-opsi">Opsi</th>
		</tr>
		

		
		<?php
		$nomor = 1;
		$query = "SELECT * FROM tb_gm";
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
			<td><?php echo $r_tampil_anggota['id_gm']; ?></td>
			<td><?php echo $r_tampil_anggota['nama']; ?></td>
			<td><?php echo $r_tampil_anggota['jeniskelamin']; ?></td>
			<td><?php echo $r_tampil_anggota['alamat']; ?></td>
			<td><?php echo $r_tampil_anggota['agama']; ?></td>
			<td>
				<div class="tombol-opsi-container"><a href="index.php?p=gm-edit&id=<?php echo $r_tampil_anggota['id_gm'];?>" class="tombol">Edit</a></div>
				<div class="tombol-opsi-container"><a href="proses/gm-hapus.php?id=<?php echo $r_tampil_anggota['id_gm']; ?>" onclick = "return confirm ('Apakah Anda Yakin Akan Menghapus Data Ini?')" class="tombol">Hapus</a></div>
			</td>			
		</tr>		
		<?php $nomor++; } 
		}
		else {
			echo "<tr><td colspan=6>Data Tidak Ditemukan</td></tr>";
		}?>		
	</table>
	<?php
	if(isset($_POST['pencarian'])){
	if($_POST['pencarian']!=''){
		echo "<div style=\"float:left;\">";
		$jml = mysqli_num_rows(mysqli_query($db, $queryJml));
		echo "Data Hasil Pencarian: <b>$jml</b>";
		echo "</div>";
	}
	}
	else{ ?>
		<div style="float: left;">		
		</div>
	<?php
	}
	?>
</div>