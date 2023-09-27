<html>
    <body>
        <?php
            function enlace($url = "www.php.net"){
                echo '<a href="'.$url.'">Pulsa aqui</a><br>';
            }
            enlace();
            
            enlace("www.google.es");
        ?>
    </body>
</html>