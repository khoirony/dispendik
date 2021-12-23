<?php
// menerima data dari form login
$userName = $_POST['username'];
$passWord = $_POST['password'];

// memulai session
session_start();

// menghubungkan database mysql
include('sambungan.php');

// memproses data dari form login
if ($userName != "" && $passWord != "") {
	// jika username & password tidak kosong
	// mencari data di database pengguna yang sesuai dengan data form login
	$sql = "SELECT * FROM pengguna WHERE username='$userName' AND password='$passWord'";
	$hasil = mysqli_query($conn, $sql);
	$jumlah = mysqli_num_rows($hasil);

	if ($jumlah > 0) {
		// jika data pengguna ditemukan 
		// menyimpan data pengguna kedalam session dan redirect ke dashbooard
		$row = mysqli_fetch_assoc($hasil);
		$_SESSION["id_user"] = $row["id"];
		$_SESSION["username"] = $row["username"];
		$_SESSION["password"] = $row["password"];
		$_SESSION["foto"] = $row["foto"];

		header("Location:dashboard.php");
	} else {
		// jika tidak ditemukan
		// mengirim pesan user/pass salah
		header('Location:login.php?pesan=3');
	}
} else if ($userName == "") {
	//jika username kosong
	// mengirim pesan form user kosong
	header('Location:login.php?pesan=1');
} else if ($passWord == "") {
	//jika password kosong
	// mengirim pesan form pass kosong
	header('Location:login.php?pesan=2');
} else {
	header('Location:login.php?pesan=4');
}
