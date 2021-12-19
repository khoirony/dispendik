<?php
$userName = $_POST['userName'];
$passWord = $_POST['passWord'];
include('sambungan.php');
$sql = "SELECT * FROM pengguna WHERE username='$userName' AND password='$passWord' ";
$query = mysqli_query($conn, $sql);
$admin = mysqli_fetch_array($query);

session_start();
$_SESSION['uName'] = $admin['username'];
$_SESSION['pWord'] = $admin['password'];

if (strcmp($passWord, $admin['password']) == 0) {
	header('Location:dashboard.php');
} else if (strcmp($passWord, "") == 0) {
	header('Location:login.php?login=pass');
} else if (strcmp($userName, "") == 0) {
	header('Location:login.php?login=user');
} else {
	header('Location:login.php?login=gagal');
}
