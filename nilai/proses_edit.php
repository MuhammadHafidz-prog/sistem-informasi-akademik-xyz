<?php
require_once '../middleware/auth.php';
require_once '../config/koneksi.php';

$id_nilai       = mysqli_real_escape_string($conn, $_POST['id_nilai']);
$nim            = mysqli_real_escape_string($conn, $_POST['nim']);
$kode_mk        = mysqli_real_escape_string($conn, $_POST['kode_mk']);
$semester       = mysqli_real_escape_string($conn, $_POST['semester']);
$tahun_ajaran   = mysqli_real_escape_string($conn, $_POST['tahun_ajaran']);
$nilai_angka    = $_POST['nilai_angka'];

/*
|--------------------------------------------------------------------------
| Konversi Nilai Angka -> Nilai Huruf
|--------------------------------------------------------------------------
*/

if ($nilai_angka >= 85) {
    $nilai_huruf = "A";
} elseif ($nilai_angka >= 80) {
    $nilai_huruf = "A-";
} elseif ($nilai_angka >= 75) {
    $nilai_huruf = "B+";
} elseif ($nilai_angka >= 70) {
    $nilai_huruf = "B";
} elseif ($nilai_angka >= 65) {
    $nilai_huruf = "C+";
} elseif ($nilai_angka >= 60) {
    $nilai_huruf = "C";
} else {
    $nilai_huruf = "D";
}

/*
|--------------------------------------------------------------------------
| Update Data
|--------------------------------------------------------------------------
*/

$query = mysqli_query($conn, "
    UPDATE nilai
    SET
        nim = '$nim',
        kode_mk = '$kode_mk',
        semester = '$semester',
        tahun_ajaran = '$tahun_ajaran',
        nilai_angka = '$nilai_angka',
        nilai_huruf = '$nilai_huruf'
    WHERE id_nilai = '$id_nilai'
");

if ($query) {

    header("Location: index.php?pesan=edit");
    exit;

} else {

    echo "Gagal mengubah data nilai : " . mysqli_error($conn);

}