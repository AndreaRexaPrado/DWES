<?php

    function formulario(){
        $f="<form method=post action=".$_SERVER['PHP_SELF'].">\n";
        $f.="<table>";
        foreach(CAMPOSFORM as $k=>$v){
            $f.="<tr>";
            $f.="<td><label for=\"i$k\">".$v['pal']."</label></td>\n";
            if($k!='pwd'){
                $f.="<td><input type=\"text\" id =\"i$k\" name=\"$k\" size=\"".$v['size']."\"></td>\n";
            }else{
                $f.="<td><input type=\"text\" id =\"i$k\" name=\"$k\" size=\"".$v['size']."\"></td>\n";
            }
            $f.="<tr>";
        }
        $f.="</table>";
        $f.="<input type=\"submit\" name=\"ok\" value=\"Validar\">\n";
        $f.="</form>";
        echo $f;
    }

    function validar_form($p){
        //var_dump($p);
        $boolMsg=true;
        foreach(CAMPOSFORM as $k=>$v){
            if(empty($p[$k])){
                printf("<h1 style=\"color:red;\">ERROR: El campo %s debe estar relleno</h1>",$v['pal']);
                $boolMsg=false;
            }else{
                //echo $v['patron'] .".....".$p[$k]."<br>";
                if($k === 'fecNac'){
                    $arrFech = explode("-",$p[$k]);
                    //print_r($arrFech);
                    if(!checkdate($arrFech[1],$arrFech[0],$arrFech[2])){
                        printf("<h1 style=\"color:red;\">ERROR: El campo %s debe tener el patron: %s</h1>",$v['pal'],$v['patronUser']);
                        $boolMsg=false;
                        //break;
                    }
                }else{
                    if(!preg_match($v['patron'],$p[$k])){
                        //echo $v['patron'] .".....".$p[$k];
                        printf("<h1 style=\"color:red;\">ERROR: El campo %s debe tener el patron: %s</h1>",$v['pal'],$v['patronUser']);
                        $boolMsg=false;
                        //break;
                    }
                }
            }
        }
        if($boolMsg){
            echo "<h1 style=\"color:green;\">TODO CORRECTO BIENVENIDE</h1>";
        }


    }

    function validateDate($date, $format = 'd-m-Y')
    {
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) == $date;
    }
?>