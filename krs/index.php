<?php
require_once '../middleware/auth.php';
require_once '../config/koneksi.php';

$query = mysqli_query($conn, "
    SELECT
        krs.*,
        mahasiswa.nama_mahasiswa,
        matakuliah.nama_mk
    FROM krs
    INNER JOIN mahasiswa
        ON krs.nim = mahasiswa.nim
    INNER JOIN matakuliah
        ON krs.kode_mk = matakuliah.kode_mk
    ORDER BY krs.id_krs ASC
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

    Data KRS berhasil ditambahkan.

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

    Data KRS berhasil diperbarui.

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

    Data KRS berhasil dihapus.

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

    Mahasiswa sudah mengambil mata kuliah tersebut.

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

        <div class="card-header bg-danger text-white d-flex justify-content-between align-items-center">

            <h4 class="mb-0">
                <i class="fa-solid fa-clipboard-list"></i>
                Data KRS
            </h4>

            <a
                href="tambah.php"
                class="btn btn-light">

                <i class="fa-solid fa-plus"></i>
                Tambah KRS

            </a>

        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-hover">

                    <thead class="table-danger">

                        <tr>

                            <th class="text-center" width="60">No</th>
                            <th>Mahasiswa</th>
                            <th>Mata Kuliah</th>
                            <th class="text-center">Semester</th>
                            <th class="text-center">Tahun Ajaran</th>
                            <th class="text-center" width="150">Aksi</th>

                        </tr>

                    </thead>

                    <tbody>

                        <?php
                        $no = 1;

                        while ($row = mysqli_fetch_assoc($query)) :
                        ?>

                        <tr>

                            <td class="text-center"><?= $no++; ?></td>

                            <td><?= $row['nama_mahasiswa']; ?></td>

                            <td><?= $row['nama_mk']; ?></td>

                            <td class="text-center"><?= $row['semester']; ?></td>

                            <td class="text-center"><?= $row['tahun_ajaran']; ?></td>

                            <td class="text-center">

                                <a
                                    href="edit.php?id_krs=<?= $row['id_krs']; ?>"
                                    class="btn btn-warning btn-sm">

                                    <i class="fa-solid fa-pen-to-square"></i>

                                </a>

                                <a
                                    href="hapus.php?id_krs=<?= $row['id_krs']; ?>"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin ingin menghapus data KRS ini?')">

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