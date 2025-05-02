<?php
session_start();
$sessionStarted = isset($_SESSION['sessionStarted']);
require_once("./Database.php"); $database = new Database();
require_once("./usuario_pokemon.php"); $pokedex = new usuariopokemon();

function obtenerNombre(){return $_POST["nombre"];}
function obtenerIdPokemon(){return $_POST["id"];}
function obtenerTipo1(){return $_POST["tipo1"];}
function obtenerTipo2(){return $_POST["tipo2"];}
function obtenerDescripcion(){return $_POST["descripcion"];}

function obtenerImagen(){
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $carpeta = __DIR__ . "/imagenes/uploads/";
        if(isset($_FILES["imagen"])){
            $archivo = $_FILES["imagen"]["tmp_name"];
            $nombre = $_FILES["imagen"]["name"];

            $extension = pathinfo($nombre, PATHINFO_EXTENSION);

            $nuevoNombre = $_SESSION['id_usuario'] . "_" . obtenerIdPokemon() . obtenerNombre() . "." . $extension;

            $direccionDeGuardado = $carpeta . $nuevoNombre;

            echo (move_uploaded_file($archivo, $direccionDeGuardado) ? "El archivo se subió correctamente" : "El archivo no se subió correctamente");
            return "imagenes/uploads/$nuevoNombre";
        }
    }else{
        echo "No se cargo ningun archivo";
    }
}


if($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = obtenerIdPokemon();
    $nombrePokemon = obtenerNombre();
    $tipo1 = obtenerTipo1();
    $tipo2 = obtenerTipo2();
    $rutaImagen = obtenerImagen();
    $descripcion = obtenerDescripcion();
    $id_usuario = $_SESSION['id_usuario'];

    $query = "INSERT INTO pokemones_propios(numero_identificador, imagen, nombre, tipo1, tipo2, descripcion, id_usuario) VALUES ('$id', '$rutaImagen','$nombrePokemon', '$tipo1', '$tipo2', '$descripcion', $id_usuario)";
    $database->query($query);
}

header("location: index.php");
exit();