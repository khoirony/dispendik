<?php
    session_start();
	if($_SESSION['pWord']==""){
		header('Location:login.php?login=belum');
	}

	// Menghubungkan database
	include('sambungan.php');

	// Menangkap Id
	$id = $_GET['id'];

	// Menghapus data sesuai id
	$sql = mysqli_query($conn, "DELETE FROM surat_masuk WHERE id_suratmasuk=$id");

	// kembali ke halaman semula
	header('Location:surmasmenu.php');
