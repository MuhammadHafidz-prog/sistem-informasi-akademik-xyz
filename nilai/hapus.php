<?php
require_once '../middleware/auth.php';
require_once '../config/koneksi.php';

if (!isset($_GET['id'])) {

    header("Location: index.php");
    exit;

}

$id = mysqli_real_escape_string($conn, $_GET['id']);

$query = mysqli_query($conn, "
    DELETE FROM nilai
    WHERE id_nilai = '$id'
");

if ($query) {

    header("Location: index.php?pesan=hapus");
    exit;

} else {

    echo "Gagal menghapus data nilai : " . mysqli_error($conn);

}
?>