<?php
// model/aprendiz_model.php
require_once __DIR__ . '/../database/conexion.php';

class AprendizModel {
    private $db;

    public function __construct() {
        $this->db = conectarDB();
    }

    public function obtenerTodos() {
    $sql = "SELECT a.id, a.primer_nombre, a.segundo_nombre, a.primer_apellido, a.segundo_apellido, a.sexo, a.documento, td.tipo_documento, gs.nombre_grupo, pf.nombre_programa, a.ficha
            FROM aprendices a
            INNER JOIN tipo_documento td ON a.id_tipo_documento = td.id
            INNER JOIN grupo_sanguineo gs ON a.id_grupo_sanguineo = gs.id
            INNER JOIN programa_formacion pf ON a.id_programa = pf.id";

    $resultado = mysqli_query($this->db, $sql); // ← AQUÍ
    $aprendices = [];
    while ($row = mysqli_fetch_assoc($resultado)) {
        $aprendices[] = $row;
    }
    return $aprendices;
}



    public function obtenerPorId($id) {
        $sql = "SELECT * FROM aprendices WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        if (!$stmt) die("Error prepare obtenerPorId: " . $this->db->error);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $res = $stmt->get_result();
        $row = $res->fetch_assoc();
        $stmt->close();
        return $row;
    }

    public function crear($datos) {
        $sql = "INSERT INTO aprendices 
            (primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, sexo, documento, id_tipo_documento, id_grupo_sanguineo, id_programa, ficha)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        if (!$stmt) die("Error prepare crear: " . $this->db->error);

        $types = 'ssssssiiis'; 

        // Asegúrate de que las keys existan en $datos (o setea valores por defecto)
        $p1 = $datos['primer_nombre'] ?? null;
        $p2 = $datos['segundo_nombre'] ?? null;
        $p3 = $datos['primer_apellido'] ?? null;
        $p4 = $datos['segundo_apellido'] ?? null;
        $p5 = $datos['sexo'] ?? null;
        $p6 = $datos['documento'] ?? null;
        $p7 = isset($datos['id_tipo_documento']) ? (int)$datos['id_tipo_documento'] : null;
        $p8 = isset($datos['id_grupo_sanguineo']) ? (int)$datos['id_grupo_sanguineo'] : null;
        $p9 = isset($datos['id_programa']) ? (int)$datos['id_programa'] : null;
        $p10 = $datos['ficha'] ?? null;

        $stmt->bind_param($types, $p1, $p2, $p3, $p4, $p5, $p6, $p7, $p8, $p9, $p10);
        $ok = $stmt->execute();
        if (!$ok) {
            // muestra error en desarrollo
            $err = $stmt->error;
            $stmt->close();
            die("Error execute crear: " . $err);
        }
        $stmt->close();
        return $ok;
    }

    public function actualizar($id, $datos) {
        $sql = "UPDATE aprendices SET 
            primer_nombre = ?, segundo_nombre = ?, primer_apellido = ?, segundo_apellido = ?, sexo = ?, documento = ?, id_tipo_documento = ?, id_grupo_sanguineo = ?, id_programa = ?, ficha = ?
            WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        if (!$stmt) die("Error prepare actualizar: " . $this->db->error);

        // mismos tipos de arriba + 'i' para el id al final
        $types = 'ssssssiiisi'; // 11 parámetros

        $p1 = $datos['primer_nombre'] ?? null;
        $p2 = $datos['segundo_nombre'] ?? null;
        $p3 = $datos['primer_apellido'] ?? null;
        $p4 = $datos['segundo_apellido'] ?? null;
        $p5 = $datos['sexo'] ?? null;
        $p6 = $datos['documento'] ?? null;
        $p7 = isset($datos['id_tipo_documento']) ? (int)$datos['id_tipo_documento'] : null;
        $p8 = isset($datos['id_grupo_sanguineo']) ? (int)$datos['id_grupo_sanguineo'] : null;
        $p9 = isset($datos['id_programa']) ? (int)$datos['id_programa'] : null;
        $p10 = $datos['ficha'] ?? null;
        $p11 = (int)$id;

        $stmt->bind_param($types, $p1, $p2, $p3, $p4, $p5, $p6, $p7, $p8, $p9, $p10, $p11);
        $ok = $stmt->execute();
        if (!$ok) {
            $err = $stmt->error;
            $stmt->close();
            die("Error execute actualizar: " . $err);
        }
        $stmt->close();
        return $ok;
    }

    public function eliminar($id) {
        $sql = "DELETE FROM aprendices WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        if (!$stmt) die("Error prepare eliminar: " . $this->db->error);
        $stmt->bind_param("i", $id);
        $ok = $stmt->execute();
        $stmt->close();
        return $ok;
    }
}
