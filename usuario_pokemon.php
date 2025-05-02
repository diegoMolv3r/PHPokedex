<?php

class usuariopokemon{
    private $database;
    public function __construct(){
        $this->database = new Database();
    }

    public function mostrarPokemones($array, $sessionStarted){
        foreach ($array as $pokemon){
            $nombre = $pokemon['nombre'];
            $tipo1 = $pokemon['tipo1'];
            $tipo2 = $pokemon['tipo2'];
            $rutaImagen = $pokemon['imagen'];
            $numero_identificador = $pokemon['numero_identificador'];

            echo "<div class='carta p-2'  style=' height: auto; min-width: 12rem'>";
            echo    "<div class='imagen-nombre'>";
            echo        "<img src='$rutaImagen' alt='$nombre' style='width: 48px; height: 48px'>";
            echo        "<h5> " . $nombre . "</h5>";
            echo    "</div>";
            if($tipo2 == NULL){
                echo    "<div class='tipos'>";
                echo         "<img alt='$tipo1' src='imagenes/Tipos/Tipo_".$tipo1."_EP.png'>";
            }else{
                echo    "<div class='tipos'>";
                echo         "<img alt='$tipo1' src='imagenes/Tipos/Tipo_".$tipo1."_EP.png'>";
                echo         "<img alt='$tipo2' src='imagenes/Tipos/Tipo_".$tipo2."_EP.png'>";
            }
            echo    "</div>";

            echo    "<div>";
            echo        "<a href='vista-pokemon.php?numero_identificador=$numero_identificador' class='link-info mt-3'>VER</a>";
            if($sessionStarted){
                echo    "<a href='vista-modificar-pokemon.php?numero_identificador=$numero_identificador' class='link-info mt-3 mx-1'>MODIFICAR</a>";
                echo    "<a href='borrar.php?numero_identificador=$numero_identificador' class='link-info mt-3'>BORRAR</a>";
            }
            echo    "</div>";
            echo "</div>";
        }
    }

}