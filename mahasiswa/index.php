<?php
require_once '../middleware/auth.php';
require_once '../config/koneksi.php';

$query = mysqli_query($conn, "SELECT * FROM mahasiswa ORDER BY nim ASC");

include '../layout/header.php';
include '../layout/sidebar.php';
?>

<?php
if (isset($_GET['pesan'])) {

    if ($_GET['pesan'] == 'berhasil') {
?>

<div class="alert alert-success alert-dismissible fade show" role="alert">

    <i class="fa-solid fa-circle-check"></i>

    Data mahasiswa berhasil ditambahkan.

    <button
        type="button"
        class="btn-close"
        data-bs-dismiss="alert">
    </button>

</div>

<?php
    }

    elseif($_GET['pesan']=='edit'){
?>

<div class="alert alert-primary alert-dismissible fade show" role="alert">

    <i class="fa-solid fa-pen"></i>

    Data mahasiswa berhasil diperbarui.

    <button
        type="button"
        class="btn-close"
        data-bs-dismiss="alert">
    </button>

</div>

<?php
    }

    elseif($_GET['pesan']=='hapus'){
?>

<div class="alert alert-danger alert-dismissible fade show" role="alert">

    <i class="fa-solid fa-trash"></i>

    Data mahasiswa berhasil dihapus.

    <button
        type="button"
        class="btn-close"
        data-bs-dismiss="alert">
    </button>

</div>

<?php
    }

	elseif($_GET['pesan']=='duplikat'){
?>

<div class="alert alert-warning alert-dismissible fade show" role="alert">

    <i class="fa-solid fa-triangle-exclamation"></i>

    NIM sudah terdaftar! Gunakan NIM yang berbeda.

    <button
        type="button"
        class="btn-close"
        data-bs-dismiss="alert">
    </button>

</div>

<?php

}
}
?>

<div class="container-fluid">

    <div class="card shadow border-0">

        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">

            <h4 class="mb-0">
                <i class="fa-solid fa-user-graduate"></i>
                Data Mahasiswa
            </h4>

            <a href="tambah.php" class="btn btn-light">
                <i class="fa-solid fa-plus"></i>
                Tambah Mahasiswa
            </a>

        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-hover align-middle">

                    <thead class="table-primary">

                        <tr>

                            <th width="60">No</th>
                            <th>NIM</th>
                            <th>Nama Mahasiswa</th>
                            <th>JK</th>
                            <th>Alamat</th>
                            <th>No HP</th>
                            <th width="150">Aksi</th>

                        </tr>

                    </thead>

                    <tbody>

                    <?php

                    if(mysqli_num_rows($query)>0){

                        $no=1;

                        while($row=mysqli_fetch_assoc($query)){

                    ?>

                        <tr>

                            <td><?= $no++; ?></td>

                            <td><?= $row['nim']; ?></td>

                            <td><?= $row['nama_mahasiswa']; ?></td>

                            <td><?= $row['jk']; ?></td>

                            <td><?= $row['alamat']; ?></td>

                            <td><?= $row['no_hp']; ?></td>

                            <td>

							<a href="edit.php?nim=<?= $row['nim']; ?>" class="btn btn-warning btn-sm">
								<i class="fa-solid fa-pen"></i>
								Edit
							</a>

							<a 	href="hapus.php?nim=<?= $row['nim']; ?>"
								class="btn btn-danger btn-sm"
								onclick="return confirm('Yakin ingin menghapus data mahasiswa ini?')">

								<i class="fa-solid fa-trash"></i>

							</a>

                            </td>

                        </tr>

                    <?php

                        }

                    }else{

                    ?>

                        <tr>

                            <td colspan="7" class="text-center">

                                Belum ada data mahasiswa.

                            </td>

                        </tr>

                    <?php } ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

<?php
include '../layout/footer.php';
?>