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
    <title>Edit Surat Masuk</title>
</head>

<body>
    <?php
    // Menghubungkan database
    include('sambungan.php');
    ?>
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include('menu.php'); ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include('surmasnav.php'); ?>

                <!-- Begin Page Content -->
                <div class="container ps-5 pe-5">

                    <br><br><br><br>

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 mt-2 text-gray-800"><i class="far fa-paper-plane"></i> EDIT SURAT MASUK</h1>

                    <?php
                    // Menangkap id
                    $id = $_GET['id'];

                    // Cek form
                    if (isset($_POST['Submit'])) {

                        // Menangkap isi form
                        $tanggal_masuk = $_POST['tanggal_masuk'];
                        $nomor_surat = $_POST['nomor_surat'];
                        $tanggal_surat = $_POST['tanggal_surat'];
                        $pengirim = $_POST['pengirim'];
                        $isi = $_POST['isi'];

                        // Memasukkan data form ke database
                        $result = mysqli_query($conn, "INSERT INTO surat_masuk(tgl_masuk,nmr_surat,	tgl_surat,surat_dari,isi) VALUES('$tanggal_masuk','$nomor_surat','$tanggal_surat','$pengirim','$isi')");

                        // Menampilkan Notif Berhasil
                        echo '
                        <h6>Surat Masuk Berhasil Diperbaharui. <a href="surmasmenu.php"><span class="badge badge-secondary">List Surat masuk</span></a></h6><br/>';
                    }
                    ?>

                    <?php

                    // Mengambil data surat berdasarkan id
                    $sql = 'SELECT* FROM surat_masuk where id_suratmasuk=' . $id;
                    $query = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_array($query);

                    // Form edit surat
                    echo '
                    <form action="surmasedit.php" method="POST">
                    <div class="form-group">
                        <label>Tanggal Masuk</label>
                        <input type="text" name="tanggal_masuk" class="form-control form-control-lg" value="' . $row['tgl_masuk'] . '">
                    </div>
                    <div class="form-group">
                        <label>Nomor Surat </label>
                        <input type="text" name="nomor_surat" class="form-control form-control-lg" value="' . $row['nmr_surat'] . '">
                    </div>
                    <div class="form-group">
                        <label>Tanggal Surat</label>
                        <input type="text" name="tanggal_surat" class="form-control form-control-lg" value="' . $row['tgl_surat'] . '">
                    </div>
                    <div class="form-group">
                        <label>Pengirim Surat </label>
                        <input type="text" name="pengirim" class="form-control form-control-lg" value="' . $row['surat_dari'] . '">
                    </div>
                    <div class="form-group">
                        <label>Isi Surat</label><br/>
                        <textarea type="text" name="isi" class="form-control form-control-lg" rows="5">' . $row['isi'] . '</textarea>
                    </div>
                    <input class="btn btn-primary" type="submit" name="Submit" value="Edit Surat">
                    </form>';
                    // End of form
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