<?php
include "dbconn.php"; 


if(isset($_POST['submit'])) {

    if(isset($_POST['delsportid'])) {
    
    $id = $_POST['delsportid']; 

    $query = "DELETE from sports WHERE idDeporte='$id' ";

    $run = mysqli_query($conn,$query) or die(mysqli_error($conn));

    if($run) {
        echo " Deporte eliminado";
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