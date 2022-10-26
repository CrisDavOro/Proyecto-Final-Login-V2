<?php
    Session_start();
    /* include("dbParametros.inc"); */
    include("database.php");

    $login = $_POST['nombre'];
    $contraseña = $_POST['password'];
    
    function autenticacion($log,$pas){
        /* include("dbParametros.inc"); */
        include("database.php");
        
        $aceptado;

        $dsn = "mysql:host=$server;dbname=$database";
        $dbh = new PDO($dsn, $username, $password);

        $sql="select * from usuarios1 where nombre=:nombre";

        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':nombre', $log);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        $fila = $stmt->fetch();

        if(/* password_verify($fila['contrasenia'], $pas) && */ $fila['nombre'] == $log) {
            $aceptado = true;
            $_SESSION['rol'] = $fila['fk_rol'];
        }
        else {
            $aceptado =  false;
        }
        $dbh = null;

        return $aceptado;
    }

    if (!isset($_SESSION['idSesion'])) {
        if(!autenticacion($login,$contraseña)){
            /* header('Location:../login/InicioSesion.php'); */
            header('Location:../login/Registro.php');
            exit();
        }
        $_SESSION['idSesion'] = session_create_id();
        $_SESSION['login'] = $login;
    }
    header('Location:../index.php');
?>