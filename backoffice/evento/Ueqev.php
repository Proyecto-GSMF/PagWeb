<?php
include "../db/dbconn.php"; 


if(isset($_POST['submit'])) {
    $deporte = $_POST['deporte'];
	$nombre = $_POST['nombre'];
    $lugar = $_POST['lugar'];
    $estado = $_POST['estado'];
    $id = $_POST['id'];

    echo $id.'TEST';

    if(isset($_POST['deporte'])) {
        $queryD = "UPDATE evento SET idDeporte='$deporte' WHERE idEvento='$id' ";
        $runA = mysqli_query($conn,$queryD) ;
    }

    if($_POST['nombre'] != '') {
        $queryN = "UPDATE evento SET nEvento='$nombre' WHERE idEvento='$id' ";
        $runA = mysqli_query($conn,$queryN) ;
    }

    if($_POST['lugar'] != '') {
        $queryL = "UPDATE evento SET lugar='$lugar' WHERE idEvento='$id' ";
        $runA = mysqli_query($conn,$queryL) ;
    }

    if($_POST['estado'] != '') {
        $queryE = "UPDATE evento SET estado='$estado' WHERE idEvento='$id' ";
        $runA = mysqli_query($conn,$queryE) ;
    }


if(isset($_POST['numPlay'])) {
   # $queryB = "UPDATE evento SET idDeporte='$deporte',nEvento='$nombre',lugar='$lugar',estado= WHERE idEvento='$id' ";
   # $runB = mysqli_query($conn,$queryB) or die(mysqli_error($conn));

    $x = $_POST['numPlay'] ;
    $i = 0;

    for ($i = 0; $i < $x; $i++ ) {
            

   
        $aa = 'team'.$i;
		$equipo = $_POST[$aa];

        echo '---------'.$equipo;

		$query2 = "INSERT into evento_equipo (idEvento,idEquipo) values($id,$equipo)  " ;
        
        $run2 = mysqli_query($conn,$query2) ;

        $error = mysqli_error($conn);

        if(!$run2) {
            echo '<br>';
            

           header("location:editarevento.php?id=$id&mensaje=error&error=$error");
        }
	} 
    if($run2) {
       header("location:editarevento.php?id=$id&mensaje=hecho");
    } else {
        header("location:editarevento.php?id=$id&mensaje=error");
    }
    }
    else {
        echo " Ingresa todos los datos";
       header( "refresh:2;url=../eventos.php" );
    }
}
