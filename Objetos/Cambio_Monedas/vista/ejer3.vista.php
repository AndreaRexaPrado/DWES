<?php
    
    class Vista{
        private $lang;

        //Constructor
        function __construct($lang="es"){

            $this->lang = $lang;
        }
        
        function get_lang(){
            return $this->lang;
        }

         function set_lang($lang){
            
             $this->lang = $lang;
        }

        //funciones para generar vistas
        function form_cambio(){
            
            $f="<form method=post action=".$_SERVER['PHP_SELF'].">\n";
            $f.=IDIOMAS[$this->lang]["select_lang"];
            $f.= $this->lista(IDIOMAS,"idiomas",$this->lang);
            $f.="<input type=\"submit\" name=\"ok_lang\" value=\"Enviar\">\n";
            $f.="</form>";

            $f.="<form method=post action=".$_SERVER['PHP_SELF'].">\n";     
            $f.= IDIOMAS[$this->lang]["intro_cant"];
            $f.="<input type=\"number\" name=\"cantidad\" value= 0 size=\"10\">\n";
            //$f.= radio($datos,"conv");
            $f.= $this->lista(VALORES,"conv");
            $f.="<input type=\"submit\" name=\"ok\" value=\"Enviar\">\n";
            $f.="</form>";
            echo $f;
        }

        /*Funcion para generar dinamicamente los radio button
        se le pasa por paramentros un array, un nombre para el input 
        y el check si no hay otro por defecto estara seleccionado Dolar*/
        function radio($a,$name,$check="Dolar"){
            $f="";
            foreach($a as $k =>$v){
                $f.="<input type=radio name=\"$name\" value=\"$k\"";
                if($check === $k) $f.= " checked "; //si check coicide con la moneda que se pasa como argumento pondra el checked

                $f.=">".$this->plurales($k)."<br>\n";           
            }
            return $f;
        }

        /*Funcion para generar dinamicamente una lista desplegable
        se le pasa por paramentros un array, un nombre para el select 
        y el selected si no hay otro por defecto estara seleccionado Dolar*/
        function lista($a,$name,$selected="Dolar"){
            //var_dump($a);
            $f="<select name = $name>";
            foreach($a as $k =>$v){
                $f.="<option value=\"$k\"";
                if($selected === $k) $f.= " selected ";
                
                if($name=="conv") $f.=">".$this->plurales($k);

                elseif($name=="idiomas") $f.=">".$v['name'];

                else $f .= ">".$k;
                $f.="</option><br>";           
            }
            return $f;
        }
        
        //Funcion que pone el plurar a las palabras segun como terminen usando regex
        function plurales($singular){

            if(preg_match("/[aeiou]$/",$singular)){
                $singular .= "s";
            }elseif(preg_match("/[z]$/",$singular)){
                $singular[strlen($singular)-1]="c";
                $singular .= "es";
            }elseif(preg_match("/[s]$/",$singular)){
                $singular = "Los".$singular;
            }
            else{
                $singular .= "es"; 
            }
            
            return $singular;
        }
        function imprimirResultado($cantidad,$conv,$peseta){
            printf(IDIOMAS[$this->lang]["msg"],$cantidad,$this->plurales($conv),$peseta);
        }
    }
?>