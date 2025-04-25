<?php

// En el login tengo que:
//  - buscar si existe el username
//  - si existe comprobar si la contraseña es correcta

global $database;
require_once("./conexion.php");





function getRegistro($db, $query){
    return ($db->query($query))->fetch_assoc();
}
function getRegistros($db, $query){
    $datos = $db->query($query);
    $registros = [];
    while($fila = $datos->fetch_assoc()){
        $registros[] = $fila;
    }
    return $registros;
}



//$usuario = getRegistro($database, "SELECT * FROM usuarios WHERE usuario='$usuario'");
//echo "ID: " . $usuario['id'] . "<br>" . "USER: " . $usuario['usuario'] . "<br>" . "PASS: $password" . $usuario['contrasenia'] . "<br>" . "<br>";


$usuarios = getRegistros($database,"SELECT * FROM usuarios");

foreach($usuarios as $user){
    $id = $user["id"];
    $usuario = $user["usuario"];
    $password = $user["contrasenia"];

    echo "ID: $id" . "<br>" . "USER: $usuario" . "<br>" . "PASS: $password" . "<br>";
}



// DATOS OBTENIDOS DEL FORMULARIO DE LOGIN
$username = $_POST["usuario"];
$pass = $_POST["password"];