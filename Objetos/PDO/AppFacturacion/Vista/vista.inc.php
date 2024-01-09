<?php

    class vista{
        function ops_uds($max_uds,$id,$sel=0,$operacion="add"){
            $cont=$max_uds>MAXUDS ? MAXUDS: $max_uds;
            if($cont>0){
                $f="<form method=post action=".$_SERVER['PHP_SELF'].">\n";
                $f.="<select name='selUds'>";
                $f.="<option value='0'>0</option>";
                for($i=1;$i<=$cont;$i++){
                    $f.="<option value='$i'";
                    if($i == $sel){
                        $f.=" selected";
                    }
                    $f.=">$i</option>";

                }
                $f.="</select>";
                if($operacion=="add"){
                    $f.="<input type='submit' name='btnUds[".$id."]' value='Añadir'>";
                }else{
                    $f.="<input type='submit' name='btnEdit[".$id."]' value='Edit'>";
                    $f.="<input type='submit' name='btnDel[".$id."]' value='Del'>";
                }
                
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
        
        function mostrarCarrito($prods){
            if(empty($_SESSION['carr'])){   
                echo "<h3>No se han encontrado productos en el carrito<br><a href=".$_SERVER['PHP_SELF'].">Continuar</a></h3>";
                unset($_SESSION['incarr']);
            }else{           
                
              
                $t="<table>".N;     
                $t.="<thead>".N;
             
                $keys = array_keys($prods[array_key_first($prods)]);
        
                foreach($keys as $k => $v){
                    
                    $t.="<th>".TITULOSCARRITO[$v]."</th>";      
                    
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
                        $t.="<td>".$this->ops_uds($v['existencias'],$v['cod'],$_SESSION['carr'][$v['cod']],"carr")."<td>";
                        $t.="</tr>".N;  
                
                }

                $t.="</tbody>".N;
                $t.="</table>".N;
                $t.="<form method=post action=".$_SERVER['PHP_SELF'].">\n";
                $t.="<input type='submit' name='btnTramitar' value='Tramitar pedido'>";
                $t.="<input type='submit' name='btnRegresar' value='Regresar'>";
                $t.="<form>";
                echo $t;
            }  
        
        }
        
        function factura($prods){
            if(empty($_SESSION['carr'])){   
                echo "<h3>No se han encontrado productos en el carrito<br><a href=".$_SERVER['PHP_SELF'].">Continuar</a></h3>";
                unset($_SESSION['incarr']);
            }else{           
                
              
                $t="<table>".N;     
                $t.="<thead>".N;
             
                $keys = array_keys($prods[array_key_first($prods)]);
                print_r($keys);
                foreach($keys as $k => $v){
                    if(!$v="existencias"){
                        $t.="<th>".TITULOSCARRITO[$v]."</th>";   
                    }             
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

                        $t.="</tr>".N;  
                
                }

                $t.="</tbody>".N;
                $t.="</table>".N;
                $t.="<form method=post action=".$_SERVER['PHP_SELF'].">\n";
                $t.="<input type='submit' name='btnTramitar' value='Tramitar pedido'>";
                $t.="<form>";
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
            $f.="<div style=float:right;>";
            $f.="<form method=post action=".$_SERVER['PHP_SELF'].">\n";
            $f.="<input name='btnLogIn' type='submit' value='Log in' class='button'>";
            $f.="<input name='btnLogOut' type='submit' value='Log out' class='button'>";
            $f.="<input name='btnCart' type='submit' value='Carrito' class='button'>";
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