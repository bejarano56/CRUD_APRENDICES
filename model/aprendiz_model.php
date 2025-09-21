<?php
require_once __DIR__ . '/../database/conexion.php';

class AprendizModel
{
    private $db;

    public function __construct()
    {
        $this->db = conectarDB(); 
    }

    public function obtenerTodos()
    {
        $sql = "SELECT * FROM aprendices";
        $resultado = $this->db->query($sql);
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    public function obtenerPorId($id)
    {
        $sql = "SELECT * FROM aprendices WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function crear($datos)
    {
        $sql = "INSERT INTO aprendices 
            (primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, sexo, documento, id_tipo_documento, id_grupo_sanguineo, id_programa, ficha) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param(
            "sssssiiss",
            $datos['primer_nombre'],
            $datos['segundo_nombre'],
            $datos['primer_apellido'],
            $datos['segundo_apellido'],
            $datos['sexo'],
            $datos['documento'],
            $datos['id_tipo_documento'],
            $datos['id_grupo_sanguineo'],
            $datos['id_programa'],
            $datos['ficha']
        );
        return $stmt->execute();
    }

    // Actualizar aprendiz
    public function actualizar($id, $datos)
    {
        $sql = "UPDATE aprendices SET 
            primer_nombre = ?, 
            segundo_nombre = ?, 
            primer_apellido = ?, 
            segundo_apellido = ?, 
            sexo = ?, 
            documento = ?,
            id_tipo_documento = ?, 
            id_grupo_sanguineo = ?, 
            id_programa = ?, 
            ficha = ? 
            WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param(
            "sssssiissi",
            $datos['primer_nombre'],
            $datos['segundo_nombre'],
            $datos['primer_apellido'],
            $datos['segundo_apellido'],
            $datos['sexo'],
            $datos['documento'],
            $datos['id_tipo_documento'],
            $datos['id_grupo_sanguineo'],
            $datos['id_programa'],
            $datos['ficha'],
            $id
        );
        return $stmt->execute();
    }
}