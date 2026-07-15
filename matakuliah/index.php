<?php
require_once '../middleware/auth.php';
require_once '../config/koneksi.php';

$query = mysqli_query($conn, "
    SELECT
        matakuliah.*,
        dosen.nama_dosen
    FROM matakuliah
    LEFT JOIN dosen
        ON matakuliah.nidn = dosen.nidn
    ORDER BY matakuliah.kode_mk ASC
");

include '../layout/header.php';
include '../layout/sidebar.php';
?>

<?php
if (isset($_GET['pesan'])) {

    if ($_GET['pesan'] == 'berhasil') {
?>

<div class="alert alert-success alert-dismissible fade show" role="alert">

    <i class="fa-solid fa-circle-check"></i>

    Data mata kuliah berhasil ditambahkan.

    <button
        type="button"
        class="btn-close"
        data-bs-dismiss="alert">
    </button>

</div>

<?php
    }

    elseif ($_GET['pesan'] == 'edit') {
?>

<div class="alert alert-primary alert-dismissible fade show" role="alert">

    <i class="fa-solid fa-pen"></i>

    Data mata kuliah berhasil diperbarui.

    <button
        type="button"
        class="btn-close"
        data-bs-dismiss="alert">
    </button>

</div>

<?php
    }

    elseif ($_GET['pesan'] == 'hapus') {
?>

<div class="alert alert-danger alert-dismissible fade show" role="alert">

    <i class="fa-solid fa-trash"></i>

    Data mata kuliah berhasil dihapus.

    <button
        type="button"
        class="btn-close"
        data-bs-dismiss="alert">
    </button>

</div>

<?php
    }

    elseif ($_GET['pesan'] == 'duplikat') {
?>

<div class="alert alert-warning alert-dismissible fade show" role="alert">

    <i class="fa-solid fa-triangle-exclamation"></i>

    Kode Mata Kuliah sudah terdaftar! Gunakan kode yang berbeda.

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

        <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">

            <h4 class="mb-0">
                <i class="fa-solid fa-book"></i>
                Data Mata Kuliah
            </h4>

            <a
                href="tambah.php"
                class="btn btn-light">

                <i class="fa-solid fa-plus"></i>
                Tambah Mata Kuliah

            </a>

        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-hover">

                    <thead class="table-success">

                        <tr>

                            <th width="60">No</th>
                            <th>Kode MK</th>
                            <th>Nama Mata Kuliah</th>
                            <th width="80">SKS</th>
                            <th>Dosen Pengampu</th>
                            <th width="150">Aksi</th>

                        </tr>

                    </thead>

                    <tbody>

                        <?php
                        $no = 1;

                        while ($row = mysqli_fetch_assoc($query)) :
                        ?>

                        <tr>

                            <td><?= $no++; ?></td>

                            <td><?= $row['kode_mk']; ?></td>

                            <td><?= $row['nama_mk']; ?></td>

                            <td><?= $row['sks']; ?></td>

                            <td><?= $row['nama_dosen']; ?></td>

                            <td>

                                <a
                                    href="edit.php?kode_mk=<?= $row['kode_mk']; ?>"
                                    class="btn btn-warning btn-sm">

                                    <i class="fa-solid fa-pen-to-square"></i>

                                </a>

                                <a
                                    href="hapus.php?kode_mk=<?= $row['kode_mk']; ?>"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin ingin menghapus data mata kuliah ini?')">

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