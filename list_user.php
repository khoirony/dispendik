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
	<title>List Pengguna</title>
  </head>
  <body>
	<div class="row no-gutters pr-3">
		<?php
		include('sambungan.php');
		include('menu.php');
		include('headuser.php');
	    ?>
		<div class="left col-md-10 p-3 mt-3">
			<div class="mt-2 ml-5 pt-2 pl-1 mr-2"><h3><i class="fas fa-users"></i> LIST PENGGUNA</h3> <hr></div>
			<div class="row ml-5 pt-3 pb-5">
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
				<br/>
				</div>
			</div>
		</div>
	</div>
  </body>
</html>