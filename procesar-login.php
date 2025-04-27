<?php require_once("./Database.php"); $database = new Database();

// DATOS OBTENIDOS DEL FORMULARIO DE LOGIN
$username = $_POST["usuario"];
$pass = $_POST["password"];