<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
	<title>Dashboard</title>
  </head>
  <body>
	<div class="row no-gutters pr-3">
		<?php
		include('menu.php');
		include('sambungan.php');
	    ?>
		<div class="left col-md-10 p-3 mt-3">
			<div class="mt-2 ml-5 pt-2 pl-1 mr-2"><h3><i class="fas fa-users"></i>  PROFIL</h3> <hr></div>
			<div class="row ml-5 pt-3 pb-5">
				<div class="mb-3 ml-auto mr-3"><a class="btn btn-primary" href="surkeltambah.php" role="button"><i class="far fa-plus-square"></i> Tambah Surat</a></div>
				<table class="table table-sm table-striped table-bordered">
				<thead>
					<tr>
					<th scope="col"><p class="text-center">No</p></th>
					<th scope="col"><p class="text-left">Nomor Surat</p></th>
					<th scope="col"><p class="text-left">Tanggal Surat</p></th>
					<th scope="col"><p class="text-left">Kepada</p></th>
					<th scope="col"><p class="text-center">Opsi</p></th>
					</tr>
				</thead>
				<tbody>
					<?php
					$sql = 'SELECT* FROM surat_keluar order by tgl_surat DESC';
					$query = mysqli_query($conn, $sql);
					$no=1;
					while ($row = mysqli_fetch_array($query)){
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
					}
					?>
				</tbody>
				</table>
			</div>
		</div>
	</div>

	<?php
		include('headadmin.php');
	?>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

  </body>
</html>