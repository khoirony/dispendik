<?php
$conn = mysqli_connect("localhost", "root", "", "dispendik");

// cek koneksi berhasil/gagal
if (!$conn) {
	die("Koneksi gagal:" . mysqli_connect_error());
}
