<?php
// database/conexion.php
function conectarDB() {
    $server = "localhost";
    $database = "prueba_db"; 
    $usuario = "root";
    $contrasenia = "";

    $mysqli = new mysqli($server, $usuario, $contrasenia, $database);

    if ($mysqli->connect_errno) {

        die("Error de conexión MySQL: " . $mysqli->connect_error);
    }

    $mysqli->set_charset('utf8mb4');

    return $mysqli;
}

if (!isset($conexion) || !$conexion) {
    $conexion = conectarDB();
    $GLOBALS['conexion'] = $conexion;
}
