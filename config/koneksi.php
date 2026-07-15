<?php

$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_akademik_xyz";

$conn = mysqli_connect($host,$user,$pass,$db);

if(!$conn){
    die("Koneksi Gagal : ".mysqli_connect_error());
}

?>