<?php
include "../db/dbconn.php";


if (isset($_POST['submit'])) {

    

        $idP = $_POST['id'];
      ;
        $idEq = $_REQUEST['eq'];
    ;
        $idRe = $_POST['idRe'];
      
        $anotacion = $_POST['anotacion'];
      

            $minuto = $_POST['minutoA'];
            $segundo = $_POST['segundoA'];

            $tiempo = '';

            if ($_POST['minutoA'] != '' && $_POST['segundoA']) {

                $tiempo = $minuto . ':' . $segundo;
                echo $tiempo;
            } else {
                $tiempo = '00:00';
            }

            if($_POST['anotacion'] != ''){



            $queryA = "INSERT into incidencias (idPartido,idEquipo,nIncidencia,tiempo) values('$idP','$idEq','anotacion','$tiempo')";
            $queryB = "UPDATE resultado SET anotacion=$anotacion where idEquipo = $idEq and idResultado = $idRe";

            $runA = mysqli_query($conn, $queryA) or die(mysqli_error($conn));
            $runB = mysqli_query($conn, $queryB) or die(mysqli_error($conn));

        header("location:editarpartido.php?id=$pp&mensaje=hecho");



            } else {

       header("location:editarpartido.php?id=$pp&mensaje=error");

            }
         
    } else {

       header("location:editarpartido.php?id=$pp&mensaje=error");

    }

