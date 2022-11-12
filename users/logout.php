<?php
include "../lib/dbconn.php";
session_start();

echo $_REQUEST['logout'];

if (isset($_GET['logout'])) {


  session_destroy();
  unset($_SESSION);
  header("Location:../vista/index.html");


}



?>