<?php
    session_start();
	if($_SESSION['pWord']==""){
		header('Location:login.php?login=belum');
	}
$id = $_GET['id'];
include('sambungan.php');
$sql = mysqli_query($conn, "DELETE FROM surat_keluar WHERE id_suratkeluar=$id");
header('Location:surkelmenu.php');
?>