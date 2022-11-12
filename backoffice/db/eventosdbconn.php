<?php
include "dbconn.php"; 


if(isset($_POST['submit'])) {

 

    


    $deporte = $_POST['deporte'];
	$nombre = $_POST['nombre'];
    $lugar = $_POST['lugar'];

    $queryB = "INSERT into  evento (idDeporte,nEvento,Lugar) values('$deporte','$nombre','$lugar')";
    $runB = mysqli_query($conn,$queryB) or die(mysqli_error($conn));


    if(isset($_POST['numPlay'])) {

        $x = $_POST['numPlay'] ;
        $i = 0;
    
    
        
         $sql = "SELECT idEvento FROM evento where nEvento = '$nombre' ";
    
         $result = $conn->query($sql);
        
    
         if ($result->num_rows > 0) {
    
           while ($row = $result->fetch_assoc()) {
             $id = $row['idEvento'];
    
             echo $id.'1';
            
            
           }
    
         
         }
    
    
        for ($i = 0; $i < $x; $i++ ) {
             
    
       
            $aa = 'team'.$i;
            $equipo = $_POST[$aa];
    
            echo '---------'.$equipo;
    
            $query2 = "INSERT into evento_equipo (idEvento,idEquipo) values($id,$equipo) " ;
         
           
         
            
            $run2 = mysqli_query($conn,$query2) or die(mysqli_error($conn));
         
    
            if($run2) {
                echo " Evento agregado";
                header("location:../evento/eventos.php?id=$id&mensaje=hecho");
        
            } else {
          
                header("location:../evento/eventos.php?id=$id&mensaje=error");
                //header( "refresh:2;url=../eventos.php" );
            }
    
        } 
    
    
        }
    
        if(isset($_POST['numPlay2'])) {
    
            $x = $_POST['numPlay2'] ;
            $i = 0;
        
        
            
             $sql = "SELECT idEvento FROM evento where nEvento = '$nombre' ";
        
             $result = $conn->query($sql);
            
        
             if ($result->num_rows > 0) {
        
               while ($row = $result->fetch_assoc()) {
                 $id = $row['idEvento'];
        
                 echo $id.'2';
                
                
               }
        
             
             }
        
        
            for ($i = 0; $i < $x; $i++ ) {
                 
        
           
                $aa = 'ind'.$i;
                $ind = $_POST[$aa];
    
                echo '<br>';
        
                echo '<h1>'.$ind.'</h1>';
        
                $query3 = "INSERT into evento_jugador (idEvento,idJugador) values($id,$ind) " ;
               
             
                
                $run3 = mysqli_query($conn,$query3) ;
    
    
                if($run3) {
                    echo " Evento agregado";
                    header("location:../evento/eventos.php?id=$id&mensaje=hecho");
            
                } else {
                   
            header("location:../evento/eventos.php?id=$id&mensaje=error");
                    //header( "refresh:2;url=../eventos.php" );
                }
        
            } 
        
      
        
            }
    
        else {
    
            header("location:../evento/eventos.php?id=$id&mensaje=error");
           // header( "refresh:2;url=../eventos.php" );
        }
    }
    
    
    