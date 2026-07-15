<?php
require_once '../middleware/auth.php';
require_once '../config/koneksi.php';

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$id = mysqli_real_escape_string($conn, $_GET['id']);

$query = mysqli_query($conn, "
    SELECT *
    FROM nilai
    WHERE id_nilai = '$id'
");

if (mysqli_num_rows($query) == 0) {
    header("Location: index.php");
    exit;
}

$data = mysqli_fetch_assoc($query);

$mahasiswa = mysqli_query($conn, "
    SELECT *
    FROM mahasiswa
    ORDER BY nama_mahasiswa ASC
");

$matakuliah = mysqli_query($conn, "
    SELECT *
    FROM matakuliah
    ORDER BY nama_mk ASC
");

include '../layout/header.php';
include '../layout/sidebar.php';
?>

<div class="container-fluid">

    <div class="card shadow border-0">

        <div class="card-header bg-warning text-dark">

            <h4 class="mb-0">
                <i class="fa-solid fa-pen-to-square"></i>
                Edit Nilai
            </h4>

        </div>

        <div class="card-body">

            <form action="proses_edit.php" method="POST">

                <input
                    type="hidden"
                    name="id_nilai"
                    value="<?= $data['id_nilai']; ?>">

                <div class="mb-3">

                    <label class="form-label">
                        Mahasiswa
                    </label>

                    <select
                        name="nim"
                        class="form-select"
                        required>

                        <?php while ($mhs = mysqli_fetch_assoc($mahasiswa)) : ?>

                            <option
                                value="<?= $mhs['nim']; ?>"
                                <?= ($data['nim'] == $mhs['nim']) ? 'selected' : ''; ?>>

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

                        <?php while ($mk = mysqli_fetch_assoc($matakuliah)) : ?>

                            <option
                                value="<?= $mk['kode_mk']; ?>"
                                <?= ($data['kode_mk'] == $mk['kode_mk']) ? 'selected' : ''; ?>>

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

                        <option
                            value="Ganjil"
                            <?= ($data['semester'] == 'Ganjil') ? 'selected' : ''; ?>>
                            Ganjil
                        </option>

                        <option
                            value="Genap"
                            <?= ($data['semester'] == 'Genap') ? 'selected' : ''; ?>>
                            Genap
                        </option>

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

                <div class="mb-3">

                    <label class="form-label">
                        Nilai Angka
                    </label>

                    <input
                        type="number"
                        name="nilai_angka"
                        class="form-control"
                        min="0"
                        max="100"
                        value="<?= $data['nilai_angka']; ?>"
                        required>

                </div>

                <button
                    type="submit"
                    class="btn btn-warning">

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