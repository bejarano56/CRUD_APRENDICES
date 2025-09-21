<?php
require_once '../controller/aprendiz_controller.php';
require_once '../database/conexion.php';

$controlador = new AprendizController();

$id = $_GET['id'] ?? null;
if (!$id) die("ID de aprendiz no proporcionado");

$aprendiz = $controlador->show($id);

if (!$aprendiz) die("Aprendiz no encontrado");

$conexion = conectarDB();
$tipos = mysqli_query($conexion, "SELECT * FROM tipo_documento");
$grupos = mysqli_query($conexion, "SELECT * FROM grupo_sanguineo");
$programas = mysqli_query($conexion, "SELECT * FROM programa_formacion");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'primer_nombre' => $_POST['primer_nombre'] ?? '',
        'segundo_nombre' => $_POST['segundo_nombre'] ?? '',
        'primer_apellido' => $_POST['primer_apellido'] ?? '',
        'segundo_apellido' => $_POST['segundo_apellido'] ?? '',
        'sexo' => $_POST['sexo'] ?? '',
        'documento' => $_POST['documento'] ?? '',
        'id_tipo_documento' => $_POST['id_tipo_documento'] ?? null,
        'id_grupo_sanguineo' => $_POST['id_grupo_sanguineo'] ?? null,
        'id_programa' => $_POST['id_programa'] ?? null,
        'ficha' => $_POST['ficha'] ?? '',
    ];

    $ok = $controlador->update($id, $data);
    if ($ok) {
        header('Location: ../index.php?msg=actualizado');
        exit;
    } else {
        $error = "Error al actualizar el aprendiz.";
    }
}
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Editar Aprendiz</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h1>Editar Aprendiz</h1>
    <?php if (!empty($error)) : ?>
        <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form action="" method="post" class="row g-3">

        <div class="col-md-6">
            <label class="form-label">Primer Nombre</label>
            <input type="text" name="primer_nombre" class="form-control" required
                value="<?= htmlspecialchars((string)($aprendiz['primer_nombre'] ?? '')) ?>">
        </div>

        <div class="col-md-6">
            <label class="form-label">Segundo Nombre</label>
            <input type="text" name="segundo_nombre" class="form-control"
                value="<?= htmlspecialchars((string)($aprendiz['segundo_nombre'] ?? '')) ?>">
        </div>

        <div class="col-md-6">
            <label class="form-label">Primer Apellido</label>
            <input type="text" name="primer_apellido" class="form-control" required
                value="<?= htmlspecialchars((string)($aprendiz['primer_apellido'] ?? '')) ?>">
        </div>

        <div class="col-md-6">
            <label class="form-label">Segundo Apellido</label>
            <input type="text" name="segundo_apellido" class="form-control"
                value="<?= htmlspecialchars((string)($aprendiz['segundo_apellido'] ?? '')) ?>">
        </div>

        <div class="col-md-6">
            <label class="form-label">Sexo</label>
            <select name="sexo" class="form-select" required>
                <option value="">Seleccione</option>
                <option value="masculino" <?= ($aprendiz['sexo'] ?? '') === 'masculino' ? 'selected' : '' ?>>Masculino</option>
                <option value="femenino" <?= ($aprendiz['sexo'] ?? '') === 'femenino' ? 'selected' : '' ?>>Femenino</option>
            </select>
        </div>

        <div class="col-md-6">
            <label class="form-label">Documento</label>
            <input type="text" name="documento" class="form-control" required
                value="<?= htmlspecialchars((string)($aprendiz['documento'] ?? '')) ?>">
        </div>

        <div class="col-md-6">
            <label class="form-label">Tipo Documento</label>
            <select name="id_tipo_documento" class="form-select" required>
                <option value="">Seleccione</option>
                <?php mysqli_data_seek($tipos, 0); while ($t = mysqli_fetch_assoc($tipos)) : ?>
                    <option value="<?= $t['id'] ?>" <?= ($aprendiz['id_tipo_documento'] ?? '') == $t['id'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($t['tipo_documento']) ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </div>

        <div class="col-md-6">
            <label class="form-label">Grupo Sanguíneo</label>
            <select name="id_grupo_sanguineo" class="form-select" required>
                <option value="">Seleccione</option>
                <?php mysqli_data_seek($grupos, 0); while ($g = mysqli_fetch_assoc($grupos)) : ?>
                    <option value="<?= $g['id'] ?>" <?= ($aprendiz['id_grupo_sanguineo'] ?? '') == $g['id'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($g['nombre_grupo']) ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </div>

        <div class="col-md-6">
            <label class="form-label">Programa</label>
            <select name="id_programa" class="form-select" required>
                <option value="">Seleccione</option>
                <?php mysqli_data_seek($programas, 0); while ($p = mysqli_fetch_assoc($programas)) : ?>
                    <option value="<?= $p['id'] ?>" <?= ($aprendiz['id_programa'] ?? '') == $p['id'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($p['nombre_programa']) ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </div>

        <div class="col-md-6">
            <label class="form-label">Ficha</label>
            <input type="text" name="ficha" class="form-control" required
                value="<?= htmlspecialchars((string)($aprendiz['ficha'] ?? '')) ?>">
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-success">Actualizar</button>
            <a href="../index.php" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
</body>
</html>
