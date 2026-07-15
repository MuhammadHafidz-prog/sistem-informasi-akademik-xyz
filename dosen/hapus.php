<?php
require_once '../middleware/auth.php';
require_once '../config/koneksi.php';

if (!isset($_GET['nidn'])) {

    header("Location: index.php");
    exit;

}

$nidn = mysqli_real_escape_string($conn, $_GET['nidn']);

$query = mysqli_query($conn,"
    DELETE FROM dosen
    WHERE nidn='$nidn'
");

if($query){

    header("Location: index.php?pesan=hapus");
    exit;

}else{

    echo "Gagal menghapus data dosen : ".mysqli_error($conn);

}
?>