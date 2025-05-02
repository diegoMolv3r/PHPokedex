<?php
session_start();
require_once("./Database.php"); $database = new Database();

$numero_identificador = $_POST["numero_identificador"];
$imagen = $_FILES["imagen"];
$nombrePokemon = $_POST["nombre"];
$tipo1 = $_POST["tipo1"];
$tipo2 = $_POST["tipo2"];
$descripcion = $_POST["descripcion"];
$imagen_vieja = $_POST["imagen_vieja"];

if(isset($imagen) && $imagen["error"] === 0){
    $carpeta = __DIR__ . "/imagenes/uploads/";
    $archivo = $_FILES["imagen"]["tmp_name"];
    $nombre = $_FILES["imagen"]["name"];
    $extension = pathinfo($nombre, PATHINFO_EXTENSION);
    $nuevoNombre = $_SESSION['id_usuario'] . "_" . $numero_identificador . "." . $extension;
    $direccionDeGuardado = $carpeta . $nuevoNombre;
    $direccionDB = "imagenes/uploads/" . $nuevoNombre;
    move_uploaded_file($archivo, $direccionDeGuardado);
}else{
    $direccionDB = !empty($imagen_vieja) ? $imagen_vieja : "";
}

$query = "UPDATE pokemones_propios 
          SET numero_identificador = $numero_identificador,
               imagen = '$direccionDB',
               nombre = '$nombrePokemon', 
               tipo1 = '$tipo1', 
               tipo2 = '$tipo2', 
               descripcion = '$descripcion'   
          WHERE numero_identificador=$numero_identificador";

$database->query($query);
header("Location:vista-pokemon.php?numero_identificador=$numero_identificador"); exit();