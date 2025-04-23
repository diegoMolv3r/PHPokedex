<?php

global $database;
require_once("./conexion.php");
$datos = $database->query("SELECT * FROM pokemones");

function mostrarPokemones($datos){
    while($fila = mysqli_fetch_array($datos)){
        $id_pokemon = $fila['id'];
        $nombre = $fila['nombre'];
        if($id_pokemon <= 9){
            $id_pokemon = 0 . $id_pokemon;
        }

        $tipo1 = $fila["tipo1"];
        $tipo2 = $fila["tipo2"];

        if($fila["tipo2"] != NULL){
            echo "<div class='carta'>" .
                    "<div class='imagen-nombre'>".
                        "<img src='./imagenes/Pokemones/$id_pokemon.png' alt='$nombre'>" .
                        "<h5> " . $fila['nombre'] . "</h5>" .
                    "</div>" .
                    "<div class='tipos2'>".
                        "<img alt='Foto de $nombre' src='imagenes/Tipos/Tipo_".$tipo1."_EP.png'>".
                        "<img alt='Foto de $nombre' src='imagenes/Tipos/Tipo_".$tipo2."_EP.png'>".
                    "</div>" .
                "</div>";
        }else{
            echo "<div class='carta'>" .
                    "<div class='imagen-nombre'>".
                        "<img src='./imagenes/Pokemones/$id_pokemon.png' alt='$nombre'>" .
                        "<h5> " . $fila['nombre'] . "</h5>" .
                    "</div>" .
                    "<div class='tipos1'>".
                        "<img alt='Foto de $nombre' src='imagenes/Tipos/Tipo_".$tipo1."_EP.png'>".
                    "</div>" .
                "</div>";
        }
    }
}
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHPokedex!</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link href="imagenes/Pokeball.png" rel="website icon" type="png">
    <style>
        .carta{
            display: flex;
            flex-direction: column;
            height: 100px;
            width: 200px;
            margin: 20px;
            justify-content: center;
            align-content: center;
            border-radius: 1rem;
            background: rgba(255, 255, 255, 0.1); /* Fondo semi-transparente */
            backdrop-filter: blur(10px); /* Aplica el desenfoque */
            -webkit-backdrop-filter: blur(10px); /* Compatibilidad con Safari */
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .imagen-nombre{
            height: 48px;
            width: 100%;
            display: flex;
            align-items: center;
        }

        .imagen-nombre img{
            width: 48px;
            height: 48px;
        }

        .imagen-nombre h5{
            color: black;
        }

        .tipos1{
            width: 100%;
            display: flex;
            justify-content: start;

        }

        .tipos2{
            width: 100%;
            display: flex;
            justify-content: space-between;

        }
    </style>
</head>
<body class="d-flex align-items-center flex-column vh-100">


<h1 class="my-2">¡Tenemos que atraparlos a todos!</h1>
<main class="container">
        <section class="row row-cols-1 row-cols-md-3 row-cols-lg-5">
            <?php mostrarPokemones($datos); ?>
        </section>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>
</html>


