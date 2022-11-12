<?php
include "../db/dbconn.php"; 



    
    echo $_REQUEST['pp'];
    echo '<br>';
    echo $_REQUEST['eq'];


    if(isset($_REQUEST['pp']) && isset($_REQUEST['eq'])) {
    
    $pp = $_REQUEST['pp'];
    $eq = $_REQUEST['eq'];



    $query = "DELETE from equipo_partido WHERE idEquipo=$eq AND idPartido = $pp";

    $run = mysqli_query($conn,$query) or die(mysqli_error($conn));

    if($run) {

   
        header("location:editarpartido.php?id=$pp&mensaje=hecho");
      
    } else {
       header("location:editarpartido.php?id=$pp&mensaje=error");
      
    }

} else {
    header("location:editarpartido.php?id=$pp&mensaje=error");
  
}







?>