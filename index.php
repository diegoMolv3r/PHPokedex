<?php
require_once("Database.php"); $database = new Database();
require_once("usuario_pokemon.php"); $pokedex = new usuariopokemon();
require_once("encabezado.php");

$sessionStarted = isset($_SESSION['usuario']);

if($sessionStarted){
    $id_usuario = $_SESSION['id_usuario'];
    $queryMostrarPokemonesDelUsuario = "SELECT * FROM pokemones_propios WHERE id_usuario = $id_usuario";
    $pokemonesDelUsuario = $database->CONVERTIR_QUERY_PARA_RECORRER($queryMostrarPokemonesDelUsuario);
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

<?php showNavbar();?>

<?php if($sessionStarted){ echo "<a href='vista-cargar-pokemon.php' class='btn btn-primary position-fixed bottom-0 start-0 m-3'>CARGAR POKEMON</a>";}  ?>

<h1 class="h1 my-2 text-center">¡Tenemos que atraparlos a todos!</h1>
<main class="container">
    <?php
    $filtro = isset($_POST["filtro"]) ? $_POST["filtro"] : "";

    if($sessionStarted){
        $pokemonesFiltrados = $database->CONVERTIR_QUERY_PARA_RECORRER("SELECT * FROM pokemones_propios WHERE id_usuario = '".$id_usuario."' AND (numero_identificador = '".$filtro."' OR nombre LIKE '%".$filtro."%' OR tipo1 LIKE '%".$filtro."%' OR tipo2 LIKE '%".$filtro."%')");
        $todosLosPokemones = $database->CONVERTIR_QUERY_PARA_RECORRER("SELECT * FROM pokemones_propios WHERE id_usuario = '".$id_usuario."'");
    }else{
        $pokemonesFiltrados = $database->CONVERTIR_QUERY_PARA_RECORRER("SELECT * FROM pokemon WHERE numero_identificador = '".$filtro."' OR nombre LIKE '%".$filtro."%' OR tipo1 LIKE '%".$filtro."%' OR tipo2 LIKE '%".$filtro."%'");
        $todosLosPokemones = $database->CONVERTIR_QUERY_PARA_RECORRER("SELECT * FROM pokemon");
    }
    ?>


    <h3><?php if(!empty($_POST["filtro"]) && empty($pokemonesFiltrados)){echo "Pokemon no encontrado :(";} ?></h3>
    <h2><?php if($sessionStarted){echo "Usuario: " . $_SESSION['usuario'] . " " . "ID:  " . $_SESSION['id_usuario'];} ?></h2>

        <section class="row justify-content-center row-cols-1 row-cols-md-3 row-cols-lg-5">
            <?php if($sessionStarted){
                if(empty($filtro)){
                    $pokedex->mostrarPokemones($pokemonesDelUsuario, $sessionStarted);
                }else{
                    $pokedex->mostrarPokemones($pokemonesFiltrados, $sessionStarted);
                }
            }else{
                if(empty($filtro)){
                    $pokedex->mostrarPokemones($todosLosPokemones, $sessionStarted);
                }else{
                    $pokedex->mostrarPokemones($pokemonesFiltrados, $sessionStarted);
                }
            }
            ?>
        </section>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>
</html>