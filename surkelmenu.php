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
	<title>Surat Keluar</title>
</head>

<body>
	<?php
	// Menghubungkan database
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
				<?php include('surkelnav.php'); ?>
				<!-- End of Topbar -->

				<!-- Begin Page Content -->
				<div class="container ps-5 pe-5">

					<br><br><br><br>

					<!-- Page Heading -->
					<h1 class="h3 mb-4 mt-2 text-gray-800"><i class="fas fa-paper-plane"></i> SURAT KELUAR</h1>

					<!-- Content -->
					<div class="mb-3 me-3 text-end"><a class="btn btn-primary" href="surkeltambah.php" role="button"><i class="far fa-plus-square"></i> Tambah Surat</a></div>
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
									<p class="text-left">Kepada</p>
								</th>
								<th scope="col" style="width: 7rem;">
									<p class="text-center">Opsi</p>
								</th>
							</tr>
						</thead>
						<tbody>
							<?php
							// membatasi database yang ditampilkan
							$batas   = 4;
							// menangkap halaman
							$halaman = @$_GET['halaman'];
							// jika halaman kosong
							if (empty($halaman)) {
								$posisi  = 0;
								$halaman = 1;
							} else {
								$posisi  = ($halaman - 1) * $batas;
							}

							$sql = "SELECT* FROM surat_keluar order by tgl_surat DESC limit $posisi,$batas";
							$query = mysqli_query($conn, $sql);
							$no = $posisi + 1;
							while ($row = mysqli_fetch_array($query)) {
								echo '
									<tr class="align-middle"><th scope="col"><p class="font-weight-normal">' . $no . '</p></th>
									<th scope="col"><p class="font-weight-normal">' . $row['nmr_surat'] . '</p></th>
									<th scope="col"><p class="font-weight-normal">' . $row['surat_ke'] . '</p></th>
									<th scope="col"><p class="font-weight-normal"><center>
									<div class="btn-group btn-group-toggle" data-toggle="buttons">
									<label class="btn btn-white btn-sm">
										<a href="surkelfull.php?id=' . $row['id_suratkeluar'] . '" class="text-dark" data-toggle="tooltip" data-placement="bottom" title="Selengkapnya">
										<input type="radio" name="options" id="option1"> <i class="far fa-envelope-open fa-xs"></i>
										</a>
									</label>
									<label class="btn btn-white btn-sm">
										<a href="surkeledit.php?id=' . $row['id_suratkeluar'] . '" class="text-dark" data-toggle="tooltip" data-placement="bottom" title="Edit">
										<input type="radio" name="options" id="option2"> <i class="far fa-edit fa-xs"></i>
										</a>
									</label>
									<label class="btn btn-secondary active btn-sm">
										<a href="surkelhapus.php?id=' . $row['id_suratkeluar'] . '" class="text-white"data-toggle="tooltip" data-placement="bottom" title="Hapus">
										<input type="radio" name="options" id="option3"> <i class="far fa-trash-alt fa-xs"></i>
										</a>
									</label>
									</div></center>
									</p></th></tr>';
								$no++;
							}
							?>
						</tbody>
					</table>

					<?php
					$query2     = mysqli_query($conn, "select * from surat_keluar order by tgl_surat DESC");
					$jmldata    = mysqli_num_rows($query2);
					$jmlhalaman = ceil($jmldata / $batas);
					?>
					<div class="text-center">
						<ul class="pagination pagination-sm">
							<?php
							for ($i = 1; $i <= $jmlhalaman; $i++) {
								if ($i != $halaman) {
									echo "<li class='page-item'><a class='page-link' href='surkelmenu.php?halaman=$i'>$i</a></li>";
								} else {
									echo "<li class='page-item active'><a class='page-link' href='#'>$i</a></li>";
								}
							}
							?>
						</ul>
					</div>
					<!-- End Of Content -->


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