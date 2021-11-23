<?php
//ORIENTADO A OBJETOS
class DB {
    //Propiedades
    private $host;
    private $db;
    private $user;
    private $password;
    private $charset;
    //constructor, funcion que se ejecuta cuando creamos un nuevo objeto
    //y se inicializa automaticamente
    public function __construct(){
        $this->host = 'localhost';
        $this->db   = 'votaciones';
        $this->user = 'root';
        $this->password = 'root';
        $this->charset  = 'utf8mb4';
    }

    public function connect(){
        try{
            $conexion = "mysql:host=" . $this->host . ";dbname=" .  $this->db . ";charset=" . $this->charset;
            $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_EMULATE_PREPARES => false];

            $pdo = new PDO($conexion,  $this->user, $this->password, $options);

            return $pdo;
        }
        catch(PDOException $e){

            print_r("ERROR EN LA CONEXION".$e->getMessage());
        }
    }
}
?>