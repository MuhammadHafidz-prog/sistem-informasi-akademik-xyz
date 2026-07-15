<?php
require_once '../middleware/auth.php';
require_once '../config/koneksi.php';

if (!isset($_GET['kode_mk'])) {
    header("Location: index.php");
    exit;
}

$kode_mk = mysqli_real_escape_string($conn, $_GET['kode_mk']);

$query = mysqli_query($conn, "
    SELECT *
    FROM matakuliah
    WHERE kode_mk = '$kode_mk'
");

if (mysqli_num_rows($query) == 0) {
    header("Location: index.php");
    exit;
}

$data = mysqli_fetch_assoc($query);

// Ambil data dosen untuk dropdown
$query_dosen = mysqli_query($conn, "
    SELECT *
    FROM dosen
    ORDER BY nama_dosen ASC
");

include '../layout/header.php';
include '../layout/sidebar.php';
?>

<div class="container-fluid">

    <div class="card shadow border-0">

        <div class="card-header bg-success text-white">

            <h4 class="mb-0">
                <i class="fa-solid fa-book"></i>
                Edit Data Mata Kuliah
            </h4>

        </div>

        <div class="card-body">

            <form action="proses_edit.php" method="POST">

                <input
                    type="hidden"
                    name="kode_mk_lama"
                    value="<?= $data['kode_mk']; ?>">

                <div class="mb-3">

                    <label class="form-label">
                        Kode Mata Kuliah
                    </label>

                    <input
                        type="text"
                        class="form-control"
                        value="<?= $data['kode_mk']; ?>"
                        readonly>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Nama Mata Kuliah
                    </label>

                    <input
                        type="text"
                        name="nama_mk"
                        class="form-control"
                        value="<?= $data['nama_mk']; ?>"
                        required>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        SKS
                    </label>

                    <input
                        type="number"
                        name="sks"
                        class="form-control"
                        min="1"
                        max="6"
                        value="<?= $data['sks']; ?>"
                        required>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Dosen Pengampu
                    </label>

                    <select
                        name="nidn"
                        class="form-select"
                        required>

                        <?php while ($dosen = mysqli_fetch_assoc($query_dosen)) : ?>

                            <option
                                value="<?= $dosen['nidn']; ?>"
                                <?= ($dosen['nidn'] == $data['nidn']) ? 'selected' : ''; ?>>

                                <?= $dosen['nidn']; ?> - <?= $dosen['nama_dosen']; ?>

                            </option>

                        <?php endwhile; ?>

                    </select>

                </div>

                <button
                    type="submit"
                    class="btn btn-success">

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