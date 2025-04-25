<?php ?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Iniciar Sesion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link href="imagenes/Pokeball.png" rel="website icon" type="png">
    <style>
        body{
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            height: 100vh;
            width: 100vw;
            --color: #E1E1E1;
            background-color: #F3F3F3;
            background-image: linear-gradient(0deg, transparent 24%, var(--color) 25%, var(--color) 26%, transparent 27%,transparent 74%, var(--color) 75%, var(--color) 76%, transparent 77%,transparent),
            linear-gradient(90deg, transparent 24%, var(--color) 25%, var(--color) 26%, transparent 27%,transparent 74%, var(--color) 75%, var(--color) 76%, transparent 77%,transparent);
            background-size: 55px 55px;
        }
    </style>
</head>

<body class="container">

        <form class="form p-4 rounded shadow-sm bg-white d-flex flex-column align-items-center" method="post" action="./index.php">
            <h3 class="title text-center mb-4">Iniciar Sesion</h3>

            <input class="form-control mb-3" name="usuario" placeholder="Nombre de usuario" type="text">
            <input class="form-control mb-3" name="password" placeholder="Contraseña" type="password">
            <p class="text-center small">No tenes cuenta? <a href="registrarse.php">Registrarse</a></p>
            <input class="btn btn-primary button-confirm" type="submit" value="Iniciar Sesion">
        </form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>
</html>
