<?php
include "../db/dbconn.php"; 



    
    echo $_REQUEST['ev'];
    echo '<br>';
    echo $_REQUEST['eq'];


    if(isset($_REQUEST['ev']) && isset($_REQUEST['eq'])) {
    
    $id = $_REQUEST['ev'];
    $eq = $_REQUEST['eq'];



    $query = "DELETE from evento_equipo WHERE idEquipo=$eq AND idEvento = $id ";

    $run = mysqli_query($conn,$query) or die(mysqli_error($conn));

    if($run) {

   
        header("location:editarevento.php?id=$id&mensaje=hecho");
      
    } else {
        header("location:editarevento.php?id=$id&mensaje=error");
      
    }

} else {
    header("location:editarevento.php?id=$id&mensaje=error");
  
}







?>