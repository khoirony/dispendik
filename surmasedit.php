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
	<title>Edit Surat Masuk</title>
  </head>
  <body>
	<div class="row no-gutters pr-3">
		<?php
		include('sambungan.php');
		include('menu.php');
		include('surmasnav.php');
	    ?>
		<div class="left col-md-10 p-3 mt-3">
			<div class="mt-2 ml-5 pt-2 pl-1 mr-2"><h3><i class="far fa-paper-plane"></i> EDIT SURAT MASUK</h3> <hr></div>
            <div class="ml-5 pl-1 p-3">
				<?php
                // Check If form submitted, insert form data into users table.
                if(isset($_POST['Submit'])) {
                    $tanggal_masuk = $_POST['tanggal_masuk'];
                    $nomor_surat = $_POST['nomor_surat'];
                    $tanggal_surat = $_POST['tanggal_surat'];
                    $pengirim = $_POST['pengirim'];
                    $isi = $_POST['isi'];
                        
                    // include database connection file
                    $result = mysqli_query($conn, "INSERT INTO surat_masuk(tgl_masuk,nmr_surat,	tgl_surat,surat_dari,isi) VALUES('$tanggal_masuk','$nomor_surat','$tanggal_surat','$pengirim','$isi')");
                    echo '
                    <h6>Surat Masuk Berhasil Diperbaharui. <a href="surmasmenu.php"><span class="badge badge-secondary">List Surat masuk</span></a></h6><br/>';
                }
                ?>
                <?php 
					$sql = 'SELECT* FROM surat_masuk';
					$query = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_array($query);
                echo'<form action="surmasedit.php" method="POST">
                    <div class="form-group">
                        <label>Tanggal Masuk</label>
                        <input type="text" name="tanggal_masuk" class="form-control form-control-lg" value="'.$row['tgl_masuk'].'">
                    </div>
                    <div class="form-group">
                        <label>Nomor Surat </label>
                        <input type="text" name="nomor_surat" class="form-control form-control-lg" value="'.$row['nmr_surat'].'">
                    </div>
                    <div class="form-group">
                        <label>Tanggal Surat</label>
                        <input type="text" name="tanggal_surat" class="form-control form-control-lg" value="'.$row['tgl_surat'].'">
                    </div>
                    <div class="form-group">
                        <label>Pengirim Surat </label>
                        <input type="text" name="pengirim" class="form-control form-control-lg" value="'.$row['surat_dari'].'">
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
  </body>
</html>