<?php
include 'database/conexion.php';

// Obtener lista de aprendices
$sql = "SELECT a.id, a.primer_nombre, a.segundo_nombre, a.primer_apellido, a.segundo_apellido, 
               a.sexo, a.documento, td.tipo_documento, gs.nombre_grupo, pf.nombre_programa, a.ficha
        FROM aprendices a
        INNER JOIN tipo_documento td ON a.id_tipo_documento = td.id
        INNER JOIN grupo_sanguineo gs ON a.id_grupo_sanguineo = gs.id
        INNER JOIN programa_formacion pf ON a.id_programa = pf.id";

$resultado = mysqli_query($conexion, $sql);
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>SENA || Lista de Aprendices</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h1 class="text-center">Lista de Aprendices</h1>
    <div class="text-center mb-3">
        <a href="view/crear.php" class="btn btn-primary btn-sm">Crear Aprendiz</a>
    </div>

    <table class="table table-bordered table-hover text-center">
        <thead class="table-dark">
            <tr>
                <th>No.</th>
                <th>Primer Nombre</th>
                <th>Segundo Nombre</th>
                <th>Primer Apellido</th>
                <th>Segundo Apellido</th>
                <th>Sexo</th>
                <th>Documento</th>
                <th>Tipo Documento</th>
                <th>Grupo Sanguíneo</th>
                <th>Programa</th>
                <th>Ficha</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        $contador = 1;
        while ($row = mysqli_fetch_assoc($resultado)) { ?>
            <tr>
                <td><?= $contador++ ?></td>
                <td><?= $row['primer_nombre'] ?></td>
                <td><?= $row['segundo_nombre'] ?></td>
                <td><?= $row['primer_apellido'] ?></td>
                <td><?= $row['segundo_apellido'] ?></td>
                <td><?= $row['sexo'] ?></td>
                <td><?= $row['documento'] ?></td>
                <td><?= $row['tipo_documento'] ?></td>
                <td><?= $row['nombre_grupo'] ?></td>
                <td><?= $row['nombre_programa'] ?></td>
                <td><?= $row['ficha'] ?></td>
                <td>
                    <a href="view/editar.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Actualizar</a>
                    <a href="controller/eliminar_aprendiz.php?id=<?= $row['id'] ?>" 
                    class="btn btn-danger btn-sm"
                    onclick="return confirm('¿Estás seguro de eliminar este aprendiz?');">Eliminar</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
</body>
</html>
