<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
    <meta content="text/html; charset=ISO-8859-1" httpequiv="content-type">
    <title>ejercicio 4.8</title>
    </head>
    <body>
    <?php form_fotos()?>   
    <?php
        define("IMGS",array("jpg","png","bmp","gif"));
        $ruta = "../../img";
        $numcols=5;
        echo "<h1>Tabla de Fotos con Enlace</h1>";
        function validar($fotos){   
            $ext = substr($fotos,strrpos($fotos,'.')+1);
            //$ext= pathinfo($fotos, PATHINFO_EXTENSION);
            $p = "/";
            foreach(IMGS as $v) $p.="$v|";
            $p = substr($p,0,-1)."/";
            return preg_match($p,$ext);
            

        }
        
        /*function crea_tumbs($foto,$ruta)
        {
         
            if (!is_dir($ruta.'/thumb'))
                mkdir ($ruta.'/thumb', 0777);

            if (!is_file($ruta.'/thumb/MINI-'.$foto))
            echo $ruta.'/thumb/MINI-'.$foto;  
                system ("convert -sample 40x40 $ruta/$foto $ruta/thumb/MINI-$foto");
        }*/

        function form_fotos(){
            $f= "<form enctype='multipart/form-data' action=".$_SERVER['PHP_SELF'] ." method='post'>";
            $f.= "Enviar foto: <input name='foto' type='file'>";
            $f.= "<input type='submit' name='ok' value='Enviar'>";
            $f.="</form>";
            echo $f;

        }
        if(isset($_POST['ok'])){
        if (is_uploaded_file($_FILES['foto']['tmp_name'])) {
            print_r($_FILES);
          
            $nombre = "nueva".rand(0,100);
            print($nombre);
            $ext = substr($_FILES['foto']['name'],strrpos($_FILES['foto']['name'],'.')+1);
            copy($_FILES['foto']['tmp_name'], $ruta."/$nombre.".$ext);
           } else
            echo "Possible file upload attack. Filename: " .
           $_FILES['foto']['name']. "---".$_FILES['foto']['tmp_name'];
        }
        if ($gestor = opendir($ruta))
        {
            echo "<table border=1>";
            echo "<tr>";
        
        
            $puntero = opendir($ruta);
            $i=0;
            while (false !== ($archivo = readdir($gestor)))
            {
                if (validar($archivo))//Si el archivo es el padre
                {
                    //crea_tumbs($archivo,$ruta);
                    if ($i%$numcols==0) echo "<tr>";
                    
                    echo "<td>";
                    echo "<a href='$ruta/$archivo'><img src='$ruta/$archivo' width=100 height=100></a>";
                    echo "</td>";

                    if ($i%$numcols==$numcols) echo "</tr>";
                    
                    $i++;
                }
            }
            echo "</tr>";
            echo "</table>";
            closedir($gestor);
        }
    ?>
    </body>
</html>