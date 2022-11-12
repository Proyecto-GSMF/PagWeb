<?php
include "dbconn.php"; 


if(isset($_POST['submit'])) {

if(isset($_POST['deporte']) && isset($_POST['nombre']) && isset($_POST['apellido'])) {
    $deporte = $_POST['deporte'] ;
    $nombre = $_POST['nombre'] ;
    $apellido = $_POST['apellido'] ;

    $query = "insert into jugadores(nJugador,aJugador,idDeporte) values('$nombre','$apellido','$deporte') ";

    $run = mysqli_query($conn,$query) or die(mysqli_error($conn));

    if($run) {
        echo " Jugador agregado";
        header("location:../jugadores.php?id=$id&mensaje=hecho");

    } else {
        echo ' No se puede editar, error desconocido.' ;
        header("location:../jugadores.php?id=$id&mensaje=error");
    }

} else {
    echo " Ingresa todos los datos";
    header("location:../jugadores.php?id=$id&mensaje=error");
}


}




?>