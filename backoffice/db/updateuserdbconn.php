<?php
include "dbconn.php"; 


if(isset($_POST['submit'])) {

    if(isset($_POST['updateuserid']) && isset($_POST['updatepremid'])) {
    
    $id = $_POST['updateuserid']; 

    $prem = $_POST['updatepremid'] ;
    
    $query = "UPDATE users SET tipousuario='$prem' WHERE idUser='$id' ";

    $run = mysqli_query($conn,$query) or die(mysqli_error($conn));

    if($run) {

        if ($prem == 1) {
        echo " El usuario ahora es premium";
        header("location:../usuarios.php?id=$id&mensaje=hecho");
        } else {
            echo "El usuario ahora es no premium";
            header("location:../usuarios.php?id=$id&mensaje=hecho");
        }

    } else {
        echo "Hubo un error desconocido";
        header("location:../usuarios.php?id=$id&mensaje=error");
    }

} else {
    echo "Ingresa todos los datos";
    header("location:../usuarios.php?id=$id&mensaje=error");
}


}




?>