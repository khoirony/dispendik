<?php
	session_start();
	if($_SESSION['pWord']==""){
		header('Location:login.php?login=belum');
	}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
	<script src="https://kit.fontawesome.com/c12c059ff2.js" crossorigin="anonymous"></script>
	<title>Dashboard</title>
  </head>
  <body>
	<div class="row no-gutters pr-3">
		<?php
		include('menu.php');
		include('sambungan.php');n
	    ?>
		<div class="left col-md-10 p-3 mt-3">
			<div class="mt-2 ml-5 pt-2 pl-1 mr-2"><h3><i class="fas fa-tachometer-alt"></i> DASHBOARD</h3> <hr></div>
			<div class="row text-white ml-5 pt-3 pb-5">
			<div class="card bg-info ml-3" style="width: 19rem;">
			<div class="card-body">
				<div class="card-body-icon">
					<i class="far fa-paper-plane"></i>
				</div>
				<h5 class="card-title">Jumlah Surat Masuk</h5>
				<div class="display-4">
				<?php
				$sql = 'SELECT* FROM surat_masuk';
				$query = mysqli_query($conn, $sql);
				$data=array();
				while ($row = mysqli_fetch_array($query)){
					$data[]=$row;
				}
				$hitung=count($data);
				echo $hitung;
				?>
				</div>
				<a href="surmasmenu.php"><p class="card-text text-white">Lihat Detail <i class="fas fa-angle-double-right ml-2"></i></p></a>
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
				$data=array();
				while ($row = mysqli_fetch_array($query)){
					$data[]=$row;
				}
				$hitung=count($data);
				echo $hitung;
				?>
				</div>
				<a href="surkelmenu.php"><p class="card-text text-white">Lihat Detail <i class="fas fa-angle-double-right ml-2"></i></p></a>
			</div>
			</div>

			<div class="card bg-warning ml-5" style="width: 19rem;">
			<div class="card-body">
				<div class="card-body-icon">
					<i class="fas fa-users"></i>
				</div>
				<h5 class="card-title">Jumlah Admin</h5>
				<div class="display-4">
				<?php
				$sql = 'SELECT* FROM pengguna';
				$query = mysqli_query($conn, $sql);
				$data=array();
				while ($row = mysqli_fetch_array($query)){
					$data[]=$row;
				}
				$hitung=count($data);
				echo $hitung;
				?>
				</div>
				<a href="profil.php"><p class="card-text text-white">Lihat Detail <i class="fas fa-angle-double-right ml-2"></i></p></a>
			</div>
			</div>
			</div>

			<div class="row text-white ml-5 pt-3 pb-5">
			<div class="card bg-primary ml-3" style="width: 19rem;">
			<div class="card-body">
				<div class="card-body-icon">
					<i class="far fa-envelope"></i>
				</div>
				<h5 class="card-title">Jumlah Arsip Masuk</h5>
				<div class="display-4">
				<?php
				$sql = 'SELECT* FROM arsip_masuk';
				$query = mysqli_query($conn, $sql);
				$data=array();
				while ($row = mysqli_fetch_array($query)){
					$data[]=$row;
				}
				$hitung=count($data);
				echo $hitung;
				?>
				</div>
				<a href="surmasmenu.php"><p class="card-text text-white">Lihat Detail <i class="fas fa-angle-double-right ml-2"></i></p></a>
			</div>
			</div>

			<div class="card bg-secondary ml-5" style="width: 19rem;">
			<div class="card-body">
				<div class="card-body-icon">
					<i class="fas fa-envelope"></i>
				</div>
				<h5 class="card-title">Jumlah Arsip Keluar</h5>
				<div class="display-4">
				<?php
				$sql = 'SELECT* FROM arsip_keluar';
				$query = mysqli_query($conn, $sql);
				$data=array();
				while ($row = mysqli_fetch_array($query)){
					$data[]=$row;
				}
				$hitung=count($data);
				echo $hitung;
				?>
				</div>
				<a href="surkelmenu.php"><p class="card-text text-white">Lihat Detail <i class="fas fa-angle-double-right ml-2"></i></p></a>
			</div>
			</div>

			<div class="card bg-danger ml-5" style="width: 19rem;">
			<div class="card-body">
				<div class="card-body-icon">
					<i class="fas fa-users"></i>
				</div>
				<h5 class="card-title">Jumlah User</h5>
				<div class="display-4">
				<?php
				$sql = 'SELECT* FROM pengguna';
				$query = mysqli_query($conn, $sql);
				$data=array();
				while ($row = mysqli_fetch_array($query)){
					$data[]=$row;
				}
				$hitung=count($data);
				echo $hitung;
				?>
				</div>
				<a href="profil.php"><p class="card-text text-white">Lihat Detail <i class="fas fa-angle-double-right ml-2"></i></p></a>
			</div>
			</div>
			</div>
		</div>
	</div>
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top border-bottom">
        <a class="navbar-brand" href="index.php"><img src="img/logodispendik.png" class="ml-2"/></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
        <li class="nav-item mr-3">
            <a class="nav-link mr-5 font-weight-bold" href="profil.php" data-toggle="tooltip" data-placement="bottom" title="Profil"><i class="fas fa-user-circle fa-2x"></i></a>
        </li></ul>
        </div>
    </nav>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
	<script src="admin.js"></script>
  </body>
</html>