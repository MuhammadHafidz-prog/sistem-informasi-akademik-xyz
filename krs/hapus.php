<?php
require_once '../middleware/auth.php';
require_once '../config/koneksi.php';

if (!isset($_GET['id_krs'])) {

    header("Location: index.php");
    exit;

}

$id_krs = mysqli_real_escape_string($conn, $_GET['id_krs']);

$query = mysqli_query($conn, "
    DELETE FROM krs
    WHERE id_krs = '$id_krs'
");

if ($query) {

    header("Location: index.php?pesan=hapus");
    exit;

} else {

    echo "Gagal menghapus data KRS : " . mysqli_error($conn);

}
?>