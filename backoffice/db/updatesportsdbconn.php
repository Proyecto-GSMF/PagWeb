<?php
include "dbconn.php"; 


if(isset($_POST['submit'])) {

    if(isset($_POST['updatesportid']) && isset($_POST['deporte'])) {
    
    $id = $_POST['updatesportid']; 
    $tipo = $_POST['tipodep'];

    $deporte = $_POST['deporte'] ;
    
    $query = "UPDATE sports SET nDeporte='$deporte',tDeporte='$tipo' WHERE idDeporte=$id ";

    $run = mysqli_query($conn,$query) or die(mysqli_error($conn));

    if($run) {
        echo " Deporte editado";
        header( "refresh:2;url=../deportes.php" );

    } else {
        echo ' No se puede editar, error desconocido.' ;
        header( "refresh:2;url=../deportes.php" );
    }

} else {
    echo " Ingresa todos los datos";
    header( "refresh:2;url=../deportes.php" );
}


}




?>