<html>
    <body>
        <?php
            /*
            En php cualquier variabale puede ser tratada como boolean,
            */
            define("BR","<br>\n"); //Costantes
            
            echo "Esto es".BR." un salto de linea";   
            $v0=0;
            $v1 = 5;
            $s ="";
           
            if($v1) echo BR."$v1 es TRUE";
            if($v1===true) echo BR."$v1 es TRUE";

            if($v0) echo BR."$v0 es FALSE";
            if($v0!==true) echo BR."$v0 es FALSE";

            if(!$s) echo BR."String vacio $s es FALSE";
            $s= "ddasd";
            if($s) echo BR."String $s es TRUE";
            
            $a= array();
            if(!$a) BR."Array vacio es FALSE";
            $n= NULL;
            if(!$n) BR."NULL es FALSE";

            if($s == true) echo BR."Comparacion mal hecha";
        ?>
    </body>
</html>