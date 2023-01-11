<?php
include '../koneksi.php';
$id_mnj = $_POST['id_mnj'];
$sikap = $_POST['sikap'];
$tjawab = $_POST['tjawab'];
$kompetensi = $_POST['kompetensi'];
$rencana = $_POST['rencana'];
$arah = $_POST['arah'];
$organisasi = $_POST['organisasi'];
$masalah = $_POST['masalah'];
$interpersonal = $_POST['interpersonal'];
$komunikasi = $_POST['komunikasi'];

$sqlceknilai = "SELECT * FROM penilaian WHERE fk_id_manajer = $id_mnj";
$sqlcekmnj = "SELECT * from tb_manaer WHERE id_mnj = $id_mnj";
$cekquery = mysqli_query($db, $sqlcekmnj);

if(mysqli_num_rows(mysqli_query($db,$sqlceknilai)) < 1 ) {
    $sql = "INSERT INTO penilaian (fk_id_manajer, n_sikap, n_tjawab, n_kompetensi, n_rencana, n_arah, 
    n_organisasi, n_masalah, n_interpersonal, n_komunikasi) 
    VALUES ('$id_mnj','$sikap','$tjawab','$kompetensi','$rencana','$arah','$organisasi','$masalah','$interpersonal'
    ,'$komunikasi')";
    $query = mysqli_query($db, $sql);
    if ($query) {
        echo "<script>alert('berhasil memasukkan data penilaian')</script>";
        header("location:../halaman-gm.php");
    }else{
        echo "<script>alert('Gagal Memasukkan data')</script>";
    }
}


?>