<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Login Admin</title>
</head>

<body>
	<?php include('header.php'); ?>

	<div class="container">

		<div class="row justify-content-center">
			<div class="col-md-5 login p-5 shadow">
				<p class="text-center text-dark fs-2 fw-bold">Login Admin</p>
				<br>
				<div id="pesan"></div>
				<br>
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
	<!-- Optional JavaScript; choose one of the two! -->

	<!-- Option 1: Bootstrap Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

<script>
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