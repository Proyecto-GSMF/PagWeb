<?php
include "../lib/dbconn.php"; 


if(isset($_POST['submit'])) {



    if(isset($_POST['id'])){

    
    $id = $_POST['id']; 
    
    $query = "UPDATE users SET tipousuario=1 WHERE idUser='$id' ";

    $run = mysqli_query($conn,$query) or die(mysqli_error($conn));

    if($run) {
        echo " Compra realizada";
        header( "refresh:2;url=../userlogin/login.php" );

    } else {
        echo 'La compra no se pudo realizar' ;
        header( "refresh:2;url=../index.php" );

    }

} else {
    echo " Pone todo los datos.";
    header( "refresh:1;url=../index.php" );
}


}




?>

