<?php
    session_start();
	if($_SESSION['pWord']==""){
		header('Location:login.php?login=belum');
	}
include('sambungan.php');
$id = $_GET['id'];
$sql = mysqli_query($conn, "DELETE FROM surat_keluar WHERE id_suratkeluar=$id");
header('Location:surkelmenu.php');
?>