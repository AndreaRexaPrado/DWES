<?php
    /*Ejemplo para conectar a BBDD mediante PDO */

    $connString = "mysql:host=localhost:3308;dbname=gesventa; charset=utf8";
    $con = new PDO($connString,"root","1234");
    //Configurar el modo de tratamiento de errores mediante excepciones
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Conectado";

    
?>