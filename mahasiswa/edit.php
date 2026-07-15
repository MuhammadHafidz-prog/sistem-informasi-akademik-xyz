<?php
require_once '../middleware/auth.php';
require_once '../config/koneksi.php';

if (!isset($_GET['nim'])) {
    header("Location: index.php");
    exit;
}

$nim = mysqli_real_escape_string($conn, $_GET['nim']);

$query = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE nim='$nim'");

if (mysqli_num_rows($query) == 0) {
    header("Location: index.php");
    exit;
}

$data = mysqli_fetch_assoc($query);

include '../layout/header.php';
include '../layout/sidebar.php';
?>

<div class="container-fluid">

    <div class="card shadow border-0">

        <div class="card-header bg-warning text-dark">

            <h4 class="mb-0">
                <i class="fa-solid fa-user-pen"></i>
                Edit Data Mahasiswa
            </h4>

        </div>

        <div class="card-body">

            <form action="proses_edit.php" method="POST">

                <input
                    type="hidden"
                    name="nim_lama"
                    value="<?= $data['nim']; ?>">

                <div class="mb-3">

                    <label class="form-label">
                        NIM
                    </label>

                    <input
                        type="text"
                        class="form-control"
                        value="<?= $data['nim']; ?>"
                        disabled>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Nama Mahasiswa
                    </label>

                    <input
                        type="text"
                        name="nama_mahasiswa"
                        class="form-control"
                        value="<?= $data['nama_mahasiswa']; ?>"
                        required>

                </div>

                <div class="mb-3">

                    <label class="form-label d-block">
                        Jenis Kelamin
                    </label>

                    <div class="form-check form-check-inline">

                        <input
                            class="form-check-input"
                            type="radio"
                            name="jk"
                            value="L"
                            <?= ($data['jk'] == 'L') ? 'checked' : ''; ?>>

                        <label class="form-check-label">
                            Laki-Laki
                        </label>

                    </div>

                    <div class="form-check form-check-inline">

                        <input
                            class="form-check-input"
                            type="radio"
                            name="jk"
                            value="P"
                            <?= ($data['jk'] == 'P') ? 'checked' : ''; ?>>

                        <label class="form-check-label">
                            Perempuan
                        </label>

                    </div>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Alamat
                    </label>

                    <textarea
                        name="alamat"
                        class="form-control"
                        rows="4"
                        required><?= $data['alamat']; ?></textarea>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        No HP
                    </label>

                    <input
                        type="text"
                        name="no_hp"
                        class="form-control"
                        value="<?= $data['no_hp']; ?>"
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