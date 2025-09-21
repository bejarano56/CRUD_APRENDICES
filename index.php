<?php
require_once 'controller/aprendiz_controller.php';
$controlador = new AprendizController();

$aprendices = $controlador->index();
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>SENA || Lista de Aprendices</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <?php if(isset($_GET['msg']) && $_GET['msg'] == 'actualizado'): ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    Swal.fire({
        icon: 'success',
        title: 'Actualizado!',
        text: 'El aprendiz ha sido actualizado correctamente'
    });
</script>
<?php endif; ?>
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
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        $contador = 1;
        foreach ($aprendices as $row) { ?>
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
                    <button class="btn btn-danger btn-sm" onclick="confirmarEliminar(<?= $row['id'] ?>)">Eliminar</button>
                    <a href="view/ver.php?id=<?= $row['id'] ?>" class="btn btn-info btn-sm">Ver</a>

                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

<script>
function confirmarEliminar(id) {
    Swal.fire({
        title: '¿Estás seguro?',
        text: "¡No podrás revertir esto!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Sí, eliminar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = 'controller/eliminar_aprendiz.php?id=' + id;
        }
    })
}
</script>

</body>
</html>
