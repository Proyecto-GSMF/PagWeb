<?php
include "dbconn.php"; 


if(isset($_POST['submit'])) {

if(isset($_POST['deporte'])) {
    $deporte = $_POST['deporte'] ;
    $tipo = $_POST['tipodep'];

    $query = "INSERT INTO sports(nDeporte,tDeporte) values('$deporte','$tipo') ";

    $run = mysqli_query($conn,$query) or die(mysqli_error($conn));

    if($run) {
        echo " Deporte agregado";
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