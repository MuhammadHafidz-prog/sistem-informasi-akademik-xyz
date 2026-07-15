<?php
require_once '../middleware/auth.php';
require_once '../config/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nidn_lama = mysqli_real_escape_string($conn, $_POST['nidn_lama']);
    $nama_dosen = mysqli_real_escape_string($conn, $_POST['nama_dosen']);
    $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);
    $no_hp = mysqli_real_escape_string($conn, $_POST['no_hp']);

    $query = mysqli_query($conn, "
        UPDATE dosen
        SET
            nama_dosen = '$nama_dosen',
            alamat = '$alamat',
            no_hp = '$no_hp'
        WHERE nidn = '$nidn_lama'
    ");

    if ($query) {

        header("Location: index.php?pesan=edit");
        exit;

    } else {

        echo "Gagal mengubah data dosen : " . mysqli_error($conn);

    }

} else {

    header("Location: index.php");
    exit;

}
?>