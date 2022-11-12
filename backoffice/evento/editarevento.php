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
                            <li class="nav-item active"><a class="nav-link" href="../../index.php">MAIN</a></li>
                            <li class="nav-item"><a class="nav-link" href="#!">Link</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Page content-->
            <div class="container-fluid">
            <?php
                if(isset($_REQUEST['mensaje'])){
                if($_REQUEST['mensaje'] == 'hecho'){
                  echo " <div class='alert alert-success'>
                               Realizado con exito
                          </div>";
             } else {
                    if(isset($_REQUEST['error'])) {
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
                <h1 class="mt-4 nashe">BRUM DASHBOARD</h1>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Editar evento</h5>
                                <div class="formulario">
                                    <form action="Ueqev.php" method="POST">
                                        <select class="form-select mb-3" id="id" name="id" aria-label="Default select example" >

                                            <option value="" selected>Evento a editar</option>
                                            <?php
                                            $sql = "SELECT idEvento,nEvento FROM evento ORDER BY idEvento  ";
                                            $result = $conn->query($sql);

                                            if ($result->num_rows > 0) {

                                                while ($row = $result->fetch_assoc()) {
                                                    echo '<option value="'  . $row['idEvento'] . '" >' . $row['nEvento'] . '</option>';
                                                }
                                            }

                                            ?>
                                        </select>
                                        
                                        <button type="button" onclick="tablaeditarE()" id="idBtn" name="idBtn" class="form-button mb-3 btn btn-primary">Mostrar particpantes</button>

                                        <select class="form-select mb-3" name="deporte" aria-label="Default select example" >
                                            <option value="" selected>Selector de deporte</option>
                                            <?php
                                            $sql = "SELECT idDeporte,nDeporte FROM sports ORDER BY idDeporte  ";
                                            $result = $conn->query($sql);

                                            if ($result->num_rows > 0) {

                                                while ($row = $result->fetch_assoc()) {
                                                    echo '<option value="'  . $row['idDeporte'] . '" >' . $row['nDeporte'] . '</option>';
                                                }
                                            }

                                            ?>
                                        </select>
                                        <div class="row mb-3">
                                            <label class="label1">Nombre</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="nombre" class="form-control form1" >
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label class="label1">Lugar</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="lugar" class="form-control form1" >
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label class="label1">Estado del evento</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="estado" class="form-control form1" >
                                            </div>
                                        </div>


                                        <div class="row mb-3">
                                            <label class="label1">Agrega nuevos participantes</label>
                                            <div class="col-sm-10">
                                                <input type="number" onclick="selequipos()" id="numPlay" class="form-control form1" name="numPlay" min="1" max="100">
                                            </div>
                                        </div>

                                        <div id="test" class="test">

                                        </div>

                                        <button type="submit" name="submit" class="btn btn-primary">Editar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Lista de participantes del evento:</h5>
                                <div class="formulario">

                                    <div id="test">
                                        <hr>
                                        <input type="hidden" value="">

                                        <?php

                                        if (isset($_REQUEST['id'])) {
                                            $id = $_REQUEST['id'];



                                            $sql = "SELECT * FROM evento_equipo,equipos WHERE idEvento = $id AND evento_equipo.idEquipo = equipos.idEquipo ORDER BY idEvento ";
                                            $result = $conn->query($sql);


                                            if($result) {
                                            if ($result->num_rows > 0) {
                                                
                                                $i = 0;

                                                while ($row = $result->fetch_assoc()) {

                                                    $i++;

                                                    $eq = $row['idEquipo'];
                                                    $ev = $row['idEvento'];

                                                    echo ' <form action="delEqEv.php?eq='. $eq .'&ev='. $ev .'" method="POST" class="row g-3">
                                                    <div class="col-auto">
                                                        <h3>' . $row['nEquipo'] . '</h3>
                                                      
                                                        <input type="hidden" name"ideq" value="' . $row['idEquipo'] . '">
                                                        <input type="hidden" name"idev" value="' . $id . '">
                                                    </div>

                                                   
                                                    <div class="col-auto">
                                                        <input type="submit" value="Eliminar" class="btn btn-danger mb-3">
                                                    </div>
                                                </form>
                                                <hr>';
                                                }
                                            } else {

                                                echo 'No hay equipos en el evento';
                                            }
                                        }
                                    } 

                                        ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Core theme JS-->
    <script src="../js/scripts.js"></script>
    <script src="../../modelo/tablaeditarE.js"></script>
    <script src="../../modelo/Eselequipos.js"></script>

</body>

</html>