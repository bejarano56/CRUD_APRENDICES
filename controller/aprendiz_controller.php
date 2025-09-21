<?php
require_once __DIR__ . '/../model/aprendiz_model.php';

class AprendizController
{
    private $model;

    public function __construct()
    {
        $this->model = new AprendizModel();
    }

    public function index()
    {
        return $this->model->obtenerTodos();
    }

    public function show($id)
    {
        return $this->model->obtenerPorId($id);
    }

    public function store($data)
    {
        return $this->model->crear($data);
    }

    public function update($id, $data)
    {
        return $this->model->actualizar($id, $data);
    }

    public function delete($id)
    {
        return $this->model->eliminar($id);
    }
}
