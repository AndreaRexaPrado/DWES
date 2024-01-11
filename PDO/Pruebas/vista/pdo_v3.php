<?php

    include("../modelo/productos_dao.inc.php");
    include("productos_vista.inc.php");
    /*Ejemplo para conectar a BBDD mediante PDO */
    /*Extraer datos de conexion a un archivo de configuracion*/
    /**
     * Utilizamos la clase Conn para conectar
     */
    $pdao= new ProductosDAO();
    echo "<h1>Tabla completa</h1>";
    mostrarTablaProds($pdao->getAll());

    echo "<h1>Tabla de 1</h1>";
    mostrarTablaProds($pdao->get(1));

?>