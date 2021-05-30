<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    
    <title>Daftar Admin</title>
  </head>
  <body>
	<?php 
        include('header.php'); 
        include('sambungan.php');
    ?>
    
  	<div class="container">
    <div class="row justify-content-center mt-5">
	<div class="mt-5 col-7 col align-self-center">
	<br/>
    <?php
	if(isset($_POST['Submit'])) {
		$username = $_POST['userName'];
		$password = $_POST['passWord'];
        $repass = $_POST['repassWord'];
			
		$result = mysqli_query($conn, "SELECT * FROM pengguna WHERE username='$username'");
        $row = mysqli_fetch_array($result);
        $cekuser = $row['username'];

		if(strcmp($username,$cekuser) == 0){
            echo '<p class="ml-5 text-danger">Username sudah digunakan, Coba username lain</p>';
        }else if(strcmp($repass,$password) == 0){
		    $result = mysqli_query($conn, "INSERT INTO pengguna(username,password) VALUES('$username','$password')");
		    echo '
		    <h6 class="ml-5">Akun baru berhasil dibuat. <a href="login.php"><span class="badge badge-primary">Login</span></a></h6> ';
        }else if(strcmp($repass,$password) != 0){
            echo '<p class="ml-5 text-danger">Password yang anda masukkan tidak sama!</p>';
        }else if($password == 0 || $repass == 0){
            echo ' ';
        }
	}
	?>
    <br/>
	<h1 class="text-center"> Daftar Admin </h1>
	<br/>
	<form name="login" action="./daftar.php" method="POST">
	<div class="form-group ml-5 mr-5">
	    <label>Username</label>
	    <input type="text" class="form-control form-control-lg" name="userName">
	</div>
	<div class="form-group ml-5 mr-5">
	    <label>Password</label>
	    <input type="password" class="form-control form-control-lg" name="passWord">
	</div>
    <div class="form-group ml-5 mr-5">
        <label>Ulangi Password</label>
        <input type="password" class="form-control form-control-lg" name="repassWord">
    </div><br/>
    <div class="form-group ml-5 mr-5 md-5">
	<button type="submit" name="Submit" class="btn btn-primary btn-lg btn-block">Daftar</button><br/>
    <div class="text-center">Sudah memiliki akun? <a href="login.php?login=">Login</a></div>
	<br/><br/>
	</div>
    </form>
	</div>
	</div>
	</div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

  </body>
</html>