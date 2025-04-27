<?php
require_once("./Database.php"); $database = new Database();
require_once("Validador.php"); $validador = new Validador();

if($validador->ValidarUsuario($_POST["usuario"], $_POST["password"], $_POST["confirmarPassword"])){
    $database->REGISTRAR_USUARIO_EN_LA_BD($_POST["usuario"], $_POST["password"]);
    echo "Usuario registrado";
} else {
    echo $validador->ValidarUsuario($_POST["usuario"], $_POST["password"], $_POST["confirmarPassword"]);
}