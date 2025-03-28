<?php
// dados de login
    $host = "localhost";
    $user = "root";
    $password = "";
    $dbname = "devstore";
    try{
        //PHP DATA OBJECT
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password); //conection string
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE, PDO:ERRMODE_EXCEPTION);
    }catch(PDOException $e){
        die("Falha na conaxão: ".$e->getMessage());
    }
?>