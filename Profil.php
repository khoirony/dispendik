<?php
session_start();
if ($_SESSION['password'] == "") {
	header('Location:login.php?pesan=4');
}
?>
<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Dashboard</title>
</head>

<body>
	<!-- Page Wrapper -->
	<div id="wrapper">

		<!-- Sidebar -->
		<?php include('menu.php'); ?>
		<!-- End of Sidebar -->

		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">

			<!-- Main Content -->
			<div id="content">

				<!-- Topbar -->
				<?php include('surkelnav.php'); ?>
				<!-- End of Topbar -->

				<!-- Begin Page Content -->
				<div class="container ps-5 pe-5">

					<br><br><br><br>

					<!-- Page Heading -->
					<h1 class="h3 mb-4 mt-2 text-gray-800"><i class="fas fa-fw fa-user"></i> MY PROFILE</h1>

					<br><br>

					<div class="row justify-content-center">
						<div class="col-md-3">
							<img src="./img/<?= $_SESSION['foto'] ?>" class="border-0 rounded-circle" style="height: 200px;">
						</div>
						<div class="col-2 pt-5">
							ID User <br><br>
							Username <br><br>
							Password <br>
						</div>
						<div class="col-3 pt-5">
							<?php echo $_SESSION['id_user']; ?> <br><br>
							<?php echo $_SESSION['username']; ?> <br><br>
							<?php echo $_SESSION['password']; ?> <br>
						</div>
					</div>

				</div>
				<!-- /.container-fluid -->

			</div>
			<!-- End of Main Content -->

			<!-- Footer -->
			<footer class="sticky-footer bg-white">
				<div class="container my-auto">
					<div class="copyright text-center my-auto">
						<span>Copyright &copy; 2020 All Right Reserved - Developed by Khoirony Arief</span>
					</div>
				</div>
			</footer>
			<!-- End of Footer -->

		</div>
		<!-- End of Content Wrapper -->

	</div>
	<!-- End of Page Wrapper -->
</body>

</html>