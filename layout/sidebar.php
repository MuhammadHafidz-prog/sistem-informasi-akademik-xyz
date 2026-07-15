<?php
require_once __DIR__ . '/../config/config.php';
?>

<div class="d-flex">

    <!-- Sidebar -->
    <div class="sidebar">

        <div class="text-center text-white py-4">

            <i class="fa-solid fa-user-graduate fa-3x"></i>

            <h4 class="mt-3">
                Akademik XYZ
            </h4>

            <small>Sistem Informasi Akademik</small>

        </div>

        <hr class="text-white">

        <a href="<?= $base_url ?>dashboard.php">
			<i class="fa-solid fa-house"></i>
			Dashboard
		</a>

		<a href="<?= $base_url ?>mahasiswa/index.php">
			<i class="fa-solid fa-user-graduate"></i>
			Mahasiswa
		</a>

		<a href="<?= $base_url ?>dosen/index.php">
			<i class="fa-solid fa-chalkboard-user"></i>
			Dosen
		</a>

		<a href="<?= $base_url ?>matakuliah/index.php">
			<i class="fa-solid fa-book"></i>
			Mata Kuliah
		</a>

		<a href="<?= $base_url ?>krs/index.php">
			<i class="fa-solid fa-file-signature"></i>
			KRS
		</a>

		<a href="<?= $base_url ?>nilai/index.php">
			<i class="fa-solid fa-square-poll-vertical"></i>
			Nilai
		</a>

		<a href="<?= $base_url ?>logout.php">
			<i class="fa-solid fa-right-from-bracket"></i>
			Logout
		</a>

    </div>

    <!-- Content -->
    <div class="content p-4">