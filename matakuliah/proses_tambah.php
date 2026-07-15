<?php
require_once '../middleware/auth.php';
require_once '../config/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $kode_mk = mysqli_real_escape_string($conn, $_POST['kode_mk']);
    $nama_mk = mysqli_real_escape_string($conn, $_POST['nama_mk']);
    $sks = mysqli_real_escape_string($conn, $_POST['sks']);
    $nidn = mysqli_real_escape_string($conn, $_POST['nidn']);

    // Cek Kode Mata Kuliah
    $cek = mysqli_query($conn, "
        SELECT *
        FROM matakuliah
        WHERE kode_mk = '$kode_mk'
    ");

    if (mysqli_num_rows($cek) > 0) {

        header("Location: index.php?pesan=duplikat");
        exit;

    }

    // Simpan Data
    $query = mysqli_query($conn, "
        INSERT INTO matakuliah (
            kode_mk,
            nama_mk,
            sks,
            nidn
        ) VALUES (
            '$kode_mk',
            '$nama_mk',
            '$sks',
            '$nidn'
        )
    ");

    if ($query) {

        header("Location: index.php?pesan=berhasil");
        exit;

    } else {

        echo "Gagal menyimpan data : " . mysqli_error($conn);

    }

} else {

    header("Location: index.php");
    exit;

}
?>