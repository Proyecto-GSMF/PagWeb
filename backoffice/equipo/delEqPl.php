<?php
include "../db/dbconn.php"; 



    
    echo $_REQUEST['pl'];
    echo '<br>';
    echo $_REQUEST['eq'];


    if(isset($_REQUEST['pl']) && isset($_REQUEST['eq'])) {
    
    $pl = $_REQUEST['pl'];
    $eq = $_REQUEST['eq'];



    $query = "DELETE from jugadores_equipo WHERE idJugador=$pl AND idEquipo = $eq";

    $run = mysqli_query($conn,$query) or die(mysqli_error($conn));

    if($run) {

   
        header("location:editarequipo.php?id=$id&mensaje=hecho");
      
    } else {
       header("location:editarequipo.php?id=$id&mensaje=error");
      
    }

} else {
    header("location:editarequipo.php?id=$id&mensaje=error");
  
}







?>