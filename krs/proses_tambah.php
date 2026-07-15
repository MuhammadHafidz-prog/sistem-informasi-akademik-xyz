<?php
require_once '../middleware/auth.php';
require_once '../config/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nim = mysqli_real_escape_string($conn, $_POST['nim']);
    $kode_mk = mysqli_real_escape_string($conn, $_POST['kode_mk']);
    $semester = mysqli_real_escape_string($conn, $_POST['semester']);
    $tahun_ajaran = mysqli_real_escape_string($conn, $_POST['tahun_ajaran']);

    // Cek apakah mahasiswa sudah mengambil mata kuliah yang sama
    $cek = mysqli_query($conn, "
        SELECT *
        FROM krs
        WHERE nim = '$nim'
        AND kode_mk = '$kode_mk'
    ");

    if (mysqli_num_rows($cek) > 0) {

        header("Location: index.php?pesan=duplikat");
        exit;

    }

    $query = mysqli_query($conn, "
        INSERT INTO krs (
            nim,
            kode_mk,
            semester,
            tahun_ajaran
        ) VALUES (
            '$nim',
            '$kode_mk',
            '$semester',
            '$tahun_ajaran'
        )
    ");

    if ($query) {

        header("Location: index.php?pesan=berhasil");
        exit;

    } else {

        echo "Gagal menambahkan data KRS : " . mysqli_error($conn);

    }

} else {

    header("Location: index.php");
    exit;

}
?>