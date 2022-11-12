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
                <a class="list-group-item list-group-item-action list-group-item-dark p-3" href="../evento/eventos.php">Eventos</a>
                <a class="list-group-item list-group-item-action list-group-item-dark p-3" href="../deportes.php">Deportes</a>
                <a class="list-group-item list-group-item-action list-group-item-dark p-3" href="../partido/partido.php">Partidos</a>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle list-group-item list-group-item-action list-group-item-dark p-3" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Jugadores/Equipos
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item list-group-item list-group-item-action list-group-item-dark p-3" href="../jugadores.php">Jugadores</a></li>
                        <li><a class="dropdown-item list-group-item list-group-item-action list-group-item-dark p-3" href="../equipos.php">Equipos</a></li>
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
                                <h5 class="card-title">Agregar equipo</h5>
                                <p class="card-text">Agregar equipo </p>
                                <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                    Agregar equipo
                                </a>
                                <div class="collapse" id="collapseExample">
                                    <div class="card card-body">
                                        <div class="formulario">
                                            <form enctype="multipart/form-data" action="../db/teamdbconn.php" method="POST">
                                                <select class="form-select mb-3" name="deporte" aria-label="Default select example" required>
                                                    <option value="" selected>Selecciona un deporte para el equipo</option>
                                                    <?php
                                                    $sql = "SELECT idDeporte,nDeporte FROM sports ORDER BY idDeporte ";
                                                    $result = $conn->query($sql);

                                                    if ($result->num_rows > 0) {

                                                        while ($row = $result->fetch_assoc()) {
                                                            echo '<option value="'  . $row['idDeporte'] . '" >' . $row['nDeporte'] . '</option>';
                                                        }
                                                    }

                                                    ?>
                                                </select>
                                                <div class="row mb-3">
                                                    <label class="label1">Nombre del equipo</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="nombre" class="form-control form1" required>
                                                    </div>
                                                </div>


                                                <div class="row mb-3">
                                                    <label class="label1">Selecciona una imagen para el equipo</label>
                                                    <?php if (isset($_GET['error'])) : ?>
                                                        <p><?php echo $_GET['error']; ?></p>
                                                    <?php endif ?>

                                                    <input class="form-control form1" type="file" name="my_image" required>
                                                </div>


                                                <div class="row mb-3">
                                                    <label class="label1">Elige cuantos deportistas integraran este equipo.</label>
                                                    <div class="col-sm-10">
                                                        <input type="number" onclick="miembrosteam()" id="numPlay" class="form-control form1" name="numPlay" min="1" max="99">
                                                    </div>
                                                </div>

                                                <div id="test" class="test">

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
                                <h5 class="card-title">Editar equipos</h5>
                                <p class="card-text">Permite editar los equipos ya registrados</p>
                                <a class="btn btn-primary" href="editarequipo.php" role="button" >Editar equipo</a>
                            </div>
                        </div>
                    </div>
                        <div class="col-sm-6">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">Borrar equipos</h5>
                                    <p class="card-text">Permite borrar los equipos ya registrados</p>
                                    <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapse2" role="button" aria-expanded="false" aria-controls="collapseExample">
                                        Borrar equipo
                                    </a>
                                    <div class="collapse" id="collapse2">
                                        <div class="card card-body">
                                            <div class="formulario">
                                                <form action="../db/delequipodbconn.php" method="POST">
                                                    <select class="form-select mb-3" name="delteam" aria-label="Default select example" required>
                                                        <option value="" selected>Seleccionar equipo a eliminar</option>

                                                        <?php
                                                        $sql = "SELECT idEquipo,nEquipo FROM equipos ORDER BY idEquipo  ";
                                                        $result = $conn->query($sql);

                                                        if ($result->num_rows > 0) {

                                                            while ($row = $result->fetch_assoc()) {
                                                                echo '<option value="'  . $row['idEquipo'] . '">' . $row['nEquipo'] . '</option>';
                                                            }
                                                        }

                                                        ?>

                                                    </select>
                                                    <button type="submit" name="submit" class="btn btn-primary">Eliminar</button>
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

    <script src="../../modelo/miembrosteam.js"></script>



</body>

</html>