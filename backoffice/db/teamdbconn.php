<?php
include "dbconn.php"; 


if(isset($_POST['submit'])) {

	

    
if(isset($_POST['numPlay'])) {

    $deporte = $_POST['deporte'];
	$nombre = $_POST['nombre'];

    $x = $_POST['numPlay'] ;
    $i = 0;



	 $query3 = "INSERT into  equipos (idDeporte,nEquipo) values('$deporte','$nombre') ";
	 $run3 = mysqli_query($conn,$query3) or die(mysqli_error($conn));

	 $sql = "SELECT idEquipo FROM equipos where nEquipo = '$nombre' and idDeporte = '$deporte'";
	 $result = $conn->query($sql);

	 if ($result->num_rows > 0) {

	   while ($row = $result->fetch_assoc()) {
		 $id = $row['idEquipo'];
	   }

	 }


    for ($i = 0; $i < $x; $i++ ) {
            

   
        $aa = 'miembro'.$i;
		$miembro = $_POST[$aa];

        echo $miembro;

		$query2 = "INSERT into jugadores_equipo (idJugador,idEquipo) values('$miembro','$id')" ;
        
        $run2 = mysqli_query($conn,$query2) or die(mysqli_error($conn));
       
	

    

	} 

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
		
				header("location:../equipo/equipos.php?id=$id&mensaje=hecho");
				//header( "refresh:2;url=../ads.php" );
			}else {
				header("location:../equipo/equipos.php?id=$id&mensaje=error");
      
		        //header("refresh:2;url=../ads.php");
			}
		}
	}
	
	
	} else {
		header("location:../equipo/equipos.php?id=$id&mensaje=error");
      
		//header("refresh:222;url=../evento.php?");
	}
	
}