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

	<title>List Pengguna</title>
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
					<h1 class="h3 mb-4 mt-2 text-gray-800"><i class="fas fa-users"></i> LIST PENGGUNA</h1>

					<table class="table table-sm table-bordered col-sm-9">
						<tbody>
							<?php
							$sql = "SELECT* FROM pengguna order by id DESC";
							$query = mysqli_query($conn, $sql);
							while ($row = mysqli_fetch_array($query)) {
								echo '
								<tr class="align-middle">
								<th scope="col" style="width: 7rem;">';

								$foto = $row['foto'];
								if ($foto == true) {
									echo '<img src="./img/' . $row['foto'] . ' " class="border-0"  style="height: 100px;">';
								} else {
									echo '<img src="profile.png" class="border-0"  style="height: 100px;">';
								}
								echo '
								</th>
								<th scope="col" class="align-text-bottom">
								<p class="font-weight-normal">
								Username : ' . $row['username'] . '<br/>
								Password : ' . $row['password'] . '<br/>
								Sebagai : Admin</p>
								</th></tr>';
							}
							?>
						</tbody>
					</table>

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