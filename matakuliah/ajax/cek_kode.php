<?php
require_once '../../config/koneksi.php';

if(isset($_GET['kode_mk'])){

    $kode = mysqli_real_escape_string($conn, $_GET['kode_mk']);

    $cek = mysqli_query($conn,
        "SELECT kode_mk
         FROM matakuliah
         WHERE kode_mk='$kode'");

    if(mysqli_num_rows($cek)>0){

        echo '
        <small class="text-danger">
            <i class="fa-solid fa-circle-xmark"></i>
            Kode Mata Kuliah sudah digunakan
        </small>';

    }else{

        echo '
        <small class="text-success">
            <i class="fa-solid fa-circle-check"></i>
            Kode Mata Kuliah tersedia
        </small>';

    }

}