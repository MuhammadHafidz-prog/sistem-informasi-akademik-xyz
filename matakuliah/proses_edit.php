<?php
require_once '../middleware/auth.php';
require_once '../config/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $kode_mk_lama = mysqli_real_escape_string($conn, $_POST['kode_mk_lama']);
    $nama_mk = mysqli_real_escape_string($conn, $_POST['nama_mk']);
    $sks = mysqli_real_escape_string($conn, $_POST['sks']);
    $nidn = mysqli_real_escape_string($conn, $_POST['nidn']);

    $query = mysqli_query($conn, "
        UPDATE matakuliah
        SET
            nama_mk = '$nama_mk',
            sks = '$sks',
            nidn = '$nidn'
        WHERE kode_mk = '$kode_mk_lama'
    ");

    if ($query) {

        header("Location: index.php?pesan=edit");
        exit;

    } else {

        echo "Gagal mengubah data mata kuliah : " . mysqli_error($conn);

    }

} else {

    header("Location: index.php");
    exit;

}
?>