<html>
    <body>
        <form method="post" action=<?php echo "$_SERVER[PHP_SELF]"?>>
        <label>Elige cuantos numero aleatorios quieres</label>
        <input type="number" name="cantidad">
        <input type="submit" name="ok" value="Enviar"><br>
        </form>
<?php
//EJERCICIO1
$array= array(rand(1,30), rand(1,30), rand(1,30), rand(1,30), rand(1,30), rand(1,30), rand(1,30), rand(1,30), rand(1,30), rand(1,30));
print_r($array);
echo "<br>";
//EJERCICIO2
$array2= array(rand(1,30), rand(1,30), rand(1,30), rand(1,30), rand(1,30), rand(1,30), rand(1,30), rand(1,30), rand(1,30), rand(1,30));
print_r($array2);
$suma = array_sum($array2);
$total= count($array2);
$media= $suma/$total;
echo "<br>";
echo "La media es $media";
echo "<br>";
//EJERCICIO3
$array3= array(rand(1,30), rand(1,30), rand(1,30), rand(1,30), rand(1,30), rand(1,30), rand(1,30), rand(1,30), rand(1,30), rand(1,30));
print_r($array3);
$maximo= max($array3);
echo "<br>";
echo "El valor máximo es $maximo";
echo "<br>";
//EJERCICIO4
$array4= array(rand(1,30), rand(1,30), rand(1,30), rand(1,30), rand(1,30), rand(1,30), rand(1,30), rand(1,30), rand(1,30), rand(1,30));
print_r($array4);
$minimo= min($array4);
echo "<br>";
echo "El valor minimo es $minimo";
echo "<br>";
//EJERCICIO5
$array5= array(rand(1,30), rand(1,30), rand(1,30), rand(1,30), rand(1,30), rand(1,30), rand(1,30), rand(1,30), rand(1,30), rand(1,30));
print_r($array5);
$maximo2= max($array5);
$minimo2= min($array5);
$suma2 = array_sum($array5);
$total2= count($array5);
$media2= $suma2/$total2;
echo "<br>";
echo "El valor medio es $media2";
echo "<br>";
echo "El valor máximo es $maximo2";
echo "<br>";
echo "El valor minimo es $minimo2";
echo "<br>";
//EJERCICIO6
$array6= array(rand(1,30), rand(1,30), rand(1,30), rand(1,30), rand(1,30), rand(1,30), rand(1,30), rand(1,30), rand(1,30), rand(1,30));
print_r($array6);
$total3= count($array6);
for ($i=0; $i < $total3; $i++) {
    $maximo3= max($array6);
    $minimo3= min($array6);
    $suma3 = array_sum($array6);
    $media3= $suma3/$total3;
}
echo "<br>";
echo "El valor medio es $media3";
echo "<br>";
echo "El valor máximo es $maximo3";
echo "<br>";
echo "El valor minimo es $minimo3";
echo "<br>";
//EJERCICIO7
$array7= array(rand(1,30), rand(1,30), rand(1,30), rand(1,30), rand(1,30), rand(1,30), rand(1,30), rand(1,30), rand(1,30), rand(1,30));
print_r($array7);
$total4= count($array7);
$contador=0;    
while ($contador < $total4 ) {
    $maximo4= max($array7);
    $minimo4= min($array7);
    $suma4 = array_sum($array7);
    $media4= $suma4/$total4;
    $contador++;
}
echo "<br>";
echo "El valor medio es $media4";
echo "<br>";
echo "El valor máximo es $maximo4";
echo "<br>";
echo "El valor minimo es $minimo4";
echo "<br>";
//EJERCICIO8

$array8= array(rand(1,30), rand(1,30), rand(1,30), rand(1,30), rand(1,30), rand(1,30), rand(1,30), rand(1,30), rand(1,30), rand(1,30));
print_r($array8);
$total5= count($array8);
$contador2=0;    
do {
    $maximo5= max($array8);
    $minimo5= min($array8);
    $suma5 = array_sum($array8);
    $media5= $suma5/$total5;
    $contador2++;

} while ($contador2 < $total5 );
echo "<br>";
echo "El valor medio es $media4";
echo "<br>";
echo "El valor máximo es $maximo4";
echo "<br>";
echo "El valor minimo es $minimo4";
echo "<br>";
//EJERCICIO9
$array9 = array();
 if(isset($_POST['ok'])){//Si esa variable existe
            $elementos= $_POST['cantidad'];
            for ($i=0; $i <= $elementos; $i++) {
               $array9[$i]=rand(1,30);
            }
            sort($array9);
            echo "La temperatura de menor a mayor es: ";
            foreach ($array9 as $clave=>$valor) {
            echo " $valor ";
            }
            echo "<br>";
            rsort($array9);
            echo "La temperatura de menor a mayor es: ";
            foreach ($array9 as $clave=>$valor) {
            echo "$valor ";
            }
            echo "<br>";
        }

//EJERCICIO10
$array10= array("Antonio"=>"31", "María"=>"28", "Juan"=>"29", "Pepe"=>"27");
asort($array10);
foreach ($array10 as $clave=>$valor) {
    echo "$clave...$valor ";
}
ksort($array10);
foreach ($array10 as $clave=>$valor) {
    echo "$clave...$valor ";
}
arsort($array10);
foreach ($array10 as $clave=>$valor) {
    echo "$clave...$valor ";
}
krsort($array10);
foreach ($array10 as $clave=>$valor) {
    echo "$clave...$valor ";
}
//EJERCICIO11
$array11=array("Italy"=>"Rome", "Luxembourg"=>"Luxembourg", "Belgium"=> "Brussels",
"Denmark"=>"Copenhagen", "Finland"=>"Helsinki", "France" => "Paris",
"Slovakia"=>"Bratislava", "Slovenia"=>"Ljubljana", "Germany" => "Berlin",
"Greece" => "Athens", "Ireland"=>"Dublin", "Netherlands"=>"Amsterdam",
"Portugal"=>"Lisbon", "Spain"=>"Madrid", "Sweden"=>"Stockholm", "United
Kingdom"=>"London", "Cyprus"=>"Nicosia", "Lithuania"=>"Vilnius", "Czech
Republic"=>"Prague", "Estonia"=>"Tallin", "Hungary"=>"Budapest",
"Latvia"=>"Riga", "Malta"=>"Valetta", "Austria" => "Vienna",
"Poland"=>"Warsaw");
foreach ($array11 as $clave=>$valor) {
    $str = strtoupper($valor);
    $str2 = strtoupper($clave);
    echo "La capital de $str2 es $str ";
    echo "<br>";
}   
    $json = json_encode($array11);
    echo "Array a json $json";
//EJERCICIO12
?>
</body>
</html>
    