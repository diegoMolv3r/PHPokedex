<?php
require_once("./Database.php"); $database = new Database();

function mostrarPokemones($array){
    foreach ($array as $pokemon){
        $nombre = $pokemon['nombre'];
        $tipo1 = $pokemon['tipo1'];
        $tipo2 = $pokemon['tipo2'];
        $rutaImagen = $pokemon['imagen'];
        $id = $pokemon['numero_identificador'];

        echo "<div class='carta p-2'  style=' height: auto; width: auto'>";
        echo    "<div class='imagen-nombre'>";
        echo        "<img src='$rutaImagen' alt='$nombre'>";
        echo        "<h5> " . $nombre . "</h5>";
        echo    "</div>";
        if($tipo2 == NULL){
            echo    "<div class='tipos'>";
            echo         "<img alt='Foto de $nombre' src='imagenes/Tipos/Tipo_".$tipo1."_EP.png'>";
        }else{
            echo    "<div class='tipos'>";
            echo         "<img alt='Foto de $nombre' src='imagenes/Tipos/Tipo_".$tipo1."_EP.png'>";
            echo         "<img alt='Foto de $nombre' src='imagenes/Tipos/Tipo_".$tipo2."_EP.png'>";
        }
            echo    "</div>";

            echo    "<div>";
            echo        "<a href='vista-pokemon.php?id=$id' class='link-info mt-3'>VER</a>";
            echo        "<a href='#' class='link-info mt-3 mx-1'>MODIFICAR</a>";
            echo        "<a href='#' class='link-info mt-3'>BORRAR</a>";
            echo    "</div>";
        echo "</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHPokedex!</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link href="imagenes/Pokeball.png" rel="website icon" type="png">
    <style>
        body{
            --color: #E1E1E1;
            background-color: #F3F3F3;
            background-image: linear-gradient(0deg, transparent 24%, var(--color) 25%, var(--color) 26%, transparent 27%,transparent 74%, var(--color) 75%, var(--color) 76%, transparent 77%,transparent),
            linear-gradient(90deg, transparent 24%, var(--color) 25%, var(--color) 26%, transparent 27%,transparent 74%, var(--color) 75%, var(--color) 76%, transparent 77%,transparent);
            background-size: 55px 55px;
        }

        .carta{
            display: flex;
            flex-direction: column;
            height: 100px;
            width: 200px;
            margin: 20px;
            justify-content: center;
            align-content: center;
            border-radius: 1rem;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.3);
            transition: .5s;
            cursor: url("./imagenes/pokebola-abierta.png"), auto;
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

        .tipos{
            width: 100%;
            display: flex;
            justify-content: start;
        }

        .btn{
            transition: .8s;
        }

        .btn:hover{
            transform: scale(1.2);
        }

    </style>
</head>
<body class="d-flex align-items-center flex-column vh-100">

<h1 class="h1 my-2 text-center">¡Tenemos que atraparlos a todos!</h1>
<main class="container">
        <form class="d-flex" role="search" method="post" action="index.php">
            <input class="form-control me-2" name="filtro" type="search" placeholder="Ingrese el codigo, nombre o tipo de un pokemon" aria-label="Search">
            <input class="btn btn-success" type="submit" value="Buscar">
        </form>

        <?php
        $filtro = isset($_POST["filtro"]) ? $_POST["filtro"] : "";

        $pokemonesFiltrados = $database->CONVERTIR_QUERY_PARA_RECORRER("SELECT * FROM pokemones WHERE numero_identificador = '".$filtro."' OR nombre LIKE '%".$filtro."%' OR tipo1 LIKE '%".$filtro."%' OR tipo2 LIKE '%".$filtro."%'");
        $todosLosPokemones = $database->CONVERTIR_QUERY_PARA_RECORRER("SELECT * FROM pokemones");

        if(isset($_POST["filtro"])){
            if($_POST["filtro"] != "" && empty($pokemonesFiltrados))
                echo "<h3>Pokemon no encontrado :(</h3>";
        }

        ?>

        <section class="row justify-content-center row-cols-1 row-cols-md-3 row-cols-lg-5">
            <?php ($filtro == "" || empty($pokemonesFiltrados)) ? mostrarPokemones($todosLosPokemones) : mostrarPokemones($pokemonesFiltrados);?>
        </section>

        <audio autoplay loop id="musica-menu">
                <source src="./imagenes/Pokemon Ruby_Sapphire_Emerald- Littleroot Town.mp3">
        </audio>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>
</html>