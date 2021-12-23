<?php
    session_start();
	if($_SESSION['pWord']==""){
		header('Location:login.php?login=belum');
	}
	// Menghubungkan databse
include('sambungan.php');
// menangkap id database
$id = $_GET['id'];
$sql = mysqli_query($conn, "DELETE FROM surat_keluar WHERE id_suratkeluar=$id");
header('Location:surkelmenu.php');
