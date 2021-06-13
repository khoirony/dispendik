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
	<title>Tambah Surat Keluar</title>
  </head>
  <body>
	<div class="row no-gutters pr-3">
		<?php
		include('sambungan.php');
		include('menu.php');
		include('surkelnav.php'); 
	    ?>
		<div class="left col-md-10 p-3 mt-3">
			<div class="mt-2 ml-5 pt-2 pl-1 mr-2"><h3><i class="fas fa-paper-plane"></i> TAMBAH SURAT KELUAR</h3> <hr></div>
            <div class="ml-5 pl-1 p-3">
				<?php
                // Check If form submitted, insert form data into users table.
                if(isset($_POST['Submit'])) {
                    $nomor_surat = $_POST['nomor_surat'];
                    $tanggal_surat = $_POST['tanggal_surat'];
                    $kepada = $_POST['kepada'];
                    $isi = $_POST['isi'];
                        
                    // include database connection file
                    $result = mysqli_query($conn, "INSERT INTO surat_masuk(nmr_surat,tgl_surat,surat_ke,isi) VALUES('$nomor_surat','$tanggal_surat','$kepada','$isi')");
                    echo '
                    <h6>Surat Keluar Berhasil Ditambahkan. <a href="surmasmenu.php"><span class="badge badge-secondary">List Surat masuk</span></a></h6> ';
                }
                ?>
                <?php echo'<form action="surkeltambah.php" method="POST">'; ?>
                    <div class="form-group">
                        <label>Nomor Surat </label>
                        <input type="text" name="nomor_surat" class="form-control form-control-lg" placeholder="Masukkan Nomor Surat">
                    </div>
                    <div class="form-group">
                        <label>Tanggal Surat</label>
                        <input type="text" name="tanggal_surat" class="form-control form-control-lg" placeholder="YYYY-MM-DD">
                    </div>
                    <div class="form-group">
                        <label>Kepada</label>
                        <input type="text" name="kepada" class="form-control form-control-lg" placeholder="Surat Dikirim Ke">
                    </div>
                    <div class="form-group">
                        <label>Isi Surat</label><br/>
                        <textarea type="text" name="isi" class="form-control form-control-lg" rows="5"></textarea>
                    </div>
                    <input class="btn btn-primary" type="submit" name="Submit" value="Submit">
                </form>
            </div>
		</div>
	</div>
  </body>
</html>