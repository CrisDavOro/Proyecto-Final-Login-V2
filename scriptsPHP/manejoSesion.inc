<?php 
    Session_start();

    //Session_destroy();
        
    If(!isset($_SESSION['user_id'])) {
        header('Location:./login/InicioSesion.php');
        exit();
    }
?>