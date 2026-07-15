<?php
require_once '../middleware/auth.php';
require_once '../config/koneksi.php';

$mahasiswa = mysqli_query($conn, "SELECT * FROM mahasiswa ORDER BY nama_mahasiswa ASC");
$matakuliah = mysqli_query($conn, "SELECT * FROM matakuliah ORDER BY nama_mk ASC");

include '../layout/header.php';
include '../layout/sidebar.php';
?>

<div class="container-fluid">

    <div class="card shadow border-0">

        <div class="card-header bg-primary text-white">

            <h4 class="mb-0">
                <i class="fa-solid fa-square-poll-vertical"></i>
                Tambah Nilai
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
                        class="form-select"
                        required>

                        <option value="">
                            -- Pilih Mahasiswa --
                        </option>

                        <?php while($mhs = mysqli_fetch_assoc($mahasiswa)) : ?>

                            <option value="<?= $mhs['nim']; ?>">

                                <?= $mhs['nim']; ?> -
                                <?= $mhs['nama_mahasiswa']; ?>

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
						id="kode_mk"
						class="form-select"
						required>

                        <option value="">
                            -- Pilih Mata Kuliah --
                        </option>

                        <?php while($mk = mysqli_fetch_assoc($matakuliah)) : ?>

                            <option value="<?= $mk['kode_mk']; ?>">

                                <?= $mk['kode_mk']; ?> -
                                <?= $mk['nama_mk']; ?>

                            </option>

                        <?php endwhile; ?>

                    </select>

					<div id="info_matakuliah" class="mt-3"></div>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Semester
                    </label>

                    <select
                        name="semester"
                        class="form-select"
                        required>

                        <option value="Ganjil">
                            Ganjil
                        </option>

                        <option value="Genap">
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
                        placeholder="Contoh : 2025/2026"
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
                        required>

                </div>

                <button
                    type="submit"
                    class="btn btn-primary">

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

    $("#kode_mk").change(function(){

        let kode = $(this).val();

        if(kode!=""){

            $("#info_matakuliah").load(
                "ajax/get_matakuliah.php?kode_mk="+kode
            );

        }else{

            $("#info_matakuliah").html("");

        }

    });

});

</script>