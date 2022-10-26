<?php

    /* $server = "b5rnwqvw3kc085he3nhy-mysql.services.clever-cloud.com";
    $username = "u82kigxocws1i7s9";
    $password = "wlRqD4EKQeTazR7tF48J";
    $database = "b5rnwqvw3kc085he3nhy"; */

    $server = "bceogwra7f82csc9lxtu-mysql.services.clever-cloud.com";
    $username = "ux3fb08otvqbp2jk";
    $password = "EiyBtnAVu1TMjT5ZinAB";
    $database = "bceogwra7f82csc9lxtu";

    try {
        $conn = new PDO ("mysql:host=$server;dbname=$database;",$username, $password);
    }
    catch (PDOException $e){
        die('Conección fallida: ' .$e->getMessage());
    }

?>