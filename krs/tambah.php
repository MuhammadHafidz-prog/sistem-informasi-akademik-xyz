<?php
require_once '../middleware/auth.php';
require_once '../config/koneksi.php';

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
                Tambah Data KRS
            </h4>

        </div>

        <div class="card-body">

            <form action="proses_tambah.php" method="POST">

                <div class="mb-3">

                    <label class="form-label">
                        Mahasiswa
                    </label>

                    <select
						name="nim"
						id="nim"
						class="form-select"
						required>

                        <option value="">
                            -- Pilih Mahasiswa --
                        </option>

                        <?php while ($mhs = mysqli_fetch_assoc($query_mahasiswa)) : ?>

                            <option value="<?= $mhs['nim']; ?>">
                                <?= $mhs['nim']; ?> - <?= $mhs['nama_mahasiswa']; ?>
                            </option>

                        <?php endwhile; ?>

                    </select>
					<div id="info_mahasiswa" class="mt-3"></div>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Mata Kuliah
                    </label>

                    <select
                        name="kode_mk"
                        class="form-select"
                        required>

                        <option value="">
                            -- Pilih Mata Kuliah --
                        </option>

                        <?php while ($mk = mysqli_fetch_assoc($query_matakuliah)) : ?>

                            <option value="<?= $mk['kode_mk']; ?>">
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

                        <option value="">
                            -- Pilih Semester --
                        </option>

                        <?php for ($i = 1; $i <= 8; $i++) : ?>

                            <option value="<?= $i; ?>">
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
                        placeholder="Contoh: 2026/2027"
                        required>

                </div>

                <button
                    type="submit"
                    class="btn btn-danger">

                    <i class="fa-solid fa-floppy-disk"></i>
                    Simpan

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

<script>

$(document).ready(function(){

    $("#nim").change(function(){

        let nim = $(this).val();

        if(nim!=""){

            $("#info_mahasiswa").load(
                "ajax/get_mahasiswa.php?nim="+nim
            );

        }else{

            $("#info_mahasiswa").html("");

        }

    });

});

</script>