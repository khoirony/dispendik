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
	<title>Edit Surat Keluar</title>
  </head>
  <body>
	<div class="row no-gutters pr-3">
		<?php
		include('menu.php');
        include('sambungan.php');
	    ?>
		<div class="left col-md-10 p-3 mt-3">
			<div class="mt-2 ml-5 pt-2 pl-1 mr-2"><h3><i class="far fa-paper-plane"></i> EDIT SURAT KELUAR</h3> <hr></div>
            <div class="ml-5 pl-1 p-3">
				<?php
                // Check If form submitted, insert form data into users table.
                if(isset($_POST['Submit'])) {
                    $nomor_surat = $_POST['nomor_surat'];
                    $tanggal_surat = $_POST['tanggal_surat'];
                    $kepada = $_POST['kepada'];
                    $isi = $_POST['isi'];
                        
                    // include database connection file
                    $result = mysqli_query($conn, "INSERT INTO surat_keluar(nmr_surat,tgl_surat,surat_ke,isi) VALUES('$nomor_surat','$tanggal_surat','$kepada','$isi')");
                    echo '
                    <h6>Surat Masuk Berhasil Diperbaharui. <a href="surkelmenu.php"><span class="badge badge-secondary">List Surat Keluar</span></a></h6><br/>';
                }
                ?>
                <?php 
					$sql = 'SELECT* FROM surat_keluar';
					$query = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_array($query);
                echo'<form action="surmasedit.php" method="POST">
                    <div class="form-group">
                        <label>Nomor Surat </label>
                        <input type="text" name="nomor_surat" class="form-control form-control-lg" value="'.$row['nmr_surat'].'">
                    </div>
                    <div class="form-group">
                        <label>Tanggal Surat</label>
                        <input type="text" name="tanggal_surat" class="form-control form-control-lg" value="'.$row['tgl_surat'].'">
                    </div>
                    <div class="form-group">
                        <label>Kepada </label>
                        <input type="text" name="pengirim" class="form-control form-control-lg" value="'.$row['surat_ke'].'">
                    </div>
                    <div class="form-group">
                        <label>Isi Surat</label><br/>
                        <textarea type="text" name="isi" class="form-control form-control-lg" rows="5">'.$row['isi'].'</textarea>
                    </div>
                    <input class="btn btn-primary" type="submit" name="Submit" value="Edit Surat">
                </form>'; 
                ?>
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