<?php
    class VistaProductos{
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
                    
                    $t.="<td>".$vv."</td>";  
                    
                }
                $t.="</tr>".N;   
            }
            $t.="</tbody>".N;
            $t.="</table>".N;
            echo $t;
        
        }
    }
?>