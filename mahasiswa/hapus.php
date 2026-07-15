<?php
require_once '../middleware/auth.php';
require_once '../config/koneksi.php';

if (!isset($_GET['nim'])) {

    header("Location: index.php");
    exit;

}

$nim = mysqli_real_escape_string($conn, $_GET['nim']);

$query = mysqli_query($conn, "
    DELETE FROM mahasiswa
    WHERE nim='$nim'
");

if($query){

    header("Location: index.php?pesan=hapus");
    exit;

}else{

    echo "Gagal menghapus data : ".mysqli_error($conn);

}
?>