<?php
session_start();
require_once('../lib/config.php');


$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE email = ? AND password = ? LIMIT 1";
$stmtselect  = $db->prepare($sql);
$result = $stmtselect->execute([$username, $password]);

if ($result) {
	$user = $stmtselect->fetch(PDO::FETCH_ASSOC);
	if ($stmtselect->rowCount() > 0) {
		$_SESSION['userlogin'] = $user;
		$_SESSION['userid'] = $user['idUser'];
		echo 'Ingresado correctamente';
	} else {
		echo 'No hay usuarios que coincidan con los datos ingresados';
	}
} else {
	echo 'Hay errores al conectarse con la base de datos';
}
