<?php
require_once '../middleware/auth.php';
require_once '../config/koneksi.php';

if (!isset($_GET['nidn'])) {
    header("Location: index.php");
    exit;
}

$nidn = mysqli_real_escape_string($conn, $_GET['nidn']);

$query = mysqli_query($conn, "SELECT * FROM dosen WHERE nidn='$nidn'");

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

        <div class="card-header bg-primary text-white">

            <h4 class="mb-0">
                <i class="fa-solid fa-user-pen"></i>
                Edit Data Dosen
            </h4>

        </div>

        <div class="card-body">

            <form action="proses_edit.php" method="POST">

                <!-- NIDN Lama -->
                <input
                    type="hidden"
                    name="nidn_lama"
                    value="<?= $data['nidn']; ?>">

                <div class="mb-3">

                    <label class="form-label">
                        NIDN
                    </label>

                    <input
                        type="text"
                        class="form-control"
                        value="<?= $data['nidn']; ?>"
                        disabled>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Nama Dosen
                    </label>

                    <input
                        type="text"
                        name="nama_dosen"
                        class="form-control"
                        value="<?= $data['nama_dosen']; ?>"
                        required>

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