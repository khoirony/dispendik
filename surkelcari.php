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

	<!-- Judul -->
	<title>Surat Masuk</title>
</head>

<body>
	<?php
	// menghubungkan database
	include('sambungan.php');

	// menangkap data get form pencarian
	$cari = @$_GET['cari'];
	$pilihan = @$_GET['pilihan'];
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
				<?php include('surkelnav.php'); ?>
				<!-- End of Topbar -->

				<!-- Begin Page Content -->
				<div class="container ps-5 pe-5">

					<br><br><br><br>

					<!-- Page Heading -->
					<h1 class="h3 mb-4 mt-2 text-gray-800"><i class="fas fa-paper-plane"></i> HASIL PENCARIAN DARI "<?php echo $cari; ?> "</h1>
					<hr>

					<!-- Menampilkan List Hasil Pencarian -->
					<table class="table table-sm table-striped table-bordered">
						<thead>
							<tr>
								<th scope="col">
									<p class="text-center">No</p>
								</th>
								<th scope="col">
									<p class="text-left">Nomor Surat</p>
								</th>
								<th scope="col">
									<p class="text-left">Tanggal Surat</p>
								</th>
								<th scope="col">
									<p class="text-left">Surat Ke</p>
								</th>
								<th scope="col" style="width: 3rem;">
									<p class="text-center">Opsi</p>
								</th>
							</tr>
						</thead>
						<tbody>
							<?php
							if ($pilihan == "Kepada") {
								// Jika Pilihan yang dipilih berdasarkan tujuan surat
								$sql = "SELECT* FROM surat_keluar WHERE surat_ke LIKE '%" . $cari . "%'";
								$query = mysqli_query($conn, $sql);
								$no = 1;

								while ($row = mysqli_fetch_array($query)) {
									echo '
									<tr class="align-middle"><th scope="col"><p class="font-weight-normal">' . $no . '</p></th>
									<th scope="col"><p class="font-weight-normal">' . $row['nmr_surat'] . '</p></th>
									<th scope="col"><p class="font-weight-normal">' . $row['tgl_surat'] . '</p></th>
									<th scope="col"><p class="font-weight-normal">' . $row['surat_ke'] . '</p></th>
									<th scope="col"><p class="font-weight-normal"><center>
									<div class="btn-group btn-group-toggle" data-toggle="buttons">
									<label class="btn btn-white btn-sm">
										<a href="surkelfull.php?id=' . $row['id_suratkeluar'] . '" class="text-dark">
										<input type="radio" name="options" id="option1"> <i class="far fa-envelope-open fa-xs"></i>
										</a>
									</label>
									<label class="btn btn-white btn-sm">
										<a href="surkeledit.php?id=' . $row['id_suratkeluar'] . '" class="text-dark">
										<input type="radio" name="options" id="option2"> <i class="far fa-edit fa-xs"></i>
										</a>
									</label>
									<label class="btn btn-secondary active btn-sm">
										<a href="surkelhapus.php?id=' . $row['id_suratkeluar'] . '" class="text-white">
										<input type="radio" name="options" id="option3"> <i class="far fa-trash-alt fa-xs"></i>
										</a>
									</label>
									</div></center>
									</p></th></tr>';
									$no++;
								}
							} else if ($pilihan == "Nomor") {
								// Jika Pilihan yang dipilih berdasarkan nomor surat
								$sql = "SELECT* FROM surat_keluar WHERE nmr_surat LIKE '%" . $cari . "%'";
								$query = mysqli_query($conn, $sql);
								$no = 1;

								while ($row = mysqli_fetch_array($query)) {
									echo '
									<tr class="align-middle"><th scope="col"><p class="font-weight-normal">' . $no . '</p></th>
									<th scope="col"><p class="font-weight-normal">' . $row['nmr_surat'] . '</p></th>
									<th scope="col"><p class="font-weight-normal">' . $row['tgl_surat'] . '</p></th>
									<th scope="col"><p class="font-weight-normal">' . $row['surat_ke'] . '</p></th>
									<th scope="col"><p class="font-weight-normal"><center>
									<div class="btn-group btn-group-toggle" data-toggle="buttons">
									<label class="btn btn-white btn-sm">
										<a href="surkelfull.php?id=' . $row['id_suratkeluar'] . '" class="text-dark">
										<input type="radio" name="options" id="option1"> <i class="far fa-envelope-open fa-xs"></i>
										</a>
									</label>
									<label class="btn btn-white btn-sm">
										<a href="surkeledit.php?id=' . $row['id_suratkeluar'] . '" class="text-dark">
										<input type="radio" name="options" id="option2"> <i class="far fa-edit fa-xs"></i>
										</a>
									</label>
									<label class="btn btn-secondary active btn-sm">
										<a href="surkelhapus.php?id=' . $row['id_suratkeluar'] . '" class="text-white">
										<input type="radio" name="options" id="option3"> <i class="far fa-trash-alt fa-xs"></i>
										</a>
									</label>
									</div></center>
									</p></th></tr>';
									$no++;
								}
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