<?

    $ruta = "../../img";
    if ($gestor = opendir($ruta)) {
        echo "Gestor de directorio: $gestor\n";
        echo "Entradas:\n";
    
        /* Esta es la forma correcta de iterar sobre el directorio. */
        while (false !== ($entrada = readdir($gestor))) {
            echo "$entrada\n";
        }
    
        /* Esta es la forma errónea de iterar sobre el directorio. */
        while ($entrada = readdir($gestor)) {
            echo "$entrada\n";
        }
    
        closedir($gestor);
    }
?>