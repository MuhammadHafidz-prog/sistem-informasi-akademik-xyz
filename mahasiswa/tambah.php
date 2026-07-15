<?php
require_once '../middleware/auth.php';

include '../layout/header.php';
include '../layout/sidebar.php';
?>

<div class="container-fluid">

    <div class="card shadow border-0">

        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">
                <i class="fa-solid fa-user-plus"></i>
                Tambah Data Mahasiswa
            </h4>
        </div>

        <div class="card-body">

            <form action="proses_tambah.php" method="POST">

                <div class="mb-3">
                    <label class="form-label">
                        NIM
                    </label>

                    <input
					type="text"
					name="nim"
					id="nim"
					class="form-control"
					autocomplete="off"
					required>

				<div id="cek_nim" class="mt-2"></div>
                </div>

                <div class="mb-3">
                    <label class="form-label">
                        Nama Mahasiswa
                    </label>

                    <input
                        type="text"
                        name="nama_mahasiswa"
                        class="form-control"
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
                            required>

                        <label class="form-check-label">
                            Laki-Laki
                        </label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input
                            class="form-check-input"
                            type="radio"
                            name="jk"
                            value="P">

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
                        rows="4"
                        class="form-control"
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
                        required>
                </div>

                <div class="d-flex gap-2">

                    <button
                        type="submit"
                        class="btn btn-primary">

                        <i class="fa-solid fa-save"></i>
                        Simpan

                    </button>

                    <a
                        href="index.php"
                        class="btn btn-secondary">

                        <i class="fa-solid fa-arrow-left"></i>
                        Kembali

                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

<?php
include '../layout/footer.php';
?>

<script>

$(document).ready(function(){

    $("#nim").keyup(function(){

        let nim = $(this).val();

        if(nim.length > 0){

            $("#cek_nim").load("ajax/cek_nim.php?nim=" + nim);

        }else{

            $("#cek_nim").html("");

        }

    });

});

</script>