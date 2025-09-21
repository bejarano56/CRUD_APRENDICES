<?php
require_once '../controller/aprendiz_controller.php';
$controlador = new AprendizController();

// Traer datos para selects
require_once '../database/conexion.php';
$tipos = mysqli_query($conexion, "SELECT * FROM tipo_documento");
$grupos = mysqli_query($conexion, "SELECT * FROM grupo_sanguineo");
$programas = mysqli_query($conexion, "SELECT * FROM programa_formacion");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $resultado = $controlador->store($_POST);
    header("Location: ../index.php");
    exit;
}
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>SENA || Crear Aprendiz</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h1>Crear Aprendiz</h1>
    <form action="" method="post" class="row g-3"> <!-- action="" envía al mismo archivo -->

        <div class="col-md-6">
            <label class="form-label">Primer Nombre</label>
            <input type="text" name="primer_nombre" class="form-control" required>
        </div>

        <div class="col-md-6">
            <label class="form-label">Segundo Nombre</label>
            <input type="text" name="segundo_nombre" class="form-control">
        </div>

        <div class="col-md-6">
            <label class="form-label">Primer Apellido</label>
            <input type="text" name="primer_apellido" class="form-control" required>
        </div>

        <div class="col-md-6">
            <label class="form-label">Segundo Apellido</label>
            <input type="text" name="segundo_apellido" class="form-control">
        </div>

        <div class="col-md-6">
            <label class="form-label">Sexo</label>
            <select name="sexo" class="form-select" required>
                <option value="">Seleccione</option>
                <option value="Masculino">Masculino</option>
                <option value="Femenino">Femenino</option>
            </select>
        </div>

        <div class="col-md-6">
            <label class="form-label">Documento</label>
            <input type="text" name="documento" class="form-control" required>
        </div>

        <div class="col-md-6">
            <label class="form-label">Tipo Documento</label>
            <select name="id_tipo_documento" class="form-select" required>
                <option value="">Seleccione</option>
                <?php while ($t = mysqli_fetch_assoc($tipos)) { ?>
                    <option value="<?= $t['id'] ?>"><?= $t['tipo_documento'] ?></option>
                <?php } ?>
            </select>
        </div>

        <div class="col-md-6">
            <label class="form-label">Grupo Sanguíneo</label>
            <select name="id_grupo_sanguineo" class="form-select" required>
                <option value="">Seleccione</option>
                <?php while ($g = mysqli_fetch_assoc($grupos)) { ?>
                    <option value="<?= $g['id'] ?>"><?= $g['nombre_grupo'] ?></option>
                <?php } ?>
            </select>
        </div>

        <div class="col-md-6">
            <label class="form-label">Programa</label>
            <select name="id_programa" class="form-select" required>
                <option value="">Seleccione</option>
                <?php while ($p = mysqli_fetch_assoc($programas)) { ?>
                    <option value="<?= $p['id'] ?>"><?= $p['nombre_programa'] ?></option>
                <?php } ?>
            </select>
        </div>

        <div class="col-md-6">
            <label class="form-label">Ficha</label>
            <input type="text" name="ficha" class="form-control" required>
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-success">Guardar</button>
            <a href="../index.php" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
</body>
</html>
