<?php
    
    //funciones para generar vistas
    function form_cambio($datos){
        $f="<form method=post action=".$_SERVER['PHP_SELF'].">\n";
        $f.="Introduzca la cantidad a convertir: \n";
        $f.="<input type=\"text\" name=\"cantidad\" size=\"10\"><br>\n";
        $f.="Seleccione el tipo de conversion:<br>\n";
        //$f.= radio($datos,"conv");
        $f.= desplegable_monedas($datos,"conv");
        /*$f.="<input type=radio name=\"conv\" value=\"euro\" checked>Euro<br>";
        $f.="<input type=radio name=\"conv\" value=\"dolar\">Dolar<br>";*/
        $f.="<input type=\"submit\" name=\"ok\" value=\"Enviar\">\n";
        $f.="</form>";
        echo $f;
    }
    /*Funcion para generar dinamicamente los radio button
    se le pasa por paramentros un array, un nombre para el input 
    y el check si no hay otro por defecto estara seleccionado Dolar*/

    function radio($a,$name,$check="Dolar"){
        $f="";
        foreach($a as $k =>$v){
            $f.="<input type=radio name=\"$name\" value=\"$k\"";
            if($check === $k) $f.= " checked "; //si check coicide con la moneda que se pasa como argumento pondra el checked

            $f.=">".plurales($k)."<br>\n";           
        }
        return $f;
    }
    /*Funcion para generar dinamicamente una lista desplegable
    se le pasa por paramentros un array, un nombre para el select 
    y el selected si no hay otro por defecto estara seleccionado Dolar*/
    function desplegable_monedas($a,$name,$selected="Dolar"){
        $f="<select name = $name>";
        foreach($a as $k =>$v){
            $f.="<option value=\"$k\"";
            if($selected === $k) $f.= " selected ";

            $f.=">".plurales($k)."</option><br>\n";           
        }
        return $f;
    }
    
    //Funcion que pone el plurar a las palabras segun como terminen usando regex
    function plurales($singular){

        if(preg_match("/[aeiou]$/",$singular)){
            $singular .= "s";
        }elseif(preg_match("/[z]$/",$singular)){
            $singular[strlen($singular)-1]="c";
            $singular .= "es";
        }elseif(preg_match("/[s]$/",$singular)){
            $singular = "Los".$singular;
        }
        else{
            $singular .= "es"; 
        }
        
        return $singular;
    }
?>