<?php
include "../db/dbconn.php";


if (isset($_POST['submit'])) {

    if (isset($_POST['id']) && isset($_POST['idEq'])) {

        $idP = $_POST['id'];
        $idEq = $_POST['idEq'];

        if ($_POST['nombre'] != '') {

            $nombre = $_POST['nombre'];

            $minuto = $_POST['minuto'];
            $segundo = $_POST['segundo'];

            $tiempo = '';

            if ($_POST['minuto'] != '' && $_POST['segundo']) {

                $tiempo = $minuto . ':' . $segundo;
                echo $tiempo;
            } else {
                $tiempo = '00:00';
            }

            $queryA = "INSERT into incidencias (idPartido,idEquipo,nIncidencia,tiempo) values('$idP','$idEq','$nombre','$tiempo')";

            $runA = mysqli_query($conn, $queryA) or die(mysqli_error($conn));

            
        } else {

       header("location:editarpartido.php?id=$pp&mensaje=error");

        }
    } else {

       header("location:editarpartido.php?id=$pp&mensaje=error");

    }
} else {

    header("location:editarpartido.php?id=$pp&mensaje=error");

}
