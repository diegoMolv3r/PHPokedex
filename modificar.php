<?php
session_start();
require_once("./Database.php"); $database = new Database();

$numero_identificador = $_POST["id"];
$imagen = $_FILES["imagen"];
$nombrePokemon = $_POST["nombre"];
$tipo1 = $_POST["tipo1"];
$tipo2 = $_POST["tipo2"];
$descripcion = $_POST["descripcion"];


if(isset($_FILES["imagen"]) && $_SERVER["REQUEST_METHOD"] == "POST"){
    $carpeta = __DIR__ . "/imagenes/uploads/";
    $archivo = $_FILES["imagen"]["tmp_name"];
    $nombre = $_FILES["imagen"]["name"];
    $extension = pathinfo($nombre, PATHINFO_EXTENSION);
    $nuevoNombre = $_SESSION['id_usuario'] . "_" . $numero_identificador . $nombrePokemon . "." . $extension;
    $direccionDeGuardado = $carpeta . $nuevoNombre;
    $direccionDB = "imagenes/uploads/" . $nuevoNombre;
    move_uploaded_file($archivo, $direccionDeGuardado);

    $query = "UPDATE pokemones_propios 
      SET numero_identificador = $numero_identificador,
          imagen = '$direccionDB',
             nombre = '$nombrePokemon', 
          tipo1 = '$tipo1', 
          tipo2 = '$tipo2', 
                descripcion = '$descripcion'   
      WHERE numero_identificador=$numero_identificador";
}else{
    $query = "UPDATE pokemones_propios 
      SET numero_identificador = $numero_identificador, 
          nombre = '$nombrePokemon', 
             tipo1 = '$tipo1', 
          tipo2 = '$tipo2', 
             descripcion = '$descripcion'   
         WHERE numero_identificador=$numero_identificador";
}

$database->query($query);
header("Location:vista-pokemon.php?id=$numero_identificador"); exit();