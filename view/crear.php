<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SENA || Crear Aprendiz</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
  <h1>Registrar Aprendiz</h1>
  <form action="../controller/aprendiz_controller.php?action=store" method="post">
    
    <div class="row">
      <div class="col-md-6 mb-3">
        <label for="primer_nombre" class="form-label">Primer Nombre</label>
        <input type="text" class="form-control" id="primer_nombre" name="primer_nombre" required>
      </div>
      <div class="col-md-6 mb-3">
        <label for="segundo_nombre" class="form-label">Segundo Nombre</label>
        <input type="text" class="form-control" id="segundo_nombre" name="segundo_nombre">
      </div>
    </div>

    <div class="row">
      <div class="col-md-6 mb-3">
        <label for="primer_apellido" class="form-label">Primer Apellido</label>
        <input type="text" class="form-control" id="primer_apellido" name="primer_apellido" required>
      </div>
      <div class="col-md-6 mb-3">
        <label for="segundo_apellido" class="form-label">Segundo Apellido</label>
        <input type="text" class="form-control" id="segundo_apellido" name="segundo_apellido">
      </div>
    </div>

    <div class="mb-3">
      <label for="sexo" class="form-label">Sexo</label>
      <select class="form-select" id="sexo" name="sexo" required>
        <option value="">Seleccione...</option>
        <option value="masculino">Masculino</option>
        <option value="femenino">Femenino</option>
      </select>
    </div>

    <div class="mb-3">
      <label for="id_tipo_documento" class="form-label">Tipo Documento</label>
      <select class="form-select" id="id_tipo_documento" name="id_tipo_documento" required>
        <option value="">Seleccione...</option>
        <!-- Aquí cargas dinámicamente desde la tabla tipo_documento -->
      </select>
    </div>

    <div class="mb-3">
      <label for="id_grupo_sanguineo" class="form-label">Grupo Sanguíneo</label>
      <select class="form-select" id="id_grupo_sanguineo" name="id_grupo_sanguineo" required>
        <option value="">Seleccione...</option>
        <!-- Cargar dinámico -->
      </select>
    </div>

    <div class="mb-3">
      <label for="id_programa" class="form-label">Programa de Formación</label>
      <select class="form-select" id="id_programa" name="id_programa" required>
        <option value="">Seleccione...</option>
        <!-- Cargar dinámico -->
      </select>
    </div>

    <div class="mb-3">
      <label for="ficha" class="form-label">Número de Ficha</label>
      <input type="text" class="form-control" id="ficha" name="ficha" required>
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>
  </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
