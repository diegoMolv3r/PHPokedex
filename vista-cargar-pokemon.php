<?php
require_once("./Database.php"); $database = new Database();
require_once("./encabezado.php");
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

<div class="containter mt-5">
    <div class="card shadow p-4">
        <h4 class="mb-4">Cargar un nuevo Pokemon</h4>
        <form action="cargar-pokemon.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="imgaen" class="form-label">Imagen</label>
                <input type="file" class="form-control" name="imagen" id="imagen">
            </div>

            <div class="mb-3">
                <label for="id-pokemon" class="form-label">ID</label>
                <input type="text" class="form-control" placeholder="Ingrese el ID del pokemon" name="id" id="id-pokemon">
            </div>

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" placeholder="Ingrese el nombre del pokemon" name="nombre" id="nombre" required>
            </div>
            <div class="mb-3">
                <label for="tipo1" class="form-label">Tipo 1</label>
                <select class="form-select" name="tipo1" id="tipo1" required>
                    <option value="">Seleccione un tipo</option>
                    <option value="acero">Acero</option>
                    <option value="agua">Agua</option>
                    <option value="bicho">Bicho</option>
                    <option value="dragón">Dragon</option>
                    <option value="eléctrico">Electrico</option>
                    <option value="fantasma">Fantasma</option>
                    <option value="fuego">Fuego</option>
                    <option value="hada">Hada</option>
                    <option value="hielo">Hielo</option>
                    <option value="lucha">Lucha</option>
                    <option value="normal">Normal</option>
                    <option value="planta">Planta</option>
                    <option value="psíquico">Psíquico</option>
                    <option value="roca">Roca</option>
                    <option value="siniestro">Siniestro</option>
                    <option value="tierra">Tierra</option>
                    <option value="veneno">Veneno</option>
                    <option value="volador">Volador</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="tipo2" class="form-label">Tipo 2 (opcional)</label>
                <select class="form-select" name="tipo2" id="tipo2">
                    <option value="">Seleccione un tipo</option>
                    <option value="acero">Acero</option>
                    <option value="agua">Agua</option>
                    <option value="bicho">Bicho</option>
                    <option value="dragón">Dragon</option>
                    <option value="eléctrico">Electrico</option>
                    <option value="fantasma">Fantasma</option>
                    <option value="fuego">Fuego</option>
                    <option value="hada">Hada</option>
                    <option value="hielo">Hielo</option>
                    <option value="lucha">Lucha</option>
                    <option value="normal">Normal</option>
                    <option value="planta">Planta</option>
                    <option value="psíquico">Psíquico</option>
                    <option value="roca">Roca</option>
                    <option value="siniestro">Siniestro</option>
                    <option value="tierra">Tierra</option>
                    <option value="veneno">Veneno</option>
                    <option value="volador">Volador</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripcion</label>
                <textarea class="form-control" name="descripcion" id="descripcion" rows="3" placeholder="Escriba una descripcion del Pokemon..."></textarea>
            </div>
            <input type="submit" class="btn btn-primary" value="Cargar Pokemon">
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>
</html>