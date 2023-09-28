<html>
    <head>
        <meta content="text/html; charset=ISO-8859-1" http-equiv="content-type">
        <title>Ejercicio 5.2</title>
    </head>
    <body>
            
        <?php 
            include("ejer3.datos.php"); //Trae el codigo del archivo indicado
            include("ejer3.vista.php");
           
            if(isset($_POST["ok_lang"])){
                form_cambio($_POST["idiomas"]);
            }else {
                form_cambio();
            }
            var_dump($_POST);
            cambio_moneda($_POST);

            function cambio_moneda($p){
                /*Para evitar warnings al principio ya que no tenemosel array _POST 
                debemos comprobar si se ha pulsado el boton enviar antes de utilizar los datos*/
                if(isset($p['ok'])){//Si esa variable existe
                  
                    $conv=$p['conv'];
                    $cantidad=$p['cantidad'];
                    $peseta=$cantidad*VALORES[$conv];
                    
                  
                    printf(IDIOMAS[$p["oculto"]]["msg"],$cantidad,plurales($conv),$peseta);
                }
            }
        ?>
    </body>
</html>