<?php
   define("N","\n");
   define("BR","<br>");

   

    
    function generarForm(){
        $f="<h1>Gestion de alumnos</h1>".N;
        $f.="<ul>";   
        $f.="<li><form method=\"post\" action=".$_SERVER['PHP_SELF'].">".N;
        $f.="<button name='list'>Listado</button>".N;
        $f.="</form></li>".N;
        $f.="<li><form method=\"post\" action=".$_SERVER['PHP_SELF'].">".N;
        $f.="<button name='cons'>Consulta</button></li>".N;
        $f.="</form></li>".N;
        $f.="<li><form method=\"post\" action=".$_SERVER['PHP_SELF'].">".N;
        $f.="<button name='new'>Nuevo</button></li>".N;
        $f.="</form></li>".N;
        $f.="<li><form method=\"post\" action=".$_SERVER['PHP_SELF'].">".N;
        $f.="<button name='update'>Actualizar</button></li>".N;
        $f.="</form></li>".N;
        $f.="<li><form method=\"post\" action=".$_SERVER['PHP_SELF'].">".N;
        $f.="<button name='del'>Borrar</button></li>".N;
        $f.="</form></li>".N;
        $f.="</ul>".N;   

        echo $f;
    }

    function generarTabla($alumnos){
        $t=BR.BR.BR."<table border='1'>".N;
        $t.="<caption>Alumnos de dam y daw</caption>".N;       
        $t.="<thead>".N;

        $values = array("numexp");    
        $primero= $alumnos[array_key_first($alumnos)];
        foreach($primero as $k => $v){
            $values[] = $k;
        }

        foreach($values as $k => $v){
            $t.="<th>".TITULOS[$v]."</th>";
        }
        $t.="</thead>".N;
        $t.="<tbody>".N;

        foreach($alumnos as $k => $v){
            $t.="<tr>".N;
            $t.="<td>$k</td>".N;
            foreach($v as $c => $d){
                $t.="<td>$d</td>".N;
            }
   
            $t.="</tr>".N;
            
        }
        $t.="</tbody>".N;

        $t.="</table>".N;
        echo $t;
    }
    
    function generarDespegable($alumnos,$op){
        $numExp = array_keys($alumnos);
        $d=BR.BR.BR."<h3>Consulta de expedientes</h3>".N;
        $d.="<form method=\"post\" action=".$_SERVER['PHP_SELF'].">".N;
        $d.="<select name='exps'>".N;
        $al_ord=($alumnos);
        uasort($al_ord,'compararPorApe1');
        foreach($al_ord as $k => $v){

            $d.="<option value='$k'>".$v["ape1"]." ".$v["ape2"].",".$v['nombre']."</option>".N;
            
        }
        
        $d.="</select>";
        $d.="<input type=\"submit\" name=\"ok_$op\" value=\"Enviar\">".N;
        $d.="</form>".N;
        echo $d;
    }

    function generarTablaConsExp($alumno,$numExp){
        $t=BR.BR.BR."<table border='1'>".N;
        $t.="<caption>Expediente del alumno</caption>".N;       
        $t.="<thead>".N;

        $values = array("numexp");
        $keys = array_keys($alumno);

        foreach($keys as $k => $v){
            $values[] = $v;
        }

        foreach($values as $k => $v){
            $t.="<th>".TITULOS[$v]."</th>";
        }

        $t.="</thead>".N;
        $t.="<tbody>".N;
        $t.="<tr>".N;
        $t.="<td>$numExp</td>";
        foreach($alumno as $k => $v){
            
            $t.="<td>$v</td>".N;
          
            
        }
        $t.="</tr>".N;
        $t.="</tbody>".N;

        $t.="</table>".N;
        echo $t;
    }
    
    function generarFormNuevo(){
        
        $f=BR.BR.BR."<h3>Nuevo alumno</h3>".N;
        $f.="<form method=\"post\" action=".$_SERVER['PHP_SELF'].">".N;
        foreach(TITULOS as $k => $v){
            if($k !== "ciclo"&&$k !== "numexp"){
                
                if($k === "fnac"){
                    $f.="<label>$v</label><input type='date' name='$k'>".N.BR;
                }else{
                    $f.="<label>$v</label><input type='text' name='$k'>".N.BR;
                }
            }
            
        }
        $ciclos = getCiclos();
        $f.="<label>".TITULOS["ciclo"]."</label><select name='ciclo'>".N.BR;
        foreach($ciclos as $k => $v){
            $f.="<option value='$v'>$v</option>".N;
        }
        $f.="</select>".BR;
        $f.="<input type='submit'\"' name=\"ok_nuevo\" value=\"Enviar\">".N;
        $f.="</form>".N;
        echo $f;
    }

    function generarFormActualizar($al){
        
        $f=BR.BR.BR."<h3>Actualizar alumno</h3>".N;
        $f.="<form method=\"post\" action=".$_SERVER['PHP_SELF'].">".N;
        foreach(TITULOS as $k => $v){
            if($k !== "ciclo"&&$k !== "numexp"){
                
                if($k === "fnac"){
                    $valDate=date("Y-m-d",strtotime($al[$k]));
                    $f.="<label>$v</label><input type='date' name='$k' value='$valDate'>".N.BR;
                }else{
                    $f.="<label>$v</label><input type='text' name='$k' value='$al[$k]'>".N.BR;
                }
            }
            
        }
        $ciclos = getCiclos();
        $f.="<label>".TITULOS["ciclo"]."</label><select name='ciclo'>".N.BR;
        foreach($ciclos as $k => $v){
            if($al['ciclo'] == $v){
                $f.="<option value='$v' selected>$v</option>".N;
            }else{
                $f.="<option value='$v'>$v</option>".N;
            }
            
        }
        $f.="</select>".BR;
        $f.="<input type='submit'\"' name=\"ok_upd_form\" value=\"Enviar\">".N;
        $f.="</form>".N;
        echo $f;
    }

    function compararPorApe1($a, $b) {
        return strcmp($a['ape1'], $b['ape1']);
    }
?>
