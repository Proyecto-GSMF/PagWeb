<?php
include "dbconn.php"; 


if(isset($_POST['submit'])) {

    if(isset($_POST['deljugadorid'])) {
    
    $id = $_POST['deljugadorid']; 

    $query = "DELETE from jugadores WHERE idJugador='$id' ";

    $run = mysqli_query($conn,$query) or die(mysqli_error($conn));

    if($run) {
        echo " Jugador eliminado";
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