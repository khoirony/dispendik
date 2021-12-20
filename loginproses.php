<?php
$userName = $_POST['username'];
$passWord = $_POST['password'];


session_start();
include('sambungan.php');

if ($userName != "" && $passWord != "") {
	$sql = "SELECT * FROM pengguna WHERE username='$userName' AND password='$passWord'";
	$hasil = mysqli_query($conn, $sql);
	$jumlah = mysqli_num_rows($hasil);

	if ($jumlah > 0) {
		$row = mysqli_fetch_assoc($hasil);
		$_SESSION["id_user"] = $row["id"];
		$_SESSION["username"] = $row["username"];
		$_SESSION["password"] = $row["password"];
		$_SESSION["foto"] = $row["foto"];


		header("Location:dashboard.php");
	} else {
		header('Location:login.php?pesan=3');
	}
} else if ($userName == "") {
	header('Location:login.php?pesan=1');
} else if ($passWord == "") {
	header('Location:login.php?pesan=2');
} else {
	header('Location:login.php?pesan=4');
}
