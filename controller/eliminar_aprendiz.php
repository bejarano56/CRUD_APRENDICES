<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/aprendiz_controller.php'; 
$controlador = new AprendizController();

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = (int)$_GET['id'];
    $ok = $controlador->delete($id);

    if ($ok) {
        echo "<script>
            alert('Aprendiz eliminado correctamente');
            window.location.href='../index.php';
        </script>";
    } else {
        echo "<script>
            alert('Error al eliminar');
            window.location.href='../index.php';
        </script>";
    }
} else {
    header("Location: ../index.php");
    exit;
}
