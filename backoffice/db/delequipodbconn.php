<?php
include "dbconn.php"; 


if(isset($_POST['submit'])) {

    if(isset($_POST['delteam'])) {
    
    $id = $_POST['delteam']; 

    $query = "DELETE from equipos WHERE idEquipo='$id' ";

    $run = mysqli_query($conn,$query) or die(mysqli_error($conn));

    if($run) {
        echo " Equipo eliminado";
        header("location:../equipos.php?id=$id&mensaje=hecho");

    } else {
        echo ' No se puede editar, error desconocido.' ;
        header("location:../equipos.php?id=$id&mensaje=error");
      
    }

} else {
    echo " Ingresa todos los datos";
    header("location:../equipos.php?id=$id&mensaje=error");
      
}


}




?>