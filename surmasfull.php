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
	<title>Lihat Surat Masuk</title>
  </head>
  <body>
	<div class="row no-gutters pr-3">
		<?php
		include('sambungan.php');
		include('menu.php');
		include('surmasnav.php');
		$id=$_GET['id'];
		$sql= "SELECT * FROM surat_masuk WHERE id_suratmasuk=$id";
		$query = mysqli_query($conn,$sql);
		$isi = mysqli_fetch_array($query);
	    ?>
		<div class="left col-md-10 p-3 mt-3">
			<div class="mt-2 ml-5 pt-2 pl-1 mr-2"><h3><i class="far fa-paper-plane"></i> LIHAT SURAT MASUK</h3> <hr></div>
            <div class="ml-5 pl-1 p-3">
				<table class="table table-borderless">
				<tbody>
					<tr>
					<td style="width: 20%">Nomor Surat</td>
					<td class="text-left"><?php echo ''.$isi['nmr_surat'].'';?></td>
					</tr>
					<tr>
					<td style="width: 20%">Tanggal Surat</td>
					<td class="text-left"><?php echo ''.$isi['tgl_surat'].'';?></td>
					</tr>
					<tr>
					<td style="width: 20%">Tanggal Masuk</td>
					<td class="text-left"><?php echo ''.$isi['tgl_masuk'].'';?></td>
					</tr>
					<tr>
					<td style="width: 20%">Surat Dari</td>
					<td class="text-left"><?php echo ''.$isi['surat_dari'].'';?></td>
					</tr>
					<tr>
					<td style="width: 20%">Isi Surat</td>
					<td class="text-left"><?php echo ''.$isi['isi'].'';?></td>
					</tr>
				</tbody>
				</table>
            </div>
		</div>
	</div>
  </body>
</html>