<?php

include "../db/dbconn.php";
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
  <link href="../css/styles.css" rel="stylesheet" />

</head>

<body>
  <div class="d-flex" id="wrapper">
    <!-- Sidebar-->
    <div class="border-end bg-dark" id="sidebar-wrapper">
      <div class="sidebar-heading border-bottom bg-light"> <a href="../index.php">BRUM DASHBOARD</a></div>
      <div class="list-group list-group-flush">
        <a class="list-group-item list-group-item-action list-group-item-dark p-3" href="eventos.php">Eventos</a>
        <a class="list-group-item list-group-item-action list-group-item-dark p-3" href="../deportes.php">Deportes</a>
        <a class="list-group-item list-group-item-action list-group-item-dark p-3" href="../partido/partido.php">Partidos</a>
        <div class="dropdown">
          <button class="btn btn-secondary dropdown-toggle list-group-item list-group-item-action list-group-item-dark p-3" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Jugadores/Equipos
          </button>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item list-group-item list-group-item-action list-group-item-dark p-3" href="../jugadores.php">Jugadores</a></li>
            <li><a class="dropdown-item list-group-item list-group-item-action list-group-item-dark p-3" href="../equipo/equipos.php">Equipos</a></li>
          </ul>
        </div>
        <a class="list-group-item list-group-item-action list-group-item-dark p-3" href="../usuarios.php">Usuarios</a>
        <a class="list-group-item list-group-item-action list-group-item-dark p-3" href="../ads.php">Anuncios</a>
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
      <?php
      if (isset($_REQUEST['mensaje'])) {
        if ($_REQUEST['mensaje'] == 'hecho') {
          echo " <div class='alert alert-success'>
                               Realizado con exito
                          </div>";
        } else {
          if (isset($_REQUEST['error'])) {
            echo "<div class='alert alert-danger  text-center'>
                        <h5 class='alert-heading'>ERROR</h5>
                        Se ha detectado un error: $_REQUEST[error] </div>";
          } else {
            echo " <div class='alert alert-danger'>
                                   Se ha detectado un error 
                          </div>";
          }
        }
      }


      ?>
      <div class="container-fluid">
        <h1 class="mt-4 nashe">BRUM DASHBOARD</h1>
        <div class="row">
          <div class="col-sm-6">
            <div class="card mb-3">
              <div class="card-body">
                <h5 class="card-title">Crear evento</h5>
                <p class="card-text">Crear un evento </p>
                <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                  Crear evento
                </a>
                <div class="collapse" id="collapseExample">
                  <div class="card card-body">
                    <div class="formulario">
                      <form enctype="multipart/form-data" action="../db/eventosdbconn.php" method="POST">
                        <select class="form-select mb-3" name="deporte" aria-label="Default select example" required>
                          <option value="" selected>Selecciona un deporte para el evento</option>
                          <?php
                          $sql = "SELECT idDeporte,nDeporte FROM sports ORDER BY idDeporte ";
                          $result = $conn->query($sql);

                          if ($result->num_rows > 0) {

                            while ($row = $result->fetch_assoc()) {
                              $deporte = $row['idDeporte'];
                              echo '<option value="'  . $row['idDeporte'] . '" >' . $row['nDeporte'] . '</option>';
                            }
                          }

                          ?>
                        </select>



                        <div class="row mb-3">
                          <label class="label1">Nombre del evento</label>
                          <div class="col-sm-10">
                            <input type="text" name="nombre" class="form-control form1" required>
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label class="label1">Lugar del evento</label>
                          <div class="col-sm-10">
                            <input type="text" name="lugar" class="form-control form1" required>
                          </div>
                        </div>

                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="inlineRadioOptions" onclick="mostrar('si')" id="op1" value="op1">
                          <label class="form-check-label" for="inlineRadio1">Mostrar equipos</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="inlineRadioOptions" onclick="mostrar('no')" id="op2" value="op1">
                          <label class="form-check-label" for="inlineRadio2">Mostrar deportistas individuales</label>
                        </div>

                        <div class="equi" id="equi" style="display: none;">
                          <div class="row mb-3">
                            <label class="label1">Elige cuantos equipos estarán en el encuentro</label>
                            <div class="col-sm-10">
                              <input type="number" onclick="selequipos()" id="numPlay" class="form-control form1" name="numPlay" min="1" max="999999">
                            </div>
                          </div>
                        </div>

                        <div class="indi" id="indi" style="display: none;">
                          <div class="row mb-3">
                            <label class="label1">Elige cuantos deportistas individuales estarán en el encuentro</label>
                            <div class="col-sm-10">
                              <input type="number" onclick="seljugind()" id="numPlay2" class="form-control form1" name="numPlay2" min="1" max="999999">
                            </div>
                          </div>
                        </div>


                        <div id="test" class="test">

                        </div>


                        <div id="test2" class="test">

                        </div>

                        <button type="submit" name="submit" class="btn btn-primary">Agregar</button>

                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="card mb-3">
              <div class="card-body">
                <h5 class="card-title">Editar evento</h5>
                <p class="card-text">Editar un evento </p>
                <a class="btn btn-primary" role="button" href="editarevento.php">
                  Editar evento
                </a>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="card mb-3">
              <div class="card-body">
                <h5 class="card-title">Borrar eventos</h5>
                <p class="card-text">Permite borrar los eventos ya registrados</p>
                <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapse2" role="button" aria-expanded="false" aria-controls="collapseExample">
                  Borrar evento
                </a>
                <div class="collapse" id="collapse2">
                  <div class="card card-body">
                    <div class="formulario">
                      <form action="../db/deleteeventosdbconn.php" method="POST">
                        <select class="form-select mb-3" name="deleventoid" aria-label="Default select example" required>
                          <option selected value="">Selector de evento</option>
                          <?php
                          $sql = "SELECT idEvento,nEvento FROM evento ORDER BY idEvento ";
                          $result = $conn->query($sql);

                          if ($result->num_rows > 0) {

                            while ($row = $result->fetch_assoc()) {
                              echo '<option value="' . $row['idEvento'] . ' " >' . $row['nEvento'] . '</option>';
                            }
                          }

                          ?>
                        </select>
                        <button type="submit" name="submit2" class="btn btn-primary">Eliminar</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>

  <!-- Bootstrap core JS-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <!-- Core theme JS-->
  <script src="../js/scripts.js"></script>
  <script src="../../modelo/Eselequipos.js"></script>
  <script src="../../modelo/Eseljugind.js"></script>

  <script>
    function mostrar(n) {


      if (n == 'si') {
        console.log(n);
        document.getElementById('indi').style.display = 'none';
        document.getElementById('equi').style.display = 'block';
        document.getElementById('test2').style.display = 'none';
        document.getElementById('test').style.display = 'block';
      } else {
        console.log(n);
        document.getElementById('equi').style.display = 'none';
        document.getElementById('indi').style.display = 'block';
        document.getElementById('test').style.display = 'none';
        document.getElementById('test2').style.display = 'block';
      }

    }
  </script>
</body>

</html>