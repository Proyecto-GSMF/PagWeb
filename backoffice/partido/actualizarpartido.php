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
                <a class="list-group-item list-group-item-action list-group-item-dark p-3" href="../partido/partido.php">Encuentros</a>
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

                <h1 class="mt-4 nashe">BRUM DASHBOARD</h1>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Incidencias del encuentro</h5>
                                <div class="formulario">
                                    <form action="actualizardbconn.php" method="POST">

                                        <!-- ========== idPartido select variable ========== -->
                                        <?php
                                        if (isset($_REQUEST['id'])) {

                                        ?>

                                            <select class="form-select mb-3" id="id" name="id" aria-label="Default select example">

                                                <?php $sql = "SELECT idPartido,nPartido FROM partido where idPartido=$_REQUEST[id]";
                                                $result = $conn->query($sql);

                                                $nP = mysqli_fetch_array($result);

                                                ?>

                                                <option value="<?php echo $_REQUEST['id']  ?>"><?php echo $nP['nPartido'] ?>
                                                </option>
                                                <?php
                                                $sql = "SELECT idPartido,nPartido FROM partido ORDER BY idPartido  ";
                                                $result = $conn->query($sql);

                                                if ($result->num_rows > 0) {





                                                    while ($row = $result->fetch_assoc()) {
                                                        echo '<option  value="'  . $row['idPartido'] . '" >' . $row['nPartido'] . '</option>';
                                                    }
                                                }

                                                ?>
                                            </select>

                                        <?php

                                        } else {


                                        ?>

                                            <select class="form-select mb-3" id="id" name="id" aria-label="Default select example">


                                                <option value="">Encuentro a editar</option>
                                                <?php
                                                $sql = "SELECT idPartido,nPartido FROM partido ORDER BY idPartido  ";
                                                $result = $conn->query($sql);

                                                if ($result->num_rows > 0) {





                                                    while ($row = $result->fetch_assoc()) {
                                                        echo '<option  value="'  . $row['idPartido'] . '" >' . $row['nPartido'] . '</option>';
                                                    }
                                                }

                                                ?>
                                            </select>

                                        <?php

                                        }
                                        ?>


                                        <!-- ========== nPartido h3 ========== -->



                                        <?php

                                        if (isset($_REQUEST['id'])) {
                                            $id = $_REQUEST['id'];



                                            $sql = "SELECT nPartido FROM partido WHERE idPartido = $id;";
                                            $result = $conn->query($sql);


                                            if ($result) {
                                                if ($result->num_rows > 0) {


                                                    $row = $result->fetch_assoc();

                                                    echo '<h3 class="form">Partido seleccionado: ' . $row['nPartido'] . '</h3>';

                                                    echo '<hr>';
                                                }
                                            }
                                        }

                                        ?>
                                        <small class="text-muted">Ignorar error al seleccionar equipo</small>
                                        <!-- ========== idEquipo ========== -->

                                        <?php
                                        if (isset($_REQUEST['id'])) {

                                        ?>

                                            <select class="form-select mb-3" id="idEq" name="idEq" aria-label="Default select example">

                                                <?php $sql = "SELECT partido.idPartido,equipos.idEquipo,nEquipo FROM partido,equipos,equipo_partido WHERE equipos.idEquipo = equipo_partido.idEquipo AND equipo_partido.idPartido = partido.idPartido AND equipo_partido.idPartido = $_REQUEST[id] AND equipo_partido.idEquipo = $_REQUEST[eq];";
                                                $result = $conn->query($sql);

                                                $nT = mysqli_fetch_array($result);



                                                ?>

                                                <option value="<?php echo $nT['idEquipo']  ?>"><?php echo $nT['nEquipo'] ?>
                                                </option>
                                                <?php
                                                $sql = "SELECT partido.idPartido,equipos.idEquipo,nEquipo FROM partido,equipos,equipo_partido WHERE equipos.idEquipo = equipo_partido.idEquipo AND equipo_partido.idPartido = partido.idPartido AND equipo_partido.idPartido = $_REQUEST[id]";
                                                $result = $conn->query($sql);

                                                if ($result->num_rows > 0) {





                                                    while ($row = $result->fetch_assoc()) {
                                                        echo '<option  value="'  . $row['idEquipo'] . '" >' . $row['nEquipo'] . '</option>';
                                                    }
                                                }

                                                ?>
                                            </select>

                                        <?php

                                        } else {


                                        ?>

                                            <select class="form-select mb-3" id="id" name="id" aria-label="Default select example">


                                                <option value="">Equipo a seleccionar</option>
                                                <?php
                                                $sql = "SELECT partido.idPartido,equipos.idEquipo,nEquipo FROM partido,equipos,equipo_partido WHERE equipos.idEquipo = equipo_partido.idEquipo AND equipo_partido.idPartido = partido.idPartido AND equipo_partido.idPartido = $_REQUEST[id]";
                                                $result = $conn->query($sql);

                                                if ($result->num_rows > 0) {





                                                    while ($row = $result->fetch_assoc()) {
                                                        echo '<option  value="'  . $row['idEquipo'] . '" >' . $row['nEquipo'] . '</option>';
                                                    }
                                                }

                                                ?>
                                            </select>

                                        <?php

                                        }
                                        ?>


                                        <div class="row mb-3">
                                            <label class="label1">Nombre de la incidencia: <small class="text-muted">(Faltas, Cambios, etc. No agregar
                                                    anotación/tiempo llegada como incidencia, hacerlo en la otra
                                                    tabla!)</small></label>
                                            <div class="col-sm-10">
                                                <input type="text" name="nombre" class="form-control form1">
                                            </div>
                                        </div>
                                        <div class="row g-3">
                                            <label class="label1">Momento en el que se comete la incidencia <small class="text-muted">(Por defecto 00:00) minuto
                                                    segundo</small></label>


                                            <div class="col-auto">
                                                <input type="number" placeholder="MM" name="minuto" class="form-control form1">
                                            </div>


                                            <div class="col-auto">
                                                <input type="number" placeholder="SS" min="00" max="60" name="segundo" class="form-control form1">
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="row mb-3">
                                            <button type="submit" name="submit" class="btn btn-primary">Actualizar
                                                encuentro</button>
                                        </div>


                                </div>

                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Incidencias del encuentro</h5>
                                <div class="formulario">
                                    <form action="actualizarresdbconn.php" method="POST">


                                        <div class="row mb-3">
                                            <h3>Actualizar resultado</h3>
                                            <small class="text-muted">Actualiza el resultado del encuentro seleccionado en
                                                la otra tabla</small>
                                        </div>




                                        <select class="form-select mb-3" id="idEq" name="idRe" aria-label="Default select example">

                                            <option value="" selected>Seleccione equipo que comete la incidencia </option>
                                            <?php

                                            if (isset($_REQUEST['id'])) {
                                                $id = $_REQUEST['id'];
                                                $idEq = $_REQUEST['eq'];


                                                $sql0 = "SELECT resultado.idResultado,nEquipo,equipos.idEquipo FROM equipos,resultado,partido_resultado,equipo_partido where equipo_partido.idEquipo = resultado.idEquipo and equipo_partido.idPartido = partido_resultado.idPartido AND equipos.idEquipo = equipo_partido.idEquipo AND resultado.idEquipo = $idEq AND partido_resultado.idPartido = $id GROUP BY resultado.idEquipo";
                                                $result0 = $conn->query($sql0);


                                                if ($result0) {
                                                    if ($result0->num_rows > 0) {





                                                        while ($row = $result0->fetch_assoc()) {

                                                            echo '<option  value="'  . $row['idResultado'] . '" >' . $row['nEquipo'] . '</option>';
                                                        }
                                                    }
                                                }
                                            }


                                            ?>

                                        </select>
                                        <?php

                                        if (isset($_REQUEST['id'])) {
                                            $id = $_REQUEST['id'];
                                            $idEq = $_REQUEST['eq'];

                                            echo '<input type="hidden" value="'. $id .'" name="id">';
                                            echo '<input type="hidden" value="'. $idEq .'" name="eq">';
                                        }


                                        ?>


                                        <div class="row g-3">
                                            <label class="label1">Momento en el que se comete la anotacion <small class="text-muted">(Por defecto 00:00) minuto
                                                    segundo</small></label>

                                            <div class="col-auto">
                                                <input type="number" placeholder="MM" name="minutoA" class="form-control form1">
                                            </div>

                                        
                                            <div class="col-auto">
                                                <input type="number" placeholder="SS" name="segundoA" class="form-control form1">
                                            </div>
                                        </div>
                                        <br>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" onclick="mostrar('si')" id="op1" value="op1">
                                            <label class="form-check-label" for="inlineRadio1"> Anotacion </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" onclick="mostrar('no')" id="op2" value="op1">
                                            <label class="form-check-label" for="inlineRadio2">Tiempo</label>
                                        </div>

                                        <div id="numero" style="display: none;" class="">

                                            <input type="number" name="anotacion" placeholder="Anotacion" class="form-control form1">

                                        </div>

                                        <div id="tiempo" style="display: none;" class="">
                                            <div class="row g-3">



                                                <div class="col-auto">
                                                    <input type="number" placeholder="MM" name="minutoT" class="form-control form1">
                                                </div>


                                                <div class="col-auto">
                                                    <input type="number" placeholder="SS" min="00" max="60" name="segundoT" class="form-control form1">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row mb-3">
                                            <button type="submit" name="submit" class="btn btn-primary">Actualizar
                                                encuentro</button>
                                        </div>


                                </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
        </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <!-- Core theme JS-->
        <script src="../js/scripts.js"></script>
        <script src="../../modelo/tablaeditarEa.js"></script>
        <script src="../../modelo/Eselequipos.js"></script>
        <script src="../../modelo/Eseljugind.js"></script>
        <script>
            function mostrar(n) {


                if (n == 'si') {
                    console.log(n);
                    document.getElementById('tiempo').style.display = 'none';
                    document.getElementById('numero').style.display = 'block';
                } else {
                    console.log(n);
                    document.getElementById('numero').style.display = 'none';
                    document.getElementById('tiempo').style.display = 'block';

                }

            }
        </script>




</body>

</html>