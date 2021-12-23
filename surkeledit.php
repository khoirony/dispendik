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
    <title>Edit Surat Keluar</title>
</head>

<body>
    <?php
    // menghubungkan database
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
                    <h1 class="h3 mb-4 mt-2 text-gray-800"><i class="fas fa-paper-plane"></i> EDIT SURAT KELUAR</h1>

                    <?php
                    if (isset($_POST['Submit'])) {
                        // menangkap data hasil submit form edit surat
                        $nomor_surat = $_POST['nomor_surat'];
                        $tanggal_surat = $_POST['tanggal_surat'];
                        $kepada = $_POST['kepada'];
                        $isi = $_POST['isi'];

                        // memasukkan data form edit kedalam database
                        $result = mysqli_query($conn, "INSERT INTO surat_keluar(nmr_surat,tgl_surat,surat_ke,isi) VALUES('$nomor_surat','$tanggal_surat','$kepada','$isi')");

                        // menampilkan notifikasi berhasil
                        echo '
                        <h6>Surat Keluar Berhasil Diperbaharui. <a href="surkelmenu.php"><span class="badge badge-secondary">List Surat Keluar</span></a></h6><br/>';
                    }
                    ?>
                    <?php
                    // mengambil data surat keluar berdasarkan id
                    $sql = 'SELECT* FROM surat_keluar where id_suratkeluar=' . $_GET['id'];
                    $query = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_array($query);
                    // menamilkan form edit surat
                    echo '
                    <form action="surkeledit.php" method="POST">
                    <div class="form-group">
                        <label>Nomor Surat </label>
                        <input type="text" name="nomor_surat" class="form-control form-control-lg" value="' . $row['nmr_surat'] . '">
                    </div>
                    <div class="form-group">
                        <label>Tanggal Surat</label>
                        <input type="text" name="tanggal_surat" class="form-control form-control-lg" value="' . $row['tgl_surat'] . '">
                    </div>
                    <div class="form-group">
                        <label>Kepada </label>
                        <input type="text" name="kepada" class="form-control form-control-lg" value="' . $row['surat_ke'] . '">
                    </div>
                    <div class="form-group">
                        <label>Isi Surat</label><br/>
                        <textarea type="text" name="isi" class="form-control form-control-lg" rows="5">' . $row['isi'] . '</textarea>
                    </div>
                    <input class="btn btn-primary" type="submit" name="Submit" value="Edit Surat">
                    </form>';
                    ?>

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