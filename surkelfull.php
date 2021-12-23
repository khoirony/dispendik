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
	<title>Lihat Surat Keluar</title>
</head>

<body>
	<?php
	// Menghubungkan database
	include('sambungan.php');

	// menangkap id database
	$id = $_GET['id'];
	// mencari data base berdasarkan id
	$sql = "SELECT * FROM surat_keluar WHERE id_suratkeluar=$id";
	$query = mysqli_query($conn, $sql);
	$isi = mysqli_fetch_array($query);
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
					<h1 class="h3 mb-4 mt-2 text-gray-800"><i class="fas fa-paper-plane"></i> LIHAT SURAT KELUAR</h1>

					<!-- Content -->
					<table class="table table-borderless">
						<tbody>
							<tr>
								<td style="width: 20%">Nomor Surat</td>
								<td class="text-left"><?php echo '' . $isi['nmr_surat'] . ''; ?></td>
							</tr>
							<tr>
								<td style="width: 20%">Tanggal Surat</td>
								<td class="text-left"><?php echo '' . $isi['tgl_surat'] . ''; ?></td>
							</tr>
							<tr>
								<td style="width: 20%">Surat Ke</td>
								<td class="text-left"><?php echo '' . $isi['surat_ke'] . ''; ?></td>
							</tr>
							<tr>
								<td style="width: 20%">Isi Surat</td>
								<td class="text-left"><?php echo '' . $isi['isi'] . ''; ?></td>
							</tr>
						</tbody>
					</table>
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