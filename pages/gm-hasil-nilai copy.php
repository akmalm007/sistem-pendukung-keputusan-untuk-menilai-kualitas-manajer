<div id="label-page"><h3>Tampil Data Nilai Manajer</h3></div>
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
			<th>Hasil Evaluasi</th>
		</tr>
		

		
		<?php
        $nomor = 1;

        //SQL untuk mengambil nilai Total dari bobot kriteria
        $sqljumlah = "SELECT SUM(bobot) from kriteria";
        $queryjumlah = mysqli_query($db, $sqljumlah);
        $jumlah0 = mysqli_fetch_array($queryjumlah);
        $jumlah = $jumlah0[0];

        // Untuk Menghitung Bobot
        $sqlkriteria = "SELECT bobot from kriteria";
        $querykriteria = mysqli_query($db, $sqlkriteria);
        $bobot = [];
        while ($bariskriteria = mysqli_fetch_array($querykriteria)) {
            $bobot[] = $bariskriteria['bobot'];
        }

        // Fungsi untuk mengambil nilai SMART
        $sqlnilai = "SELECT * from penilaian";
        $querynilai = mysqli_query($db, $sqlnilai);

        while ($barisnilai = mysqli_fetch_array($querynilai) ) {
            //Perhitungan Smart
            $nilaiS = $barisnilai['n_sikap']*($bobot[0]/$jumlah);
            $nilaiT = $barisnilai['n_tjawab']*($bobot[2]/$jumlah);
            $nilaiK = $barisnilai['n_kompetensi']*($bobot[1]/$jumlah);
            $nilaiR = $barisnilai['n_rencana']*($bobot[8]/$jumlah);
            $nilaiA = $barisnilai['n_arah']*($bobot[7]/$jumlah);
            $nilaiO = $barisnilai['n_organisasi']*($bobot[6]/$jumlah);
            $nilaiM = $barisnilai['n_masalah']*($bobot[5]/$jumlah);
            $nilaiI = $barisnilai['n_interpersonal']*($bobot[3]/$jumlah);
            $nilaiKomunkasi = $barisnilai['n_komunikasi']*($bobot[4]/$jumlah);  

            //Total
            $nilaiEvaluasi = $nilaiS + $nilaiT + $nilaiK + $nilaiR + $nilaiA + $nilaiO + $nilaiM + $nilaiI + $nilaiKomunkasi;
        }
		$query = "SELECT * FROM penilaian";
		//$sql="SELECT * FROM tbanggota ORDER BY idanggota DESC";
		$q_baris_nilai = mysqli_query($db, $query);
		if(mysqli_num_rows($q_baris_nilai)>0)
		{
		while($barisnilai=mysqli_fetch_array($q_baris_nilai)){
		?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $barisnilai['fk_id_manajer']; ?></td>
			<td><?php echo $barisnilai['n_sikap']; ?></td>
			<td><?php echo $barisnilai['n_tjawab']; ?></td>
			<td><?php echo $barisnilai['n_kompetensi']; ?></td>
			<td><?php echo $barisnilai['n_rencana']; ?></td>
			<td><?php echo $barisnilai['n_arah']; ?></td>		
			<td><?php echo $barisnilai['n_organisasi']; ?></td>			
			<td><?php echo $barisnilai['n_masalah']; ?></td>			
			<td><?php echo $barisnilai['n_interpersonal']; ?></td>			
			<td><?php echo $barisnilai['n_komunikasi']; ?></td>		
			<td><?= round($nilaiEvaluasi,3)?></td>		
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
		<div class="pagination">		
		</div>
	<?php
	}
	?>
</div>