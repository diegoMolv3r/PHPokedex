<?php
class Validador{
    private $database;
    public function __construct(){$this->database = new Database();}
    function validarPassword($password1, $password2) {
        return $password1 == $password2;
    }
    public function validarUsuario($usuario, $password1, $password2){
        if(!isset($usuario) || !isset($password1) || !isset($password2)){
            return "Faltan datos";
        }
        if(!$this->validarPassword($password1, $password2)){
            return "Las contrasenias no coinciden";
        }
        if($this->database->BOOLEAN_BUSCAR_USUARIO_POR('usuarios', 'usuario', $usuario)){
            return "El usuario ya existe";
        }

        return true;
    }

    public function validarAdministrador($usuario, $password, $administradores){
        $esAdministrador = false;
        foreach ($administradores as $administrador) {
            $esAdministrador = ($usuario == $administrador["usuario"] && $password == $administrador["contrasenia"]);
        }
        return $esAdministrador;
    }


}