<?php
require_once("./Database.php"); $database = new Database();
require_once("./encabezado.php");

$id = isset($_GET['id']) ? $_GET['id'] : null;

$pokemon = $database->CONVERTIR_QUERY_PARA_RECORRER("SELECT * FROM pokemon WHERE id=$id");
$pokemon = $pokemon[0];

?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHPokedex!</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link href="imagenes/Pokeball.png" rel="website icon" type="png">
    <script defer type="module" src="main.js"></script>
    <style>
        body{
            --color: #E1E1E1;
            background-color: #F3F3F3;
            background-image: linear-gradient(0deg, transparent 24%, var(--color) 25%, var(--color) 26%, transparent 27%,transparent 74%, var(--color) 75%, var(--color) 76%, transparent 77%,transparent),
            linear-gradient(90deg, transparent 24%, var(--color) 25%, var(--color) 26%, transparent 27%,transparent 74%, var(--color) 75%, var(--color) 76%, transparent 77%,transparent);
            background-size: 55px 55px;
        }
    </style>
</head>

<body class="d-flex flex-column justify-content-start align-items-center vh-100">
    <?php showNavbar(); ?>
    <div class=" d-flex flex-column p-3 justify-content-center align-items-start bg-white rounded m-auto" style="width: 25rem;">

        <h5 class="card-subtitle my-2 text-left w-100">ID: <?=$pokemon['numero_identificador']?></h5>
        <img src="<?= $pokemon['imagen']?>" height="150px" width="150px">

        <div class="d-flex justify-content-start">
            <img <?= "src='imagenes/Tipos/Tipo_" . $pokemon['tipo1'] . "_EP.png' style='margin-right: 15px;'>" ?>
            <?php if($pokemon['tipo2'] != NULL){echo "<img src='imagenes/Tipos/Tipo_". $pokemon['tipo2'] . "_EP.png'>";}?>
        </div>

        <div class="card-body">
            <h4 class="card-subtitle p-2"><?=$pokemon['nombre']?></h4>
            <p class="card-text p-2" style="overflow-wrap: break-word;"><?= $pokemon['descripcion'] ?></p>
        </div>

        <a href='index.php' class='btn btn-primary mt-3'>VOLVER A LA POKEDEX</a>
    </div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>
</html>
