<?php
require_once '../middleware/auth.php';
require_once '../config/koneksi.php';

include '../layout/header.php';
include '../layout/sidebar.php';

$query = mysqli_query($conn, "SELECT * FROM dosen ORDER BY nidn ASC");
?>

<?php
if(isset($_GET['pesan'])){

    if($_GET['pesan']=='berhasil'){
?>

<div class="alert alert-success alert-dismissible fade show" role="alert">

    <i class="fa-solid fa-circle-check"></i>

    Data dosen berhasil ditambahkan.

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

    Data dosen berhasil diperbarui.

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

    Data dosen berhasil dihapus.

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

    NIDN sudah terdaftar! Gunakan NIDN yang berbeda.

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

        <div class="card-header bg-warning text-white d-flex justify-content-between align-items-center">

            <h4 class="mb-0">
                <i class="fa-solid fa-chalkboard-user"></i>
                Data Dosen
            </h4>

            <a href="tambah.php" class="btn btn-light">
                <i class="fa-solid fa-plus"></i>
                Tambah Dosen
            </a>

        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-hover align-middle">

                    <thead class="table-warning text-center">

                        <tr>
                            <th>No</th>
                            <th>NIDN</th>
                            <th>Nama Dosen</th>
                            <th>Alamat</th>
                            <th>No HP</th>
                            <th>Aksi</th>
                        </tr>

                    </thead>

                    <tbody>

                        <?php
                        $no = 1;

                        while ($row = mysqli_fetch_assoc($query)) :
                        ?>

                        <tr>

                            <td class="text-center"><?= $no++; ?></td>

                            <td><?= $row['nidn']; ?></td>

                            <td><?= $row['nama_dosen']; ?></td>

                            <td><?= $row['alamat']; ?></td>

                            <td><?= $row['no_hp']; ?></td>

                            <td class="text-center">

                                <a
                                    href="edit.php?nidn=<?= $row['nidn']; ?>"
                                    class="btn btn-warning btn-sm">

                                    <i class="fa-solid fa-pen-to-square"></i>

                                </a>

                                <a
                                    href="hapus.php?nidn=<?= $row['nidn']; ?>"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin ingin menghapus data dosen ini?')">

                                    <i class="fa-solid fa-trash"></i>

                                </a>

                            </td>

                        </tr>

                        <?php endwhile; ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

<?php
include '../layout/footer.php';
?>