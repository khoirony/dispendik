<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    
    <title>Login Admin</title>
  </head>
  <body>
	<?php include('header.php'); ?>
  	<div class="container">
    <div class="row justify-content-center mt-5 pt-5">
	<div class="col-7 col align-self-center">
	<br/>
	<?php
	$kondisi = $_GET['login'];
		if(strcmp($kondisi,'belum') == 0){
			echo '<p class="ml-5 text-danger">Silahkan login terlebih dahulu</p>';
		}else if(strcmp($kondisi,'gagal') == 0){
			echo '<p class="ml-5 text-danger">Username atau Password salah! Silahkan login ulang</p>';
		}else{
			echo ' ';
		}
	?>
	<br/>
	<h1 class="text-center"> Login Admin </h1>
	<br/>
	<form name="login" action="./loginproses.php" method="POST">
	<div class="form-group ml-5 mr-5">
	    <label>Username</label>
	    <input type="text" class="form-control form-control-lg" name="userName">
	</div>
	<div class="form-group ml-5 mr-5">
	    <label>Password</label>
	    <input type="password" class="form-control form-control-lg" name="passWord">
	</div>
	<div class="form-group form-check ml-5 mr-5">
	    <input type="checkbox" class="form-check-input" id="exampleCheck1">
	    <label class="form-check-label" for="exampleCheck1">Ingatkan Saya</label>
	</div>
    <div class="form-group ml-5 mr-5 md-5">
	<button type="submit" class="btn btn-primary btn-lg btn-block">Login</button>
    <a href="daftar.php"><button type="button" class="btn btn-secondary btn-lg btn-block mt-2">Daftar</button></a>
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