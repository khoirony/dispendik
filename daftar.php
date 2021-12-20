<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Daftar Admin</title>
</head>

<body>
    <?php
    include('header.php');
    include('sambungan.php');
    ?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 login p-5 shadow">
                <p class="text-center text-dark fs-2 fw-bold"> Daftar Admin </p>
                <br>
                <?php
                if (isset($_POST['Submit'])) {
                    $username = $_POST['userName'];
                    $password = $_POST['passWord'];
                    $repass = $_POST['repassWord'];


                    if ($username != "" && $password != "" && $repass != "") {
                        $result = mysqli_query($conn, "SELECT * FROM pengguna WHERE username='$username'");
                        $row = mysqli_fetch_array($result);

                        if (strcmp($repass, $password) == 0) {
                            $result = mysqli_query($conn, "INSERT INTO pengguna(username,password) VALUES('$username','$password')");
                            echo '<div class="alert alert-warning lengkung pt-2 pb-2" role="alert">Akun baru berhasil dibuat. <a class="text-primary" href="login.php">Login</a></div> ';
                        } else if (strcmp($repass, $password) != 0) {
                            echo '<div class="alert alert-danger lengkung pt-2 pb-2" role="alert">Password yang anda masukkan tidak sama!</div>';
                        } else if (strcmp($username, $row['username']) == 0) {
                            echo '<div class="alert alert-danger lengkung pt-2 pb-2" role="alert">Username sudah digunakan, Coba username lain</div>';
                        }
                    } else if ($username == "") {
                        echo '<div class="alert alert-danger lengkung pt-2 pb-2" role="alert">Silahkan isi form username terlebih dahulu</div>';
                    } else if ($password == "") {
                        echo '<div class="alert alert-danger lengkung pt-2 pb-2" role="alert">Silahkan isi form password terlebih dahulu</div>';
                    } else if ($repass == "") {
                        echo '<div class="alert alert-danger lengkung pt-2 pb-2" role="alert">Silahkan masukkan ulang password anda</div>';
                    }
                }
                ?>
                <br />
                <form name="login" action="./daftar.php" method="POST">
                    <div class="mb-4">
                        <input type="text" class="form-control form-control-lg lengkung" placeholder="Username" name="userName">
                    </div>
                    <div class="mb-4">
                        <input type="password" class="form-control form-control-lg lengkung" placeholder="Password" name="passWord">
                    </div>
                    <div class="mb-4">
                        <input type="password" class="form-control form-control-lg lengkung" placeholder="Ulangi Password" name="repassWord">
                    </div>
                    <button type="submit" name="Submit" class="btn btn-primary btn-lg col-12 lengkung">Daftar</button>
                    <br /><br>
                </form>
                <p class="text-center">
                    Sudah memiliki akun? <a href="login.php?login=">Login</a>
                </p>
            </div>
        </div>
    </div>

</body>

</html>