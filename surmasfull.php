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
		include('menu.php');
		include('sambungan.php');
	    ?>
		<div class="left col-md-10 p-3 mt-3">
			<div class="mt-2 ml-5 pt-2 pl-1 mr-2"><h3><i class="far fa-paper-plane"></i> LIHAT SURAT MASUK</h3> <hr></div>
            <div class="ml-5 pl-1 p-3">
				<table class="table table-sm table-bordered col-sm-9">
				<tbody>
					<?php
					$sql = "SELECT* FROM pengguna order by id DESC";
					$query = mysqli_query($conn, $sql);
					while ($row = mysqli_fetch_array($query)){
    	        	echo '
					<tr class="align-middle">
					<th scope="col" style="width: 7rem;">';

					$foto = $row['foto'];
					if($foto == true){
						echo '<img src="./img/'.$row['foto'].' " class="border-0"  style="height: 100px;">';
					}else{
						echo '<img src="profile.png" class="border-0"  style="height: 100px;">';
					}
					echo '
					</th>
					<th scope="col" class="align-text-bottom">
					<p class="font-weight-normal">
					Username : '.$row['username'].'<br/>
					Password : '.$row['password'].'<br/>
					Sebagai : Admin</p>
					</th></tr>';
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