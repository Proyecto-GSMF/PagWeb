<?php
include "../db/dbconn.php"; 


if(isset($_POST['submit'])) {
    $deporte = $_POST['deporte'];
	$nombre = $_POST['nombre'];
    $id = $_POST['id'];

    if($_POST['deporte'] != '') {
        $queryD = "UPDATE equipos SET idDeporte='$deporte' WHERE idEquipo='$id' ";
        $runA = mysqli_query($conn,$queryD) ;
    }

    if($_POST['nombre'] != '') {
        $queryN = "UPDATE equipos SET nEquipo='$nombre' WHERE idEquipo='$id' ";
        $runA = mysqli_query($conn,$queryN) ;
    }





if(isset($_POST['numPlay2'])) {
   # $queryB = "UPDATE evento SET idDeporte='$deporte',nEvento='$nombre',lugar='$lugar',estado= WHERE idEvento='$id' ";
   # $runB = mysqli_query($conn,$queryB) or die(mysqli_error($conn));

    $x = $_POST['numPlay2'] ;
    $i = 0;

    for ($i = 0; $i < $x; $i++ ) {
            

   
        $aa = 'miembro'.$i;
		$miembro = $_POST[$aa];

        echo $miembro;

		$query2 = "INSERT into jugadores_equipo (idJugador,idEquipo) values('$miembro','$id')" ;
        
        $run2 = mysqli_query($conn,$query2) or die(mysqli_error($conn));
       

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

    
    if($_POST['my_image'] != '') {


        echo "<pre>";
        print_r($_FILES['my_image']);
        echo "</pre>";
    
        $img_name = $_FILES['my_image']['name'];
        $img_size = $_FILES['my_image']['size'];
        $tmp_name = $_FILES['my_image']['tmp_name'];
        $error = $_FILES['my_image']['error'];
    
    
    
        if ($error === 0) {
            if ($img_size > 99999999) {
                $em = "Peso excedido.";
                header("Location: index.php?error=$em");
            }else {
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);
    
                $allowed_exs = array("jpg", "jpeg", "png"); 
    
                if (in_array($img_ex_lc, $allowed_exs)) {
                    $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                    $img_upload_path = '../../assets/teamimgs/'.$new_img_name;
                    move_uploaded_file($tmp_name, $img_upload_path);
    
    
                    $sqlAA = "UPDATE equipos SET teamimg='$new_img_name' WHERE idEquipo = $id";
                    mysqli_query($conn, $sqlAA);
            
                    header("location:../equipos.php?id=$id&mensaje=hecho");
                    //header( "refresh:2;url=../ads.php" );
                }else {
                    header("location:../equipos.php?id=$id&mensaje=error");
          
                    //header("refresh:2;url=../ads.php");
                }
            }
        }
    }


    }
    else {
        echo " Ingresa todos los datos";
       header( "refresh:2;url=../eventos.php" );
    }
}
