<?php
include "dbconn.php"; 


if(isset($_POST['submit2'])) {

    if(isset($_POST['deleventoid'])) {
    
    $id = $_POST['deleventoid']; 

    $query = "DELETE from evento WHERE idEvento='$id' ";

    $run = mysqli_query($conn,$query) or die(mysqli_error($conn));

    if($run) {
        echo " Evento eliminado";
        header("location:../evento/eventos.php?id=$id&mensaje=hecho");

    } else {
        echo ' No se puede editar, error desconocido.' ;
        header("location:../evento/eventos.php?id=$id&mensaje=error");
    }

} else {
    echo " Ingresa todos los datos";
    header("location:../evento/eventos.php?id=$id&mensaje=error");
}


}




?>