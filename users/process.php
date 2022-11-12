<?php
require_once('../lib/config.php');
?>
<?php

if(isset($_POST)){

	$email 			= $_POST['email'];
	
	$password 		= $_POST['password'];

	$tipousuario 	= 0;

		$sql = "INSERT INTO users (email,password,tipousuario ) VALUES(?,?,?)";
		$stmtinsert = $db->prepare($sql);
		$result = $stmtinsert->execute([$email, $password, $tipousuario]);
		if($result){
			echo 'Guardado.';
		}else{
			echo 'Errores guardando los datos.';
		}
}else{
	echo 'No hay datos';
}