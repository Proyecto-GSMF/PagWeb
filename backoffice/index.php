<?php


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>BRUM DASHBOARD</title>
  <!-- Favicon-->
  <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
  <!-- Core theme CSS (includes Bootstrap)-->
  <link href="css/styles.css" rel="stylesheet" />

</head>

<body>
  <div class="d-flex" id="wrapper">
    <!-- Sidebar-->
    <div class="border-end bg-dark" id="sidebar-wrapper">
      <div class="sidebar-heading border-bottom bg-light"> <a href="index.php">BRUM DASHBOARD</a></div>
      <div class="list-group list-group-flush">
        <a class="list-group-item list-group-item-action list-group-item-dark p-3" href="evento/eventos.php">Eventos</a>
        <a class="list-group-item list-group-item-action list-group-item-dark p-3" href="deportes.php">Deportes</a>
        <a class="list-group-item list-group-item-action list-group-item-dark p-3" href="partido/partido.php">Partidos</a>
        <div class="dropdown">
          <button class="btn btn-secondary dropdown-toggle list-group-item list-group-item-action list-group-item-dark p-3" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Jugadores/Equipos
          </button>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item list-group-item list-group-item-action list-group-item-dark p-3" href="jugadores.php">Jugadores</a></li>
            <li><a class="dropdown-item list-group-item list-group-item-action list-group-item-dark p-3" href="equipo/equipos.php">Equipos</a></li>
          </ul>
        </div>
        <a class="list-group-item list-group-item-action list-group-item-dark p-3" href="usuarios.php">Usuarios</a>
        <a class="list-group-item list-group-item-action list-group-item-dark p-3" href="ads.php">Anuncios</a>
      </div>
    </div>
    <!-- Page content wrapper-->
    <div id="page-content-wrapper">
      <!-- Top navigation-->
      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <div class="container-fluid">
          <button class="btn btn-primary" id="sidebarToggle">Abrir menu</button>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
              <li class="nav-item active"><a class="nav-link" href="../index.php">MAIN</a></li>
              <li class="nav-item"><a class="nav-link" href="#!">Link</a></li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- Page content-->
      <div class="row row-cols-1 row-cols-md-2 g-4">
        <div class="col">
          <div class="card">

            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">RELLENO NO SE QUE PONER </p>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card">

            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">RELLENO NO SE QUE PONER </p>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card">

            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content.</p>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card">

            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">RELLENO NO SE QUE PONER </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>



  <!-- Bootstrap core JS-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

  <!-- Core theme JS-->
  <script src="js/scripts.js"></script>
</body>

</html>