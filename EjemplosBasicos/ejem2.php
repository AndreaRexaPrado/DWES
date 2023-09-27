<html>

<head>
  <title>ejercicio 4.2</title>
</head>

<body>
  <?php
  $n1 = 1;
  $n2 = 2;
  $suma = $n1 + $n2;
  echo "suma = " . $suma . "<br/>";
  echo "suma = $suma <br/>"; //comillas magicas: las variables simples se puede poner en echo y extraera su valor con $variable
  echo "$n1+$n2<br/>";
  echo "\$n1+\$n2<br/>";// con la barra se realiza el escape tal cual el caracter o cadena
  echo '$n1+$n2<br/>';
  echo "\"hola\"";
  echo phpinfo();
  ?>
</body>

</html>