<?php
session_start();
require_once("./Database.php"); $database = new Database();
require_once("Validador.php"); $validador = new Validador();

$valido = $validador->ValidarUsuario($_POST["usuario"], $_POST["password"], $_POST["confirmarPassword"]);

if($valido === true){
    $database->REGISTRAR_USUARIO_EN_LA_BD($_POST["usuario"], $_POST["password"]);
    header("location: vista-login.php");
    $_SESSION["error_registro"] = $valido;
} else {
    $_SESSION["error_registro"] = $valido;
    header("location: vista-registrarse.php");
    exit();
}