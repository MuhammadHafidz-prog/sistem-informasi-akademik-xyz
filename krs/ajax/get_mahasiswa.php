<?php
require_once '../../config/koneksi.php';

if(isset($_GET['nim'])){

    $nim = mysqli_real_escape_string($conn,$_GET['nim']);

    $query = mysqli_query($conn,
        "SELECT *
         FROM mahasiswa
         WHERE nim='$nim'");

    if(mysqli_num_rows($query)>0){

        $data = mysqli_fetch_assoc($query);

?>

<div class="alert alert-info">

    <strong>Nama Mahasiswa :</strong>
    <?= $data['nama_mahasiswa']; ?>

    <br>

    <strong>Jenis Kelamin :</strong>
    <?= ($data['jk']=='L') ? 'Laki-Laki' : 'Perempuan'; ?>

    <br>

    <strong>No HP :</strong>
    <?= $data['no_hp']; ?>

</div>

<?php

    }

}