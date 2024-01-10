<?php

    class vista{
        
        function mostrarTablaProds($prods){
            $t="<table>".N;     
            $t.="<thead>".N;
            $keys = array_keys($prods[array_key_first($prods)]);
    
            foreach($keys as $k => $v){
                $t.="<th>".LANG[$_COOKIE["idioma"]]["titulos"][$v]."</th>";      
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

        function formIdiomas(){
            $f="<div style=float:left;>";
            $f.="<form method=post action=".$_SERVER['PHP_SELF'].">\n";
            $f.="<label>".LANG[$_COOKIE["idioma"]]["seleIdio"]."</label>";
            $f.="<select name='idiomaSelec' >\n";
            foreach(IDIOMAS as $k => $v){
                
                $f.="<option value='$k' ";
                if($k == $_COOKIE["idioma"]){
                    $f.="selected";
                }
                $f.=">$v</option>\n";
            }
            $f.="</select>\n";
            $f.="<input type='submit' name='okIdioma' value='".LANG[$_COOKIE["idioma"]]["trad"]."'>\n";
            $f.="</form>\n";
            $f.="</div>";
            return $f;
        }

        function cabecera(){
            $f="<h1>".LANG[$_COOKIE["idioma"]]["tit1"]."</h1>";
            $f.=$this->formIdiomas();
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
            $f.="<label for='idusr'>".LANG[$_COOKIE["idioma"]]["user"]."</label>\n";
            $f.="<input type='text' id='idusr' name='usr'>\n";
            $f.="<label for='idpass'>".LANG[$_COOKIE["idioma"]]["pass"]."</label>\n";
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
                    
                    $f.="name='$campos[Field]' placeholder=".LANG[$_COOKIE["idioma"]]["titulos"][$campos['Field']]."><br>\n";
                }
            }
            $f.="<br><input type='submit' name='okFiltar' value='".LANG[$_COOKIE["idioma"]]["botFil"]."'>\n";
            $f.="</form>\n";
            echo $f;
        }
    }
?>