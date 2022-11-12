<?php
include "../db/dbconn.php"; 


if(isset($_POST['submit'])) {

    

    
    $idEv= $_POST['idEv'];
    $id = $_POST['id'];
    $nArb = $_POST['nArb'];
    $estado = $_POST['estado'];
    $deporte = $_POST['deporte'];
	$nombre = $_POST['nombre'];
    $lugar = $_POST['lugar'];
    echo $id;


    if($_POST['idEv'] != '') {

        echo "INSERT into evento_partido (idEvento,idPartido) values('$idEv','$id')";

    $queryJ = "INSERT into evento_partido (idEvento,idPartido) values('$idEv','$id')";
    $runJ = mysqli_query($conn,$queryJ) or die(mysqli_error($conn));
   
    echo 2;

    }


    $queryB = "UPDATE partido SET idDeporte='$deporte', nPartido='$nombre', nArbitro='$nArb', lugar='$lugar', estado='$estado' WHERE idPartido=$id ";
    $runB = mysqli_query($conn,$queryB) or die(mysqli_error($conn));

   echo 3;


    if($_POST['numPlay'] != '') {

        $x = $_POST['numPlay'] ;
        $i = 0;

    
        for ($i = 0; $i < $x; $i++ ) {
             
    
       
            $aa = 'team'.$i;
            $equipo = $_POST[$aa];
    
            echo '---------'.$equipo;
    
            $query2 = "INSERT into equipo_partido (idEquipo,idPartido) values($equipo,$id) " ;
         
           
         
            
            $run2 = mysqli_query($conn,$query2) or die(mysqli_error($conn));
         
    
            if($run2) {
                echo " Evento agregado";
                header("location:editarpartido.php?id=$id&mensaje=hecho");
        
            } else {
          
             header("location:editarpartido.php?id=$id&mensaje=error");
              
            }
    
        } 
    
    
        }
    
        if(isset($_POST['numPlay2'])) {
    
            $x = $_POST['numPlay2'] ;
            $i = 0;
        
     
        
        
            for ($i = 0; $i < $x; $i++ ) {
                 
        
           
                $aa = 'ind'.$i;
                $ind = $_POST[$aa];
    
                echo '<br>';
        
                echo '<h1>'.$ind.'</h1>';
        
                $query3 = "INSERT into jugador_partido (idJugador,idPartido) values($ind,$id) " ;
               
             
                
                $run3 = mysqli_query($conn,$query3) ;
    
    
                if($run3) {
                    echo " Evento agregado";
                    header("location:editarpartido.php?id=$id&mensaje=hecho");
            
                } else {
                   
            header("location:editarpartido.php?id=$id&mensaje=error");
                    
                }
        
            } 
        
      
        
            }
        else {
    
           header("location:editarpartido.php?id=$id&mensaje=error");
           // header( "refresh:2;url=../eventos.php" );
        }
    }
    
    
    