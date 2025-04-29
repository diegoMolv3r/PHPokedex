<?php class Database{
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $db = "pokedex";
    private $puerto = "3307";
    private $conexion;

    public function __construct(){
        $this->conexion = new mysqli($this->host, $this->user, $this->pass, $this->db, $this->puerto);
    }
    public function query($query){
        return $this->conexion->query($query);
    }
    public function close(){
        $this->conexion->close();
    }
    public function REGISTRAR_USUARIO_EN_LA_BD($username, $password){
        $this->conexion->query("INSERT INTO usuarios(usuario,contrasenia) VALUES ('$username', '$password')");
    }
    public function OBTENER_REGISTROS($query){
        return ($this->conexion->query($query));
    }
    public function CONVERTIR_QUERY_PARA_RECORRER($query){
        $datos = $this->OBTENER_REGISTROS($query);
        $registros = [];

        while ($fila = $datos->fetch_assoc()) {
            $registros[] = $fila;
        }

        return $registros;
    }
    public function BUSCAR_USUARIO_POR($tabla, $atributo, $valor){
        return ($this->conexion->query("SELECT * FROM $tabla WHERE $atributo = '$valor'"));
    }
    public function BOOLEAN_BUSCAR_USUARIO_POR($tabla, $atributo, $valor){
        return ($this->conexion->query("SELECT * FROM $tabla WHERE $atributo = '$valor'")->num_rows > 0);
    }
}