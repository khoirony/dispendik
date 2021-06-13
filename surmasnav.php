<!doctype html>
<html lang="en">
  <head>
    <script src="https://kit.fontawesome.com/c12c059ff2.js" crossorigin="anonymous"></script>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top border-bottom">
        <a class="navbar-brand" href="index.php"><img src="img/logodispendik.png" class="ml-2"/></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
        <form class="form-inline my-2 my-lg-0" action="surmascari.php" method="get">
        <div class="border">
        <select id="inputState" name ="pilihan" class="form-control border-0">
        <option>Nomor</option>
        <option>Pengirim</option>
        </select>
        <input class="form-control border-0" type="text" name="cari" aria-label="Search">
        <button class="btn btn-outline my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
        </div>
        </form>
        <li class="nav-item ml-5">
            <a class="nav-link mr-5 font-weight-bold" href="profil.php" data-toggle="tooltip" data-placement="bottom" title="Profil"><i class="fas fa-user-circle fa-2x"></i></a>
        </li></ul>
        </div>
    </nav>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="admin.js"></script>
  </body>
</html>