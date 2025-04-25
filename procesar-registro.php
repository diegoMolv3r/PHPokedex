<?php

global $database; require_once("./conexion.php");

$username = $_POST["usuario"];
$pass = $_POST["password"];
$confirmarPass = $_POST["confirmarPassword"];


function validarPassword($password1, $password2) {
    return $password1 == $password2;
}



function agregarUsuario($db, $usuario, $contrasenia, $contraseniaAconfirmar) {
    if(validarPassword($contrasenia, $contraseniaAconfirmar  )){
        $db->query("INSERT INTO usuarios (usuario, password) VALUES ('$usuario', '$contrasenia')");
        return "Usuario registrado";
    }else{
        return "Las contrasenias no son iguales";
    }
}

echo agregarUsuario($database, $username, $pass, $confirmarPass);