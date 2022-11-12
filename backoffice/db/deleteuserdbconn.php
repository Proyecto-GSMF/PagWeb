<?php
include "dbconn.php"; 


if(isset($_POST['submit'])) {

    if(isset($_POST['deluserid'])) {
    
    $id = $_POST['deluserid']; 

    $query = "DELETE from users WHERE idUser='$id' ";
        mysqli_commit($conn,$query);
    $run = mysqli_query($conn,$query) or die(mysqli_error($conn));

    if($run) {
        echo " Usuario eliminado";
        header("location:../usuarios.php?id=$id&mensaje=hecho");

    } else {
        echo ' No se puede editar, error desconocido.' ;
        header("location:../usuarios.php?id=$id&mensaje=error");
    }

} else {
    echo " Ingresa todos los datos";
    header("location:../usuarios.php?id=$id&mensaje=error");
}


}




?>