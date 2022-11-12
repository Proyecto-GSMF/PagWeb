<?php
include "../backoffice/db/dbconn.php"; 

    session_start();

    if(isset($_SESSION['userid'])){

        $id = $_SESSION['userid'];

        $queryA = "SELECT * from users where tipousuario=0 and idUser=$id";
        $runA = mysqli_query($conn,$queryA) or die(mysqli_error($conn));
        $row=mysqli_num_rows($runA);

        if($row == 1 ) {

            $queryB = "UPDATE users SET tipousuario=1 where idUser=$id";
            $runB = mysqli_query($conn,$queryB) or die(mysqli_error($conn));
            $msg = array('mensaje'=>'<div class="alert alert-success">Compra realizada con exito!</div>');


        } else {


            $msg = array('mensaje'=>'<div class="alert alert-danger">Ya eres premium</div>');

        }

    } else {

        $msg = array('mensaje'=>'<div class="alert alert-danger">Debes iniciar sesion para comprar el premium</div>');

    }


    echo json_encode($msg);

?>