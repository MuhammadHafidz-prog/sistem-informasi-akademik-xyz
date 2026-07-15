<?php
require_once '../middleware/auth.php';
require_once '../config/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nidn = mysqli_real_escape_string($conn, $_POST['nidn']);
    $nama_dosen = mysqli_real_escape_string($conn, $_POST['nama_dosen']);
    $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);
    $no_hp = mysqli_real_escape_string($conn, $_POST['no_hp']);

    // Cek NIDN
    $cek = mysqli_query($conn, "SELECT * FROM dosen WHERE nidn='$nidn'");

    if(mysqli_num_rows($cek)>0){

        header("Location: index.php?pesan=duplikat");
        exit;

    }

    // Simpan Data
    $query = mysqli_query($conn,"
        INSERT INTO dosen(
            nidn,
            nama_dosen,
            alamat,
            no_hp
        )VALUES(
            '$nidn',
            '$nama_dosen',
            '$alamat',
            '$no_hp'
        )
    ");

    if($query){

        header("Location: index.php?pesan=berhasil");
        exit;

    }else{

        echo "Gagal menyimpan data : ".mysqli_error($conn);

    }

}else{

    header("Location: index.php");
    exit;

}