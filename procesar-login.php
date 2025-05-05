<?php
require_once("./Database.php"); $database = new Database();
require_once("Validador.php"); $validador = new Validador();

session_start();

// DATOS OBTENIDOS DEL FORMULARIO DE LOGIN
$username = $_POST["usuario"];
$pass = $_POST["password"];

$id = $database->query("SELECT id FROM usuario WHERE usuario = '$username';")->fetch_assoc();
$id_usuario = $id['id'];

$_SESSION['usuario'] = $username;
$_SESSION['id_usuario'] = $id_usuario;

if(isset($_SESSION['usuario']) && isset($_SESSION['id_usuario'])){
    $usuarioExistente = $database->query("SELECT * FROM usuario WHERE usuario = '$username' AND contrasenia = '$pass';")->num_rows > 0;
}

if(isset($usuarioExistente) && $usuarioExistente){
    header("location: index.php");
    $_SESSION['sessionStarted'] = true;

}else{
    header("location: vista-login.php");
}

exit();