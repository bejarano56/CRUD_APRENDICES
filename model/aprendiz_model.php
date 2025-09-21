<?php
include_once(__DIR__ . '/../database/conexion.php');

class AprendizModel {
    public static function crear($nombre, $apellido, $fecha_nacimiento, $correo, $telefono) {
        global $conexion;
        $sql = "INSERT INTO aprendices (nombre, apellido, fecha_nacimiento, correo, telefono) 
                VALUES ('$nombre', '$apellido', '$fecha_nacimiento', '$correo', '$telefono')";
        return mysqli_query($conexion, $sql);
    }
}