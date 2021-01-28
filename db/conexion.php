
<?php


    class conectarDB {
        public $host="localhost";
        public $user="root";
        public $password="";
        public $database="proyecto_final_cac";
        public $conn;

        public function conectar(){
            $this->conn= new mysqli($this->host,$this->user,$this->password,$this->database);
            if(mysqli_connect_errno()){
                echo "ERROR AL REALIZAR LA CONEXION";
            }else{
                
                // echo "CONEXION REALIZADA CON EXITO";
                return $this->conn;
            }
        }
    };

    ?>




