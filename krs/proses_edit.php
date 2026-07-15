<?php
require_once '../middleware/auth.php';
require_once '../config/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id_krs = mysqli_real_escape_string($conn, $_POST['id_krs']);
    $nim = mysqli_real_escape_string($conn, $_POST['nim']);
    $kode_mk = mysqli_real_escape_string($conn, $_POST['kode_mk']);
    $semester = mysqli_real_escape_string($conn, $_POST['semester']);
    $tahun_ajaran = mysqli_real_escape_string($conn, $_POST['tahun_ajaran']);

    // Cek apakah data KRS yang sama sudah ada
    $cek = mysqli_query($conn, "
        SELECT *
        FROM krs
        WHERE nim = '$nim'
        AND kode_mk = '$kode_mk'
        AND id_krs != '$id_krs'
    ");

    if (mysqli_num_rows($cek) > 0) {

        header("Location: index.php?pesan=duplikat");
        exit;

    }

    $query = mysqli_query($conn, "
        UPDATE krs
        SET
            nim = '$nim',
            kode_mk = '$kode_mk',
            semester = '$semester',
            tahun_ajaran = '$tahun_ajaran'
        WHERE id_krs = '$id_krs'
    ");

    if ($query) {

        header("Location: index.php?pesan=edit");
        exit;

    } else {

        echo "Gagal mengubah data KRS : " . mysqli_error($conn);

    }

} else {

    header("Location: index.php");
    exit;

}
?>