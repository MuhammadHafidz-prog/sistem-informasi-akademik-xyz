<?php
require_once '../../config/koneksi.php';

if(isset($_GET['kode_mk'])){

    $kode = mysqli_real_escape_string($conn,$_GET['kode_mk']);

    $query = mysqli_query($conn,"
        SELECT
            matakuliah.*,
            dosen.nama_dosen
        FROM matakuliah
        LEFT JOIN dosen
        ON matakuliah.nidn=dosen.nidn
        WHERE kode_mk='$kode'
    ");

    if(mysqli_num_rows($query)>0){

        $data=mysqli_fetch_assoc($query);
?>

<div class="alert alert-info">

    <strong>Nama Mata Kuliah :</strong>
    <?= $data['nama_mk']; ?>

    <br>

    <strong>Jumlah SKS :</strong>
    <?= $data['sks']; ?>

    <br>

    <strong>Dosen Pengampu :</strong>
    <?= $data['nama_dosen']; ?>

</div>

<?php

    }

}