<?php
require_once 'middleware/auth.php';
require_once 'config/koneksi.php';

$jumlahMahasiswa = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT COUNT(*) AS total FROM mahasiswa")
);

$jumlahDosen = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT COUNT(*) AS total FROM dosen")
);

$jumlahMatakuliah = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT COUNT(*) AS total FROM matakuliah")
);

$jumlahKRS = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT COUNT(*) AS total FROM krs")
);

$jumlahNilai = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT COUNT(*) AS total FROM nilai")
);

include 'layout/header.php';
include 'layout/sidebar.php';
?>

<div class="container-fluid">

    <div class="bg-white rounded-4 shadow-sm p-4 mb-4">

    <h2 class="fw-bold text-primary mb-2">
        Dashboard
    </h2>

    <h5>
        Selamat Datang,
        <b><?= htmlspecialchars($_SESSION['nama']) ?></b> 👋
    </h5>

    <p class="text-muted mb-0">
        Kelola seluruh data akademik melalui menu di sebelah kiri.
    </p>

	<hr>

	<div class="alert alert-primary shadow-sm border-0">

		<div class="d-flex align-items-center mb-2">

			<i class="fa-solid fa-calendar-days text-primary me-2"></i>

			<strong id="tanggal"></strong>

		</div>

		<div class="d-flex align-items-center">

			<i class="fa-solid fa-clock text-success me-2"></i>

			<strong id="jam"></strong>

			<span class="ms-2 text-muted">WIB</span>

		</div>

</div>

</div>

    <div class="row">

        <div class="col-md-3 mb-3">
            <div class="card card-dashboard shadow">
                <div class="card-body text-center">
                    <i class="fa-solid fa-user-graduate fa-3x text-primary mb-3"></i>
                    <h5 class="fw-bold mt-2">
						Mahasiswa
					</h5>
					
					<h1 class="display-4 fw-bold
					text-primary">
						<?= $jumlahMahasiswa['total']; ?></h1>
						
					<p class ="text-muted mb-0">
						Total Data mahasiswa
					</p>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card card-dashboard shadow">
                <div class="card-body text-center">
                    <i class="fa-solid fa-chalkboard-user fa-3x text-success mb-3"></i>
                    <h5 class="fw-bold mt-2">
						Dosen
					</h5>
					
					<h1 class="display-4 fw-bold
					text-success">
						<?= $jumlahDosen['total']; ?></h1>
						
					<p class ="text-muted mb-0">
						Total Data Dosen
					</p>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card card-dashboard shadow">
                <div class="card-body text-center">
                    <i class="fa-solid fa-book fa-3x text-warning mb-3"></i>
                    <h5 class="fw-bold mt-2">
						Mata Kuliah
					</h5>
					
					<h1 class="display-4 fw-bold
					text-warning">
						<?= $jumlahMatakuliah['total']; ?></h1>
						
					<p class ="text-muted mb-0">
						Total Mata Kuliah
					</p>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card card-dashboard shadow">
                <div class="card-body text-center">
                    <i class="fa-solid fa-file-signature fa-3x text-danger mb-3"></i>
                    <h5 class="fw-bold mt-2">
						KRS
					</h5>
					
					<h1 class="display-4 fw-bold
					text-danger">
						<?= $jumlahKRS['total']; ?></h1>
						
					<p class ="text-muted mb-0">
						Total Data KRS
					</p>
                        </div>

    </div>

</div>

<!-- Card Nilai -->

<div class="col-md-3 mb-3">

    <div class="card card-dashboard shadow">

        <div class="card-body text-center">

            <i class="fa-solid fa-square-poll-vertical fa-3x mb-3"
               style="color:#6f42c1;"></i>

            <h5 class="fw-bold mt-2">
                Nilai
            </h5>

            <h1
                class="display-4 fw-bold"
                style="color:#6f42c1;">

                <?= $jumlahNilai['total']; ?>

            </h1>

            <p class="text-muted mb-0">
                Total Data Nilai
            </p>

        </div>

    </div>

</div>

</div>

</div>

<?php
include 'layout/footer.php';
?>

<script>

$(document).ready(function(){

    function tampilWaktu(){

        const sekarang = new Date();

        const hari = [
            "Minggu",
            "Senin",
            "Selasa",
            "Rabu",
            "Kamis",
            "Jumat",
            "Sabtu"
        ];

        const bulan = [
            "Januari",
            "Februari",
            "Maret",
            "April",
            "Mei",
            "Juni",
            "Juli",
            "Agustus",
            "September",
            "Oktober",
            "November",
            "Desember"
        ];

        let namaHari = hari[sekarang.getDay()];
        let tanggal = sekarang.getDate();
        let namaBulan = bulan[sekarang.getMonth()];
        let tahun = sekarang.getFullYear();

        let jam = String(sekarang.getHours()).padStart(2,'0');
        let menit = String(sekarang.getMinutes()).padStart(2,'0');
        let detik = String(sekarang.getSeconds()).padStart(2,'0');

        $("#tanggal").text(
            namaHari + ", " +
            tanggal + " " +
            namaBulan + " " +
            tahun
        );

        $("#jam").text(
            jam + ":" +
            menit + ":" +
            detik
        );

    }

    tampilWaktu();

    setInterval(tampilWaktu,1000);

});

</script>