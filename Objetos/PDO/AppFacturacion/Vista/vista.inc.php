<?php

    class vista{
        
        function mostrarTablaProds($prods){
            $t="<table border='1'>".N;     
            $t.="<thead>".N;
            $keys = array_keys($prods[array_key_first($prods)]);
    
            foreach($keys as $k => $v){
                $t.="<th>".TITULOS[$v]."</th>";      
            }
            $t.="</thead>".N;
            $t.="<tbody>".N;
            foreach($prods as $k => $v){
                $t.="<tr>".N;
                foreach($v as $kv => $vv){
                    
                      
                    if($kv==="imagen"){
                        $t.="<td><img src='../Img/$vv' alt='$vv' width ='100' height='100'></td>";
                    }else{
                        $t.="<td>".$vv."</td>"; 
                    }
                }
                $t.="</tr>".N;   
            }
            $t.="</tbody>".N;
            $t.="</table>".N;
            echo $t;
        
        }

        function cabecera(){
            $f="<h1>BIENVENIDO A LA TIENDA</h1>";
            $f.="<div style=float:right;>";
            $f.="<form method=post action=".$_SERVER['PHP_SELF'].">\n";
            $f.="<input name='btnLogIn' type='submit' value='Log in'>";
            $f.="<input name='btnLogOut' type='submit' value='Log out'>";
            $f.="</form>";
            $f.="</div>";
            echo $f;
        }

        function formLogin(){
            
            $f="<form method=post action=".$_SERVER['PHP_SELF'].">\n";
            $f.="<fieldset>\n";
            $f.="<legend >Login</legend>\n";
            $f.="<label for='idusr'>Usuario</label>\n";
            $f.="<input type='text' id='idusr' name='usr'>\n";
            $f.="<label for='idpass'>Contraseña</label>\n";
            $f.="<input type='password' id='idpass' name='pass' >\n";
            $f.="<input type='submit' name='okLogin' value='Log'>\n";
            $f.="</fieldset>\n";
            $f.="</form>\n";
            echo $f;
        }

        function formFiltros($filtros){
            
            $f="<form method=post action=".$_SERVER['PHP_SELF'].">\n";
            
            foreach($filtros as $campos){
                if($campos['Field'] !='imagen'){
                    $f.="<input type=";
                    if(substr($campos['Type'],0,3)==='var'){
                        $f.="'text'";
                    }else{
                        $f.="'number' min=0 ";
                    }
                    
                    $f.="name='$campos[Field]' placeholder=".TITULOS[$campos['Field']].">\n";
                }
            }
            $f.="<br><input type='submit' name='okFiltar' value='Buscar'>\n";
            $f.="</form>\n";
            echo $f;
        }
    }
?>