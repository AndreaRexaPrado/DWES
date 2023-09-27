<html>
    <body>
        <?php
        $hora = date ("H", time());
                if($hora>20 || $hora<4)
                {
                    echo "<h1>Buenos noches</h1>";
                }else
                {
                    echo "<h1>Buenos dias</h1>";
                }
        print ( "<br/>".date("M d, Y H:i:s", time()));
        $var1='<br/>hola';
        $var2="$var1 mundo";
        echo $var2;
        ?>
    </body>
</html>