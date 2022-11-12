<?php
include "../db/dbconn.php"; 


if(isset($_POST['submit'])) {

 

    


    $deporte = $_POST['deporte'];
	$nombre = $_POST['nombre'];
    $lugar = $_POST['lugar'];
    $arbitro = $_POST['nArb'];

    $queryB = "INSERT into  partido (idDeporte,nPartido,nArbitro,lugar) values('$deporte','$nombre','$arbitro','$lugar')";
    $runB = mysqli_query($conn,$queryB) or die(mysqli_error($conn));


    if(isset($_POST['numPlay'])) {

    $x = $_POST['numPlay'] ;
    $i = 0;


	
	 $sql = "SELECT idPartido FROM partido where nPartido = '$nombre' ";

	 $result = $conn->query($sql);
    

	 if ($result->num_rows > 0) {

	   while ($row = $result->fetch_assoc()) {
		 $id = $row['idPartido'];

         echo $id.'1';
        
        
	   }

     
	 }


    for ($i = 0; $i < $x; $i++ ) {
         

   
        $aa = 'team'.$i;
		$equipo = $_POST[$aa];

        echo '---------'.$equipo;

		$query2 = "INSERT into equipo_partido (idEquipo,idPartido) values($equipo,$id) " ;
        $queryR = "INSERT into resultado (idEquipo,anotacion) values($equipo,0) " ;

        $sql2 ="SELECT MAX(idResultado) from resultado order by idResultado DESC";
        $result2 = $conn->query($sql2);
        $row2 = $result2->fetch_assoc();
        echo '<br>';
        echo $row2['MAX(idResultado)'];

        $idR = $row2['MAX(idResultado)'];

        $queryU ="INSERT into partido_resultado (idPartido,idResultado) values($id,$idR)";

        
        $run2 = mysqli_query($conn,$query2) or die(mysqli_error($conn));
        $runR = mysqli_query($conn,$queryR) or die(mysqli_error($conn));
        $runU = mysqli_query($conn,$queryU) or die(mysqli_error($conn));
     

        if($run2) {
            echo " Evento agregado";
           header("location:partido.php?id=$id&mensaje=hecho");
    
        } else {
      
             header("location:partido.php?id=$id&mensaje=error");
            //header( "refresh:2;url=../eventos.php" );
        }

	} 


    }

    if(isset($_POST['numPlay2'])) {

        $x = $_POST['numPlay2'] ;
        $i = 0;
    
    
        
         $sql = "SELECT idPartido FROM partido where nPartido = '$nombre' ";
    
         $result = $conn->query($sql);
        
    
         if ($result->num_rows > 0) {
    
           while ($row = $result->fetch_assoc()) {
             $id = $row['idPartido'];
    
             echo $id.'2';
            
            
           }
    
         
         }
    
    
        for ($i = 0; $i < $x; $i++ ) {
             
    
       
            $aa = 'ind'.$i;
            $ind = $_POST[$aa];

            echo '<br>';
    
            echo '<h1>'.$ind.'</h1>';
    
            $query3 = "INSERT into jugadores_partido (idJugador,idPartido) values($ind,$id) " ;
           
         
            
            $run3 = mysqli_query($conn,$query3) ;


            if($run3) {
                echo " Evento agregado";
                header("location:partido.php?id=$id&mensaje=hecho");
        
            } else {
               
        header("location:partido.php?id=$id&mensaje=error");
           
            }
    
        } 
    
  
    
        }

    else {

        header("location:partido.php?id=$id&mensaje=error");
       
    }
}



 


?>