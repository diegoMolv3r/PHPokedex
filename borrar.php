<?php
require_once("./Database.php");$database = new Database();

session_start();

$numero_identificador = $_GET['numero_identificador'];
$id_usuario = $_SESSION['id_usuario'];

if(isset($_SESSION['usuario']) && isset($_SESSION['id_usuario']) && isset($numero_identificador)){
    $database->query("DELETE FROM pokemones_propios WHERE numero_identificador = '$numero_identificador';");
}

header("location: index.php");
exit();
