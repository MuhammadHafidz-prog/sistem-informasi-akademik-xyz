<?php
require_once '../middleware/auth.php';
require_once '../config/koneksi.php';

if (!isset($_GET['kode_mk'])) {

    header("Location: index.php");
    exit;

}

$kode_mk = mysqli_real_escape_string($conn, $_GET['kode_mk']);

$query = mysqli_query($conn, "
    DELETE FROM matakuliah
    WHERE kode_mk = '$kode_mk'
");

if ($query) {

    header("Location: index.php?pesan=hapus");
    exit;

} else {

    echo "Gagal menghapus data mata kuliah : " . mysqli_error($conn);

}
?>