<?php
include "../db/dbconn.php"; 


if(isset($_POST['submit2'])) {

    if( isset($_POST['delpid']) ) {
    

        $id = $_POST['delpid'];  
    }
    
    $query = "DELETE from partido WHERE idPartido='$id' ";

    $run = mysqli_query($conn,$query) or die(mysqli_error($conn));

    if($run) {
        header("location:partido.php?id=$id&mensaje=hecho");

    } else {
        echo ' No se puede editar, error desconocido.' ;
        header("location:partido.php?id=$id&mensaje=error");
    }

} else {
    echo " Ingresa todos los datos";
    header("location:partido.php?id=$id&mensaje=error");

}

?>


