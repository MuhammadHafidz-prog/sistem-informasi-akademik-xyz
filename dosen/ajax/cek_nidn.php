<?php
require_once '../../config/koneksi.php';

if(isset($_GET['nidn'])){

    $nidn = mysqli_real_escape_string($conn,$_GET['nidn']);

    $cek = mysqli_query($conn,
        "SELECT nidn FROM dosen WHERE nidn='$nidn'");

    if(mysqli_num_rows($cek)>0){

        echo '
        <small class="text-danger">
            <i class="fa-solid fa-circle-xmark"></i>
            NIDN sudah digunakan
        </small>';

    }else{

        echo '
        <small class="text-success">
            <i class="fa-solid fa-circle-check"></i>
            NIDN tersedia
        </small>';

    }

}