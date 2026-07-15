<?php
require_once '../../config/koneksi.php';

if(isset($_GET['nim'])){

    $nim = mysqli_real_escape_string($conn,$_GET['nim']);

    $cek = mysqli_query($conn,
        "SELECT nim FROM mahasiswa WHERE nim='$nim'");

    if(mysqli_num_rows($cek)>0){

        echo '
        <small class="text-danger">
            <i class="fa-solid fa-circle-xmark"></i>
            NIM sudah digunakan
        </small>';

    }else{

        echo '
        <small class="text-success">
            <i class="fa-solid fa-circle-check"></i>
            NIM tersedia
        </small>';

    }

}