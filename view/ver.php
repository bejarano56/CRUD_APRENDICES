<?php
require_once '../controller/aprendiz_controller.php';
$controlador = new AprendizController();


$id = $_GET['id'] ?? null;
if (!$id) {
    die("ID de aprendiz no proporcionado");
}

// Obtener aprendiz
$aprendiz = $controlador->show($id);
if (!$aprendiz) {
    die("Aprendiz no encontrado");
}
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Ver Aprendiz</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h1>Información del Aprendiz</h1>
    <table class="table table-bordered">
        <tr><th>Primer Nombre</th><td><?= htmlspecialchars($aprendiz['primer_nombre'] ?? '') ?></td></tr>
        <tr><th>Segundo Nombre</th><td><?= htmlspecialchars($aprendiz['segundo_nombre'] ?? '') ?></td></tr>
        <tr><th>Primer Apellido</th><td><?= htmlspecialchars($aprendiz['primer_apellido'] ?? '') ?></td></tr>
        <tr><th>Segundo Apellido</th><td><?= htmlspecialchars($aprendiz['segundo_apellido'] ?? '') ?></td></tr>
        <tr><th>Sexo</th><td><?= htmlspecialchars($aprendiz['sexo'] ?? '') ?></td></tr>
        <tr><th>Documento</th><td><?= htmlspecialchars($aprendiz['documento'] ?? '') ?></td></tr>
        <tr><th>Tipo Documento</th><td><?= htmlspecialchars($aprendiz['tipo_documento'] ?? '') ?></td></tr>
        <tr><th>Grupo Sanguíneo</th><td><?= htmlspecialchars($aprendiz['nombre_grupo'] ?? '') ?></td></tr>
        <tr><th>Programa</th><td><?= htmlspecialchars($aprendiz['nombre_programa'] ?? '') ?></td></tr>
        <tr><th>Ficha</th><td><?= htmlspecialchars($aprendiz['ficha'] ?? '') ?></td></tr>
    </table>
    <a href="../index.php" class="btn btn-secondary">Volver</a>
</div>
</body>
</html>
