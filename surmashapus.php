<?php
    session_start();
	if($_SESSION['pWord']==""){
		header('Location:login.php?login=belum');
	}
include('sambungan.php');
$id = $_GET['id'];
$sql = mysqli_query($conn, "DELETE FROM surat_masuk WHERE id_suratmasuk=$id");
header('Location:surmasmenu.php');
?>