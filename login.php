<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Judul -->
	<title>Login Admin</title>
</head>

<body>
	<!-- Navbar -->
	<?php include('header.php'); ?>

	<div class="container">

		<!-- Wadah Form Login -->
		<div class="row justify-content-center">
			<div class="col-md-5 login p-5 shadow">
				<p class="text-center text-dark fs-2 fw-bold">Login Admin</p>
				<br>
				<!-- notifikasi error login -->
				<div id="pesan"></div>
				<br>

				<!-- Form Login -->
				<form method="post" action="loginproses.php">
					<div class="mb-4">
						<input type="text" class="form-control form-control-lg lengkung" id="username" name="username" placeholder="Username">
					</div>
					<div class="mb-4">
						<input type="password" class="form-control form-control-lg lengkung" id="Password" name="password" placeholder="Password">
					</div>
					<button type="submit" class="btn btn-primary btn-lg col-12 lengkung">Submit</button>
					<br><br>
				</form>
				<p class="text-center">Belum punya akun? <a href="daftar.php">Daftar disini</a></p>
			</div>
		</div>
	</div>
</body>

<script>
	// Mengambil pesan php GET dari url
	function GetURLParameter(sParam) {
		var sPageURL = window.location.search.substring(1);
		var sURLVariables = sPageURL.split('&');
		for (var i = 0; i < sURLVariables.length; i++) {
			var sParameterName = sURLVariables[i].split('=');
			if (sParameterName[0] == sParam) {
				return sParameterName[1];
			}
		}
	}
	var pesan = GetURLParameter('pesan');
	var temp = document.getElementById("pesan").value;

	// pesan dari url diterjemahkan dan ditampilkan ke dalam html
	if (pesan == 3) {
		document.getElementById("pesan").innerHTML = 'Username dan Password salah!';
	} else if (pesan == 1) {
		document.getElementById("pesan").innerHTML = "Form username kosong!";
	} else if (pesan == 2) {
		document.getElementById("pesan").innerHTML = 'Form password kosong!';
	} else if (pesan == 4) {
		document.getElementById("pesan").innerHTML = 'Mohon isi form terlebih dahulu';
	}
</script>

</html>