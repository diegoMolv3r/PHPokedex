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
    $_SESSION['sessionStarted'] = true;

}

header("location: index.php");
exit();

//$administradores = $database->CONVERTIR_QUERY_PARA_RECORRER("SELECT * FROM usuarios WHERE es_admin = true");
//$es_admin= $validador->validarAdministrador($username, $pass, $administradores);
//
//if($es_admin){
//    header("location: vista-admin.php");
//}else{
//    header("location: index.php");
//}