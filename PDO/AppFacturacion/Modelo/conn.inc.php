<?php
//Clase para la conexion

    include("gesventas.inc.php");

    class Conn{
        //Atributos
        private $host = HOST;
        private $db = DBNAME;
        private $chrset = CHARSET;
        private $user = USER;
        private $pwd = PWD;

        //devuelve una sola conexion: utilizamos el patron Singleton
        private static $conn; //instancia PDO, static pertenece a la clase no se invoca por instancias si no por la clase

        function getConn(){
            $connStr= "mysql:host=".$this->host.";dbname=".$this->db."; charset=".$this->chrset;
            
            try{
                //conn es un atributo de clase, no de instancia se invoca desde el nombre de la clse con :: en lugar de ->
                Conn::$conn = new PDO($connStr,$this->user,$this->pwd);

                /**
                 * Configuramos la conexion para que lance excepciones cuando ocurra algun error
                 */
                Conn::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }catch (PDOException $e){
                die("<br> ERROR ".$e->getMessage());
            }
            return Conn::$conn;
        }

        function closeConn(){
  

            Conn::$conn= null;
        }
    }

?>