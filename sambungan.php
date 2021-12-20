<?php
	$conn=mysqli_connect("localhost","root","","dispendik");
	
	if (!$conn) {
		die("Koneksi gagal:" . mysqli_connect_error());
	}
