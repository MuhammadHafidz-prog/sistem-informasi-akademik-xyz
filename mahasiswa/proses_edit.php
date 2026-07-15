<?php
require_once '../middleware/auth.php';
require_once '../config/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nim_lama = mysqli_real_escape_string($conn, $_POST['nim_lama']);
    $nim = mysqli_real_escape_string($conn, $_POST['nim']);
    $nama_mahasiswa = mysqli_real_escape_string($conn, $_POST['nama_mahasiswa']);
    $jk = mysqli_real_escape_string($conn, $_POST['jk']);
    $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);
    $no_hp = mysqli_real_escape_string($conn, $_POST['no_hp']);

    $query = mysqli_query($conn, "
        UPDATE mahasiswa
        SET
            nama_mahasiswa = '$nama_mahasiswa',
            jk = '$jk',
            alamat = '$alamat',
            no_hp = '$no_hp'
        WHERE nim = '$nim_lama'
    ");

    if ($query) {

        header("Location: index.php?pesan=edit");
        exit;

    } else {

        echo "Gagal mengubah data : " . mysqli_error($conn);

    }

} else {

    header("Location: index.php");
    exit;

}
?>