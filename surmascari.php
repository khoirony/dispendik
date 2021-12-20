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

	<title>Surat Masuk</title>
</head>

<body>
	<?php
	include('sambungan.php');
	include('menu.php');
	include('surmasnav.php');
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
					<h1 class="h3 mb-4 mt-2 text-gray-800"><i class="far fa-paper-plane"></i> HASIL PENCARIANN DARI "<?php echo $cari; ?> "</h1>
					<hr>

					<table class="table table-sm table-striped table-bordered">
						<thead>
							<tr>
								<th scope="col">
									<p class="text-center">No</p>
								</th>
								<th scope="col">
									<p class="text-left">Tanggal Masuk</p>
								</th>
								<th scope="col">
									<p class="text-left">Nomor Surat</p>
								</th>
								<th scope="col">
									<p class="text-left">Tanggal Surat</p>
								</th>
								<th scope="col">
									<p class="text-left">Pengirim Surat</p>
								</th>
								<th scope="col" style="width: 3rem;">
									<p class="text-center">Opsi</p>
								</th>
							</tr>
						</thead>
						<tbody>
							<?php

							if ($pilihan == "Pengirim") {
								$sql = "SELECT* FROM surat_masuk WHERE surat_dari LIKE '%" . $cari . "%'";
								$query = mysqli_query($conn, $sql);
								$no = 1;

								while ($row = mysqli_fetch_array($query)) {
									echo '
									<tr class="align-middle">
									<th scope="col"><p class="font-weight-normal">' . $no . '</p></th>
									<th scope="col"><p class="font-weight-normal">' . $row['tgl_masuk'] . '</p></th>
									<th scope="col"><p class="font-weight-normal">' . $row['nmr_surat'] . '</p></th>
									<th scope="col"><p class="font-weight-normal">' . $row['tgl_surat'] . '</p></th>
									<th scope="col"><p class="font-weight-normal">' . $row['surat_dari'] . '</p></th>
									<th scope="col"><p class="font-weight-normal"><center>
									<div class="btn-group btn-group-toggle" data-toggle="buttons">
									<label class="btn btn-white btn-sm">
										<a href="surmasfull.php?id=' . $row['id_suratmasuk'] . '" class="text-dark" data-toggle="tooltip" data-placement="bottom" title="Selengkapnya">
										<input type="radio" name="options" id="option1"> <i class="far fa-envelope-open fa-xs"></i>
										</a>
									</label>
									<label class="btn btn-white btn-sm">
										<a href="surmasedit.php?id=' . $row['id_suratmasuk'] . '" class="text-dark" data-toggle="tooltip" data-placement="bottom" title="Edit">
										<input type="radio" name="options" id="option2"> <i class="far fa-edit fa-xs"></i>
										</a>
									</label>
									<label class="btn btn-secondary active btn-sm">
										<a href="surmashapus.php?id=' . $row['id_suratmasuk'] . '" class="text-white" data-toggle="tooltip" data-placement="bottom" title="Hapus">
										<input type="radio" name="options" id="option3"> <i class="far fa-trash-alt fa-xs"></i>
										</a>
									</label>
									</div></center>
									</p></th></tr>';
									$no++;
								}
							} else if ($pilihan == "Nomor") {
								$sql = "SELECT* FROM surat_masuk WHERE nmr_surat LIKE '%" . $cari . "%'";
								$query = mysqli_query($conn, $sql);
								$no = 1;

								while ($row = mysqli_fetch_array($query)) {
									echo '
									<tr class="align-middle">
									<th scope="col"><p class="font-weight-normal">' . $no . '</p></th>
									<th scope="col"><p class="font-weight-normal">' . $row['tgl_masuk'] . '</p></th>
									<th scope="col"><p class="font-weight-normal">' . $row['nmr_surat'] . '</p></th>
									<th scope="col"><p class="font-weight-normal">' . $row['tgl_surat'] . '</p></th>
									<th scope="col"><p class="font-weight-normal">' . $row['surat_dari'] . '</p></th>
									<th scope="col"><p class="font-weight-normal"><center>
									<div class="btn-group btn-group-toggle" data-toggle="buttons">
									<label class="btn btn-white btn-sm">
										<a href="surmasfull.php?id=' . $row['id_suratmasuk'] . '" class="text-dark" data-toggle="tooltip" data-placement="bottom" title="Selengkapnya">
										<input type="radio" name="options" id="option1"> <i class="far fa-envelope-open fa-xs"></i>
										</a>
									</label>
									<label class="btn btn-white btn-sm">
										<a href="surmasedit.php?id=' . $row['id_suratmasuk'] . '" class="text-dark" data-toggle="tooltip" data-placement="bottom" title="Edit">
										<input type="radio" name="options" id="option2"> <i class="far fa-edit fa-xs"></i>
										</a>
									</label>
									<label class="btn btn-secondary active btn-sm">
										<a href="surmashapus.php?id=' . $row['id_suratmasuk'] . '" class="text-white" data-toggle="tooltip" data-placement="bottom" title="Hapus">
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