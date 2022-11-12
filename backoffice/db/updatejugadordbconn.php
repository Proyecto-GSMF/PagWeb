<?php
include "dbconn.php"; 


if(isset($_POST['submit'])) {

    if(isset($_POST['updatejugadorid']) && isset($_POST['deporte']) && isset($_POST['nombre']) && isset($_POST['apellido'])) {
    
    $id = $_POST['updatejugadorid']; 
    $deporte = $_POST['deporte'] ;
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    
    $query = "UPDATE jugadores SET idDeporte='$deporte',nJugador='$nombre', aJugador='$apellido' WHERE idJugador='$id' ";

    $run = mysqli_query($conn,$query) or die(mysqli_error($conn));

    if($run) {
      
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