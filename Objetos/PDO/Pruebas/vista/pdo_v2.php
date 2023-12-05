<?php
    include("modelo/gesventas.inc.php");
    /*Ejemplo para conectar a BBDD mediante PDO */
    /*Extraer datos de conexion a un archivo de configuracion*/
    $connString = "mysql:host=".HOST.";dbname=".DBNAME."; charset=".CHARSET;
    $con = new PDO($connString,USER,PWD);
    //Configurar el modo de tratamiento de errores mediante excepciones
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Conectado";

    
?>