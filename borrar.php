<?php
require_once("./Database.php");$database = new Database();

session_start();

$id = $_GET['id'];
$id_usuario = $_SESSION['id_usuario'];

if(isset($_SESSION['usuario']) && isset($_SESSION['id_usuario']) && isset($id)){
    $database->query("DELETE FROM usuario_pokemon WHERE id_usuario = '$id_usuario' AND id_pokemon = '$id';");
}

header("location: index.php");
exit();
