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
	<link rel="stylesheet" href="css/style.css">
	<title>Surat Masuk</title>
  </head>
  <body>

	<div class="row no-gutters pr-3">
		<?php
		include('sambungan.php');
		include('menu.php');
		include('surkelnav.php');
		$cari = @$_GET['cari'];
	    ?>
		<div class="left col-md-10 p-3 mt-3">
			<div class="mt-2 ml-5 pt-2 pl-1 mr-2"><h3><i class="fas fa-paper-plane"></i> HASIL PENCARIAN DARI "<?php echo $cari; ?> "</h3> <hr></div>
			<div class="ml-5 pl-1 p-3">
				<table class="table table-sm table-striped table-bordered">
				<thead>
					<tr>
					<th scope="col"><p class="text-center">No</p></th>
					<th scope="col"><p class="text-left">Tanggal Masuk</p></th>
					<th scope="col"><p class="text-left">Nomor Surat</p></th>
					<th scope="col"><p class="text-left">Tanggal Surat</p></th>
					<th scope="col"><p class="text-left">Pengirim Surat</p></th>
					<th scope="col" style="width: 3rem;"><p class="text-center">Opsi</p></th>
					</tr>
				</thead>
				<tbody>
				<?php
				$sql = "SELECT* FROM surat_keluar WHERE surat_ke LIKE '%".$cari."%'";
				$query = mysqli_query($conn, $sql);
				$no=1;

				while($row = mysqli_fetch_array($query)){
					echo '
					<tr class="align-middle"><th scope="col"><p class="font-weight-normal">'.$no.'</p></th>
					<th scope="col"><p class="font-weight-normal">'.$row['nmr_surat'].'</p></th>
					<th scope="col"><p class="font-weight-normal">'.$row['tgl_surat'].'</p></th>
					<th scope="col"><p class="font-weight-normal">'.$row['surat_ke'].'</p></th>
					<th scope="col"><p class="font-weight-normal"><center>
					<div class="btn-group btn-group-toggle" data-toggle="buttons">
					<label class="btn btn-white btn-sm">
						<a href="surkelfull.php?id='.$row['id_suratkeluar'].'" class="text-dark">
						<input type="radio" name="options" id="option1"> <i class="far fa-envelope-open fa-xs"></i>
						</a>
					</label>
					<label class="btn btn-white btn-sm">
						<a href="surkeledit.php?id='.$row['id_suratkeluar'].'" class="text-dark">
						<input type="radio" name="options" id="option2"> <i class="far fa-edit fa-xs"></i>
						</a>
					</label>
					<label class="btn btn-secondary active btn-sm">
						<a href="surkelhapus.php?id='.$row['id_suratkeluar'].'" class="text-white">
						<input type="radio" name="options" id="option3"> <i class="far fa-trash-alt fa-xs"></i>
						</a>
					</label>
					</div></center>
					</p></th></tr>';
					$no++;
				}?>
				</tbody>
				</table>
            </div>
		</div>
	</div>
  </body>
</html>