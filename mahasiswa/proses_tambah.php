<?php
require_once '../middleware/auth.php';
require_once '../config/koneksi.php';

$nim = mysqli_real_escape_string($conn, $_POST['nim']);
$nama = mysqli_real_escape_string($conn, $_POST['nama_mahasiswa']);
$jk = mysqli_real_escape_string($conn, $_POST['jk']);
$alamat = mysqli_real_escape_string($conn, $_POST['alamat']);
$no_hp = mysqli_real_escape_string($conn, $_POST['no_hp']);

$cek = mysqli_query($conn, "SELECT nim FROM mahasiswa WHERE nim='$nim'");

if (mysqli_num_rows($cek) > 0) {

    header("Location: index.php?pesan=duplikat");
    exit;

}

$sql = "INSERT INTO mahasiswa
        (nim, nama_mahasiswa, jk, alamat, no_hp)
        VALUES
        ('$nim','$nama','$jk','$alamat','$no_hp')";

$query = mysqli_query($conn, $sql);

if ($query) {

    header("Location: index.php?pesan=berhasil");

} else {

    echo "Gagal menyimpan data : " . mysqli_error($conn);

}