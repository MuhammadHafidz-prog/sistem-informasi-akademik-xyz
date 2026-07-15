<?php
require_once '../middleware/auth.php';
require_once '../config/koneksi.php';

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
                Tambah Data Mata Kuliah
            </h4>

        </div>

        <div class="card-body">

            <form action="proses_tambah.php" method="POST">

                <div class="mb-3">

                    <label class="form-label">
                        Kode Mata Kuliah
                    </label>

                    <input
					type="text"
					name="kode_mk"
					id="kode_mk"
					class="form-control"
					placeholder="Masukkan Kode Mata Kuliah"
					autocomplete="off"
					required>

				<div id="cek_kode" class="mt-2"></div>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Nama Mata Kuliah
                    </label>

                    <input
                        type="text"
                        name="nama_mk"
                        class="form-control"
                        placeholder="Masukkan Nama Mata Kuliah"
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
                        placeholder="Masukkan Jumlah SKS"
                        min="1"
                        max="6"
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

                        <option value="">
                            -- Pilih Dosen --
                        </option>

                        <?php while ($dosen = mysqli_fetch_assoc($query_dosen)) : ?>

                            <option value="<?= $dosen['nidn']; ?>">
                                <?= $dosen['nidn']; ?> - <?= $dosen['nama_dosen']; ?>
                            </option>

                        <?php endwhile; ?>

                    </select>

                </div>

                <button
                    type="submit"
                    class="btn btn-success">

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

    $("#kode_mk").keyup(function(){

        let kode = $(this).val();

        if(kode.length > 0){

            $("#cek_kode").load("ajax/cek_kode.php?kode_mk=" + kode);

        }else{

            $("#cek_kode").html("");

        }

    });

});

</script>