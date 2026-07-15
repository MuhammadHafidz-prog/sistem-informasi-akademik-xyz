<?php
require_once '../middleware/auth.php';
require_once '../config/koneksi.php';

include '../layout/header.php';
include '../layout/sidebar.php';
?>

<div class="container-fluid">

    <div class="card shadow border-0">

        <div class="card-header bg-primary text-white">

            <h4 class="mb-0">
                <i class="fa-solid fa-user-plus"></i>
                Tambah Data Dosen
            </h4>

        </div>

        <div class="card-body">

            <form action="proses_tambah.php" method="POST">

                <div class="mb-3">

                    <label class="form-label">
                        NIDN
                    </label>

                    <input
					type="text"
					name="nidn"
					id="nidn"
					class="form-control"
					autocomplete="off"
					required>

				<div id="cek_nidn" class="mt-2"></div>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Nama Dosen
                    </label>

                    <input
                        type="text"
                        name="nama_dosen"
                        class="form-control"
                        placeholder="Masukkan Nama Dosen"
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
                        placeholder="Masukkan Alamat"
                        required></textarea>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        No HP
                    </label>

                    <input
                        type="text"
                        name="no_hp"
                        class="form-control"
                        placeholder="Masukkan Nomor HP"
                        required>

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

    $("#nidn").keyup(function(){

        let nidn = $(this).val();

        if(nidn.length > 0){

            $("#cek_nidn").load("ajax/cek_nidn.php?nidn=" + nidn);

        }else{

            $("#cek_nidn").html("");

        }

    });

});

</script>