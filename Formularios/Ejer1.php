<?php
    $camposForm = array("Nombre"=> "","Apellido"=> "","DNI"=> "[0-9]{0,8}[TRWAGMYFPDXBNJZSQVHJCKE]",
                        "Correo"=> "@educa.madrid.org","Fecha Nacimiento"=> "dd-MM-yyyy","Telefono Fijo"=> "",
                        "Telefono Movil"=> "","Contraseña"=> "");

    function formulario($a){
        $f="<form method=post action=".$_SERVER['PHP_SELF'].">\n";
        $f.="<table>";
        foreach($a as $k=>$v){
            $f.="<tr>";
            $f.="<td><label for=\"i$k\">$k</label></td>\n";
            $f.="<td><input type=\"text\" id =\"i$k\" name=\"$k\" ></td>\n";
            $f.="<tr>";
        }
        $f.="</table>";
        $f.="<input type=\"submit\" name=\"ok\" value=\"Validar\">\n";
        $f.="</form>";
        echo $f;
    }

    formulario($camposForm);
    var_dump($_POST);
?>