<html>
    <body>
    <form method=post action=<?php echo "$_SERVER[PHP_SELF]"?>>
        <input name="num" type="number">
        <input type="submit" name="ok" value="Enviar">
    </form>
    <?php
        if(isset($_POST['ok'])){
            $array9 = array();
            for($i=0;$i<=$_POST['num'];$i++){
                $array9[$i]=rand(1,30);
            }
            rsort($array9);
            
            foreach($array9 as $clave=>$valor){
                echo "$clave....$valor<br>";
            }
            echo "Menor a mayor<br>";
            sort($array9);
            foreach($array9 as $clave=>$valor){
                echo "$clave....$valor<br>";
            }
        }

    ?>
    </body>
</html>