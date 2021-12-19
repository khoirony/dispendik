<?php
// session_start();
// if($_SESSION['pWord']==""){
// 	header('Location:login.php?login=belum');
// }
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
	<?php
	include('sambungan.php');
	?>
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
				<?php include('headuser.php'); ?>
				<!-- End of Topbar -->

				<!-- Begin Page Content -->
				<div class="container ps-5 pe-5">

					<br><br><br><br>

					<!-- Page Heading -->
					<h1 class="h3 mb-4 mt-2 text-gray-800"><i class="fas fa-tachometer-alt"></i> DASHBOARD</h1>

					<div class="row text-white pt-3 pb-5">
						<div class="card bg-info ms-3" style="width: 19rem;">
							<div class="card-body">
								<div class="card-body-icon">
									<i class="far fa-paper-plane"></i>
								</div>
								<h5 class="card-title">Jumlah Surat Masuk</h5>
								<div class="display-4">
									<?php
									$sql = 'SELECT* FROM surat_masuk';
									$query = mysqli_query($conn, $sql);
									$data = array();
									while ($row = mysqli_fetch_array($query)) {
										$data[] = $row;
									}
									$hitung = count($data);
									echo $hitung;
									?>
								</div>
								<a href="surmasmenu.php">
									<p class="card-text text-white">Lihat Detail <i class="fas fa-angle-double-right ml-2"></i></p>
								</a>
							</div>
						</div>

						<div class="card bg-success ml-5" style="width: 19rem;">
							<div class="card-body">
								<div class="card-body-icon">
									<i class="fas fa-paper-plane"></i>
								</div>
								<h5 class="card-title">Jumlah Surat Keluar</h5>
								<div class="display-4">
									<?php
									$sql = 'SELECT* FROM surat_keluar';
									$query = mysqli_query($conn, $sql);
									$data = array();
									while ($row = mysqli_fetch_array($query)) {
										$data[] = $row;
									}
									$hitung = count($data);
									echo $hitung;
									?>
								</div>
								<a href="surkelmenu.php">
									<p class="card-text text-white">Lihat Detail <i class="fas fa-angle-double-right ml-2"></i></p>
								</a>
							</div>
						</div>

						<div class="card bg-warning ml-5" style="width: 19rem;">
							<div class="card-body">
								<div class="card-body-icon">
									<i class="fas fa-users"></i>
								</div>
								<h5 class="card-title">Jumlah User</h5>
								<div class="display-4">
									<?php
									$sql = 'SELECT* FROM pengguna';
									$query = mysqli_query($conn, $sql);
									$data = array();
									while ($row = mysqli_fetch_array($query)) {
										$data[] = $row;
									}
									$hitung = count($data);
									echo $hitung;
									?>
								</div>
								<a href="profil.php">
									<p class="card-text text-white">Lihat Detail <i class="fas fa-angle-double-right ml-2"></i></p>
								</a>
							</div>
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