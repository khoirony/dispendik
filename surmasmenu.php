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
		include('menu.php');
	    ?>
		<div class="left col-md-10 p-3 mt-3">
			<div class="mt-2 ml-5 pt-2 pl-1 mr-2"><h3><i class="far fa-paper-plane"></i> SURAT MASUK</h3> <hr></div>
			<div class="row ml-5 pt-3 pb-5">
				<div class="mb-3 ml-auto mr-3"><a class="btn btn-primary" href="surmastambah.php" role="button"><i class="far fa-plus-square"></i> Tambah Surat</a></div>
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
					include('sambungan.php');
					$batas   = 4;
					$halaman = @$_GET['halaman'];
					$jumlah = @$_GET['jumlah'];
					if(empty($halaman)){
						$posisi  = 0;
						$halaman = 1;
					}
					else{
						$posisi  = ($halaman-1) * $batas;
					}

					if(empty($jumlah)){
						$sql = "SELECT* FROM surat_masuk order by tgl_masuk DESC limit $posisi,$batas";
					}
					else{
						$sql = "SELECT* FROM surat_masuk order by tgl_masuk DESC";
					}

					
					$query = mysqli_query($conn, $sql);
					$no=$posisi+1;
					while ($row = mysqli_fetch_array($query)){
    	        	echo '
					<tr class="align-middle">
					<th scope="col"><p class="font-weight-normal">'.$no.'</p></th>
					<th scope="col"><p class="font-weight-normal">'.$row['tgl_masuk'].'</p></th>
					<th scope="col"><p class="font-weight-normal">'.$row['nmr_surat'].'</p></th>
					<th scope="col"><p class="font-weight-normal">'.$row['tgl_surat'].'</p></th>
					<th scope="col"><p class="font-weight-normal">'.$row['surat_dari'].'</p></th>
					<th scope="col"><p class="font-weight-normal"><center>
					<div class="btn-group btn-group-toggle" data-toggle="buttons">
					<label class="btn btn-white btn-sm">
						<a href="surmasfull.php?id='.$row['id_suratmasuk'].'" class="text-dark" data-toggle="tooltip" data-placement="bottom" title="Selengkapnya">
						<input type="radio" name="options" id="option1"> <i class="far fa-envelope-open fa-xs"></i>
						</a>
					</label>
					<label class="btn btn-white btn-sm">
						<a href="surmasedit.php?id='.$row['id_suratmasuk'].'" class="text-dark" data-toggle="tooltip" data-placement="bottom" title="Edit">
						<input type="radio" name="options" id="option2"> <i class="far fa-edit fa-xs"></i>
						</a>
					</label>
					<label class="btn btn-secondary active btn-sm">
						<a href="surmashapus.php?id='.$row['id_suratmasuk'].'" class="text-white" data-toggle="tooltip" data-placement="bottom" title="Hapus">
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
				$query2     = mysqli_query($conn, "select * from surat_masuk order by tgl_masuk DESC");
				$jmldata    = mysqli_num_rows($query2);
				$jmlhalaman = ceil($jmldata/$batas);
				?>
				<div class="text-center">
					<ul class="pagination pagination-sm">
						<?php
						if(empty($jumlah)){
							for($i=1;$i<=$jmlhalaman;$i++) {
								if ($i != $halaman) {
									echo "<li class='page-item'><a class='page-link' href='surmasmenu.php?halaman=$i'>$i</a></li>";
								} else {
									echo "<li class='page-item active'><a class='page-link' href='#'>$i</a></li>";
								}
							}
							echo " <li class='page-item'><a class='page-link' href='surmasmenu.php?jumlah=1#'>Semua</a></li>";
						}
						else{
							echo "<li class='page-item'><a class='page-link' href='surmasmenu.php?halaman=1'>Sedikit</a></li> <li class='page-item  active'><a class='page-link' href='surmasmenu.php?jumlah=1#'>Semua</a></li>";
						}
						?>
					</ul>
				</div>
				</div>
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