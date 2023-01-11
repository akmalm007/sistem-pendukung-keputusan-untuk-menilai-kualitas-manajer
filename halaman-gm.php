<?php
include 'koneksi.php';
$tgl = date('Y-m-d');
session_start();
if (isset($_SESSION['sesi'])) {
?>
  <!doctype html>
  <html>

  <head>
    <title>Sistem Pendukung Keputusan </title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>

  <body>
    <div id="container">
      <div id="header">
        <div id="logo-perpustakaan-container">
          <image id="logo-perpustakaan" src="images/logo-perpustakaan3.png" border=0 style="border:0; text-decoration:none; outline:none">
        </div>
        <div id="nama-alamat-perpustakaan-container">
          <div class="nama-alamat-perpustakaan">
            <h1> Sistem Pendukung Keputusan untuk Memberikan Penilaian Manajer </h1>
          </div>
          <div class="nama-alamat-perpustakaan">
            <h4> Projek Final dan Tugas Akhir Sistem Pendukung Keputusan</h4>
          </div>
        </div>
      </div>
      <div id="header2">
        <div id="nama-user">Hai <?php echo $_SESSION['sesi'];
                                ?>!</div>
      </div>
      <div id="sidebar">
        <a href="halaman-gm.php?p=beranda">Beranda</a>
        <p class="label-navigasi">Data Manajer</p>
        <ul>
          <li><a href="halaman-gm.php?p=gm-manajer">Data Manajer</a></li>
        </ul>
        <p class="label-navigasi">Assessment</p>
        <ul>
          <li><a href="halaman-gm.php?p=gm-nilai">Penilaian General Manajer</a></li>
          <li><a href="halaman-gm.php?p=gm-hasil-nilai">Hasil Assessment</a></li>

          <!-- UNTUK TRANSAKSI KEMBALI DI INDEX PAKAI LIST SAJA NANTI UBAH GITU-->
        </ul>
        <p class="label-navigasi" style="color: white;"><a href="halaman-gm.php?p=laporan-transaksi" style="color: white;">Laporan Transaksi</a></p>
        <a href="logout.php">Logout</a>
      </div>
      <div id="content-container">
        <div class="container">
          <div class="row"><br /><br /><br />
            <div class="col-md-10 col-md-offset-1" style="background-image:url('../asanoer-background.jpg')">
              <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-warning login-panel" style="background-color:rgba(255, 255, 255, 0.6);position:relative;">

                  <div class="panel-footer">

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php
        $pages_dir = 'pages';
        if (!empty($_GET['p'])) {
          $pages = scandir($pages_dir, 0);
          unset($pages[0], $pages[1]);
          $p = $_GET['p'];
          if (in_array($p . '.php', $pages)) {
            include($pages_dir . '/' . $p . '.php');
          } else {
            echo 'Halaman Tidak Ditemukan';
          }
        } else {
          include($pages_dir . '/beranda.php');
        }
        ?>
      </div>
      <div id="footer">
        <h3>Sistem Pendukung Keputusan Menilai Kualitas Manajer | Final Project</h3>
      </div>
    </div>
  </body>

  </html>
  <?php
} else {

  header('location:login.php');
  
}
?>