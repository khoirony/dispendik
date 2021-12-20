<?php
session_start();
if ($_SESSION['password'] == "") {
    header('Location:login.php?pesan=4');
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Tambah Surat Masuk</title>
</head>

<body>
    <?php
    include('sambungan.php');
    ?>

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include('menu.php'); ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include('surmasnav.php'); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container ps-5 pe-5">

                    <br><br><br><br>

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 mt-2 text-gray-800"><i class="far fa-paper-plane"></i> TAMBAH SURAT MASUK</h1>


                    <?php
                    // Check If form submitted, insert form data into users table.
                    if (isset($_POST['Submit'])) {
                        $tanggal_masuk = $_POST['tanggal_masuk'];
                        $nomor_surat = $_POST['nomor_surat'];
                        $tanggal_surat = $_POST['tanggal_surat'];
                        $pengirim = $_POST['pengirim'];
                        $isi = $_POST['isi'];

                        // include database connection file
                        $result = mysqli_query($conn, "INSERT INTO surat_masuk(tgl_masuk,nmr_surat,	tgl_surat,surat_dari,isi) VALUES('$tanggal_masuk','$nomor_surat','$tanggal_surat','$pengirim','$isi')");
                        echo '
                            <h6>Surat Masuk Berhasil Ditambahkan. <a href="surmasmenu.php"><span class="badge badge-secondary">List Surat masuk</span></a></h6> ';
                    }
                    ?>
                    <?php echo '<form action="surmastambah.php" method="POST">'; ?>
                    <div class="form-group">
                        <label>Tanggal Masuk</label>
                        <input type="text" name="tanggal_masuk" class="form-control form-control-lg lengkung" placeholder="YYYY-MM-DD">
                    </div>
                    <div class="form-group">
                        <label>Nomor Surat </label>
                        <input type="text" name="nomor_surat" class="form-control form-control-lg" placeholder="Masukkan Nomor Surat">
                    </div>
                    <div class="form-group">
                        <label>Tanggal Surat</label>
                        <input type="text" name="tanggal_surat" class="form-control form-control-lg" placeholder="YYYY-MM-DD">
                    </div>
                    <div class="form-group">
                        <label>Pengirim Surat </label>
                        <input type="text" name="pengirim" class="form-control form-control-lg" placeholder="Masukkan Pengirim Surat">
                    </div>
                    <div class="form-group">
                        <label>Isi Surat</label><br />
                        <textarea type="text" name="isi" class="form-control form-control-lg" rows="5"></textarea>
                    </div>
                    <input class="btn btn-primary" type="submit" name="Submit" value="Submit">
                    </form>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; 2020 All Right Reserved - Developed by Khoirony Arief</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->
</body>

</html>