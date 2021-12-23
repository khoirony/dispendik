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

    <!-- Judul -->
    <title>Tambah Surat Keluar</title>
</head>

<body>
    <!-- Menghubungkan database -->
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
                <?php include('surkelnav.php'); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container ps-5 pe-5">

                    <br><br><br><br>

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 mt-2 text-gray-800"><i class="fas fa-paper-plane"></i> TAMBAH SURAT KELUAR</h1>

                    <?php
                    // jika form telah disubmit
                    if (isset($_POST['Submit'])) {
                        // menangkap isi form
                        $nomor_surat = $_POST['nomor_surat'];
                        $tanggal_surat = $_POST['tanggal_surat'];
                        $kepada = $_POST['kepada'];
                        $isi = $_POST['isi'];

                        // menambah data ke database
                        $result = mysqli_query($conn, "INSERT INTO surat_masuk(nmr_surat,tgl_surat,surat_ke,isi) VALUES('$nomor_surat','$tanggal_surat','$kepada','$isi')");

                        // Menampilkan Pesan Berhasil
                        echo '
                        <h6>Surat Keluar Berhasil Ditambahkan. <a href="surmasmenu.php"><span class="badge badge-secondary">List Surat masuk</span></a></h6> ';
                    }
                    ?>

                    <!-- Form Tambah Surat -->
                    <?php echo '<form action="surkeltambah.php" method="POST">'; ?>
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
                        <label>Isi Surat</label><br />
                        <textarea type="text" name="isi" class="form-control form-control-lg" rows="5"></textarea>
                    </div>
                    <input class="btn btn-primary" type="submit" name="Submit" value="Submit">
                    </form>
                    <!-- End Of Tambah Surat -->

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