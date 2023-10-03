<?php
    include("Ejer1_datos.php");
    include("Ejer1_vista.php");
    formulario();

    if(isset($_POST['ok'])){//Si esa variable existe
        validar_form($_POST);
        //echo validateDate('15-02-2000');
    }

?>