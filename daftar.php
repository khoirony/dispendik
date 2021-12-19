<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style1.css">

    <title>Daftar Admin</title>
</head>

<body>
    <?php
    include('header.php');
    include('sambungan.php');
    ?>

    <?php
    if (isset($_POST['Submit'])) {
        $username = $_POST['userName'];
        $password = $_POST['passWord'];
        $repass = $_POST['repassWord'];

        $result = mysqli_query($conn, "SELECT * FROM pengguna WHERE username='$username'");
        $row = mysqli_fetch_array($result);
        $cekuser = $row['username'];

        if (strcmp($username, $cekuser) == 0) {
            echo '<p class="ml-5 text-danger">Username sudah digunakan, Coba username lain</p>';
        } else if (strcmp($repass, $password) == 0) {
            $result = mysqli_query($conn, "INSERT INTO pengguna(username,password) VALUES('$username','$password')");
            echo '<h6 class="ml-5">Akun baru berhasil dibuat. <a href="login.php"><span class="badge badge-primary">Login</span></a></h6> ';
        } else if (strcmp($repass, $password) != 0) {
            echo '<p class="ml-5 text-danger">Password yang anda masukkan tidak sama!</p>';
        } else if ($password == 0 || $repass == 0) {
            echo ' ';
        }
    }
    ?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 login p-5 shadow">
                <p class="text-center text-dark fs-2 fw-bold"> Daftar Admin </p>
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