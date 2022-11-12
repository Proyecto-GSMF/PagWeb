<?php



session_start();

if (isset($_SESSION['userlogin'])) {
 
    

    print_r(json_encode($_SESSION['userlogin']));



} 



?>