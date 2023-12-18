<?php

    class vista{
        function ops_uds($max_uds,$id){
            $cont=$max_uds>MAXUDS ? MAXUDS: $max_uds;
            if($cont>0){
                $f="<form method=post action=".$_SERVER['PHP_SELF'].">\n";
                $f.="<select name='selUds'>";
                $f.="<option value='0'>0</option>";
                for($i=1;$i<=$cont;$i++){
                    $f.="<option value='$i'>$i</option>";

                }
                $f.="</select>";
                $f.="<input type='submit' name='btnUds[".$id."]' value='Añadir'>";
                $f.="</form>";
                return $f;
            }else{
                return "No hay stock";
            }
            
        }
        function mostrarTablaProds($prods){
            if(empty($prods)){   
                echo "<h3>No se han encontrado productos con los flitros introducidos<br><a href=".$_SERVER['PHP_SELF'].">Continuar</a></h3>";
            }else{           
                
              
                $t="<table>".N;     
                $t.="<thead>".N;
                $keys = array_keys($prods[array_key_first($prods)]);
        
                foreach($keys as $k => $v){
                    $t.="<th>".TITULOS[$v]."</th>";      
                }
                $t.="<th>Unidades</th>";      
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
                    $t.="<td>".$this->ops_uds($v['existencias'],$v['cod'])."<td>";
                    $t.="</tr>".N;   
                }

                $t.="</tbody>".N;
                $t.="</table>".N;
                echo $t;
            }  
        
        }
        
        function idiomas(){
            $f="<div style='float:left;'>";
            $f.="<select name=''>";
            $f.="<option value='ES'>Español</option>";
            $f.="<option value='ES'>Ingles</option>";
            $f.="</select>";
            $f.="</div>";
            return $f;
        }

        function cabecera(){
            $f="<h1>BIENVENIDO A LA TIENDA</h1><br>";
            $f.= $this->idiomas();
            $f.="<div style='float:left; margin-left:50%;'>";
            $f.="<input name='btnCart' type='submit' value='Carrito'>";
            $f.="</div>";
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
                    $f.="<label>".TITULOS[$campos['Field']]."</laberl><br>";
                    $f.="<input type=";
                    if(substr($campos['Type'],0,3)==='var'){
                        $f.="'text'";
                    }else{
                        $f.="'number' min=0 ";
                    }
                    
                    $f.="name='$campos[Field]' placeholder=".TITULOS[$campos['Field']]."><br>\n";
                }
            }
            $f.="<br><input type='submit' name='okFiltar' value='Buscar'>\n";
            $f.="</form>\n";
            echo $f;
        }
    }
?>