<?php
require_once '../middleware/auth.php';
require_once '../config/koneksi.php';

$query = mysqli_query($conn, "
    SELECT
        nilai.*,
        mahasiswa.nama_mahasiswa,
        matakuliah.nama_mk,
        matakuliah.sks
    FROM nilai
    INNER JOIN mahasiswa
        ON nilai.nim = mahasiswa.nim
    INNER JOIN matakuliah
        ON nilai.kode_mk = matakuliah.kode_mk
    ORDER BY nilai.id_nilai DESC
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

    Data nilai berhasil ditambahkan.

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

    Data nilai berhasil diperbarui.

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

    Data nilai berhasil dihapus.

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

    Data nilai sudah terdaftar.

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

        <div class="card-header bg-primary text-white">

            <h4 class="mb-0">
                <i class="fa-solid fa-square-poll-vertical"></i>
                Data Nilai
            </h4>

        </div>

        <div class="card-body">

            <a
                href="tambah.php"
                class="btn btn-primary mb-3">

                <i class="fa-solid fa-plus"></i>
                Tambah Nilai

            </a>

            <div class="table-responsive">

                <table class="table table-bordered table-hover align-middle">

                    <thead class="table-primary">

                        <tr>

                            <th width="5%">No</th>

                            <th>NIM</th>

                            <th>Nama Mahasiswa</th>

                            <th>Mata Kuliah</th>

                            <th>SKS</th>

                            <th>Semester</th>

                            <th>Tahun Ajaran</th>

                            <th>Nilai Angka</th>

                            <th>Nilai Huruf</th>

                            <th width="15%">Aksi</th>

                        </tr>

                    </thead>

                    <tbody>

                        <?php
                        $no = 1;

                        while ($data = mysqli_fetch_assoc($query)) :
                        ?>

                            <tr>

                                <td><?= $no++; ?></td>

                                <td><?= $data['nim']; ?></td>

                                <td><?= $data['nama_mahasiswa']; ?></td>

                                <td><?= $data['nama_mk']; ?></td>

                                <td><?= $data['sks']; ?></td>

                                <td><?= $data['semester']; ?></td>

                                <td><?= $data['tahun_ajaran']; ?></td>

                                <td><?= $data['nilai_angka']; ?></td>

                                <td>

                                    <span class="badge bg-success">

                                        <?= $data['nilai_huruf']; ?>

                                    </span>

                                </td>

                                <td>

                                    <a
                                        href="edit.php?id=<?= $data['id_nilai']; ?>"
                                        class="btn btn-warning btn-sm">

                                        <i class="fa-solid fa-pen-to-square"></i>

                                    </a>

                                    <a
                                        href="hapus.php?id=<?= $data['id_nilai']; ?>"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus data nilai ini?')">

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