<?php
session_start();
$_SESSION['sesi'] = NULL;

include "koneksi.php";
	if( isset($_POST['submit']))
	{
			$user	= isset($_POST['user']) ? $_POST['user'] : "";
			$pass	= isset($_POST['pass']) ? $_POST['pass'] : "";
			$qry	= mysqli_query($db,"SELECT * FROM tb_admin WHERE username = '$user' AND password = '$pass'");
			$sesi	= mysqli_num_rows($qry);

			if ($sesi == 1)
			{
				$data_admin	= mysqli_fetch_array($qry);
				$_SESSION['id_admin'] = $data_admin['id_admin'];
				$_SESSION['sesi'] = $data_admin['username'];
				$_SESSION['level'] = $data_admin['level'];
				if ($data_admin['level']=="admin") {
					echo "<script>alert('Anda berhasil Log In');</script>";
					echo "<meta http-equiv='refresh' content='0; url=halaman-admin.php?user=$sesi'>";
				} elseif ($data_admin['level']=="gm") {
					echo "<script>alert('Anda berhasil Log In');</script>";
					echo "<meta http-equiv='refresh' content='0; url=halaman-gm.php?user=$sesi'>";
				}
				
				
			}
			else
			{
				echo "<meta http-equiv='refresh' content='0; url=login.php'>";
				echo "<script>alert('Anda Gagal Log In');</script>";
			}
	}
	else
	{
	  include "login.php";
	}
