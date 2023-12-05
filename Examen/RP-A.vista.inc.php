<?php
    define("TIPOS", array("jpg", "png", "bmp", "gif", "jfif"));
    define("IDIOMAS", array("es"=>array("id"=> "Español","titulo"=>"GESTOR de IMÁGENES","lista"=>"Lista tipos archivos","nombre"=>"Nombre","msg"=>"El total de imagenes de"),
                            "en"=>array("id"=> "English","titulo"=>"IMAGE MANAGER","lista"=>"List of file types","nombre"=>"Name","msg"=>"The total number of images of")));
    define("N","\n");
    define("BR","<br>");

    function generarFormIdiomas($lang = "es"){
        $f="<h1>".IDIOMAS[$lang]["titulo"]."</h1>".N;
        $f.="<form method=post action=".$_SERVER['PHP_SELF'].">".N;
        $f.= lista_lang("idiomas");
        $f.="<input type=\"submit\" name=\"ok_lang\" value=\"Traducir\">".N;
        $f.="</form>";
        echo $f;
    }//Genera el formulario con los idiomas

    function lista_lang($name){
        $f="<select name = '$name'>";
        foreach(IDIOMAS as $k => $v){
            $f.="<option value=$k>".$v['id']."</option>".N;
        }
        $f.="</select>";
        return $f;
    }//Lista de idiomas

    function lista_img(){
        $r="";
        foreach(TIPOS as $k => $v){
            $r.="<input type='radio' name='radio' value=$v";
            if($v === TIPOS[array_key_first(TIPOS)]){
                $r.=" checked";
            }
            $r.=">".N;
            $r.="<label>$v</label>".N.BR;
        }
        return $r;
    }//Lista de tipos de imgs

    function generarFormImg($lang = "es"){
        $f="<div style='float:left'>";
        $f.="<form method=post action=".$_SERVER['PHP_SELF'].">".N;
        $f.="<label>".IDIOMAS[$lang]["lista"]."</label>".BR.N;
        $f.= lista_img();
        $f.="<label>".IDIOMAS[$lang]["nombre"]."</label>".BR.N;
        $f.="<input type='text' name='nombre'>".N;
        $f.="<input type=\"submit\" name=\"ok_img\" value=\"RP-A\">".N;
        $f.="</form>";
        $f.="</div>";
        echo $f;
    }//Generacion de formulario de tipos de img

    function contarImg($tipo,$lang){
        $ruta = "RP-A"; // Carpeta de imagenes
        $cont=0;
        $img="";
        if ($gestor = opendir($ruta)) {

        
            /* Esta es la forma correcta de iterar sobre el directorio. */
            while (false !== ($archivo = readdir($gestor))) {
                if ($archivo!="." && $archivo!="..")//Si el archivo es el padre
                {
                    if(preg_match("/.\.$tipo/",$archivo)){
                        $img="<img src='$ruta/$archivo' width=100 height=100></a>";
                        $cont+=1;
                    }
                }
            }
        
           closedir($gestor);
        }
        $dch="<div style='float:right'>".N;
        $dch .="<p>".IDIOMAS[$lang]["msg"]." ".$tipo.":". $cont."<p>".N.BR;
        $dch .= $img.N;
        $dch .= "</div>";
        echo $dch;
    }//Funcion que cuenta las imaganes del tipo que se le pasa e saca la ultima imagen
?>