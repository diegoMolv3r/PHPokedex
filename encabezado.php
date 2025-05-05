<?php
session_start();

function showNavbar(){
    $sessionStarted = isset($_SESSION['sessionStarted']) && $_SESSION['sessionStarted'];

    echo "<nav class='navbar navbar-expand-lg bg-body-tertiary w-100 d-flex justify-content-between'>";
    echo     "<div class='container-fluid'>";
    echo         "<a class='nav-link' href='index.php'><h1 class='navbar-brand mb-0'><img alt='logotipo pokemon' height='60px' src='imagenes/logotipo.png'></h1></a>";

    echo         "<button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarContent' aria-controls='navbarContent' aria-expanded='false' aria-label='Toggle navigation'>";
    echo         "<span class='navbar-toggler-icon'></span>";
    echo         "</button>";

    echo         "<div class='collapse navbar-collapse' id='navbarContent'>";
    echo             "<form class='d-flex mx-auto my-2 my-lg-0 w-50' role='search' method='post' action='index.php'>";
    echo                 "<input class='form-control me-2' name='filtro' type='search' placeholder='Ingrese el código, nombre o tipo de un Pokémon' aria-label='Search'>";
    echo                 "<input class='btn btn-success' type='submit' value='Buscar'>";
    echo             "</form>";

    echo         "<div class='d-flex ms-lg-3 mt-2 mt-lg-0'>";
    if($sessionStarted){
        echo "<p style='margin-right: 20px'>Usuario: " . $_SESSION['usuario'] . " " . "ID:  " . $_SESSION['id_usuario']."</p>";
        echo "<a class='btn btn-outline-danger' href='log-out.php'>Log out</a>";
    }else{
        echo "<a class='btn btn-outline-primary' href='vista-login.php'>Login</a>";
    }
    echo             "</div>";
    echo         "</div>";
    echo     "</div>";
    echo "</nav>";
}