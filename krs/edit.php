<?php
require_once '../middleware/auth.php';
require_once '../config/koneksi.php';

if (!isset($_GET['id_krs'])) {
    header("Location: index.php");
    exit;
}

$id_krs = mysqli_real_escape_string($conn, $_GET['id_krs']);

$query = mysqli_query($conn, "
    SELECT *
    FROM krs
    WHERE id_krs = '$id_krs'
");

if (mysqli_num_rows($query) == 0) {
    header("Location: index.php");
    exit;
}

$data = mysqli_fetch_assoc($query);

// Ambil data mahasiswa
$query_mahasiswa = mysqli_query($conn, "
    SELECT *
    FROM mahasiswa
    ORDER BY nama_mahasiswa ASC
");

// Ambil data mata kuliah
$query_matakuliah = mysqli_query($conn, "
    SELECT *
    FROM matakuliah
    ORDER BY nama_mk ASC
");

include '../layout/header.php';
include '../layout/sidebar.php';
?>

<div class="container-fluid">

    <div class="card shadow border-0">

        <div class="card-header bg-danger text-white">

            <h4 class="mb-0">
                <i class="fa-solid fa-clipboard-list"></i>
                Edit Data KRS
            </h4>

        </div>

        <div class="card-body">

            <form action="proses_edit.php" method="POST">

                <input
                    type="hidden"
                    name="id_krs"
                    value="<?= $data['id_krs']; ?>">

                <div class="mb-3">

                    <label class="form-label">
                        Mahasiswa
                    </label>

                    <select
                        name="nim"
                        class="form-select"
                        required>

                        <?php while ($mhs = mysqli_fetch_assoc($query_mahasiswa)) : ?>

                            <option
                                value="<?= $mhs['nim']; ?>"
                                <?= ($mhs['nim'] == $data['nim']) ? 'selected' : ''; ?>>

                                <?= $mhs['nim']; ?> - <?= $mhs['nama_mahasiswa']; ?>

                            </option>

                        <?php endwhile; ?>

                    </select>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Mata Kuliah
                    </label>

                    <select
                        name="kode_mk"
                        class="form-select"
                        required>

                        <?php while ($mk = mysqli_fetch_assoc($query_matakuliah)) : ?>

                            <option
                                value="<?= $mk['kode_mk']; ?>"
                                <?= ($mk['kode_mk'] == $data['kode_mk']) ? 'selected' : ''; ?>>

                                <?= $mk['kode_mk']; ?> - <?= $mk['nama_mk']; ?>

                            </option>

                        <?php endwhile; ?>

                    </select>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Semester
                    </label>

                    <select
                        name="semester"
                        class="form-select"
                        required>

                        <?php for ($i = 1; $i <= 8; $i++) : ?>

                            <option
                                value="<?= $i; ?>"
                                <?= ($i == $data['semester']) ? 'selected' : ''; ?>>

                                Semester <?= $i; ?>

                            </option>

                        <?php endfor; ?>

                    </select>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Tahun Ajaran
                    </label>

                    <input
                        type="text"
                        name="tahun_ajaran"
                        class="form-control"
                        value="<?= $data['tahun_ajaran']; ?>"
                        required>

                </div>

                <button
                    type="submit"
                    class="btn btn-danger">

                    <i class="fa-solid fa-floppy-disk"></i>
                    Simpan Perubahan

                </button>

                <a
                    href="index.php"
                    class="btn btn-secondary">

                    <i class="fa-solid fa-arrow-left"></i>
                    Kembali

                </a>

            </form>

        </div>

    </div>

</div>

<?php
include '../layout/footer.php';
?>