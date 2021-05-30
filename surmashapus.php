<?php
    session_start();
	if($_SESSION['pWord']==""){
		header('Location:login.php?login=belum');
	}
$id = $_GET['id'];
include('sambungan.php');
$sql = mysqli_query($conn, "DELETE FROM surat_masuk WHERE id_suratmasuk=$id");
header('Location:surmasmenu.php');
?>