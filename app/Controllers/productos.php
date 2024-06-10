<?php

namespace App\Controllers;

use App\Models\ProductoModel;

class Productos extends BaseController
{
    public function index()
    {
        $model = new ProductoModel();
        $data['productos'] = $model->findAll();
        return view('productos/index', $data);
    }

    public function create()
    {
        return view('productos/create');
    }

    public function store()
    {
        $model = new ProductoModel();
        $data = [
            'nombre'      => $this->request->getPost('nombre'),
            'descripcion' => $this->request->getPost('descripcion'),
            'precio'      => $this->request->getPost('precio'),
        ];

        if (!$model->insert($data)) {
            return redirect()->back()->withInput()->with('errors', $model->errors());
        }

        return redirect()->to('/productos');
    }

    public function edit($id)
    {
        $model = new ProductoModel();
        $data['producto'] = $model->find($id);
        return view('productos/edit', $data);
    }

    public function update($id)
    {
        $model = new ProductoModel();
        $data = [
            'nombre'      => $this->request->getPost('nombre'),
            'descripcion' => $this->request->getPost('descripcion'),
            'precio'      => $this->request->getPost('precio'),
        ];

        if (!$model->update($id, $data)) {
            return redirect()->back()->withInput()->with('errors', $model->errors());
        }

        return redirect()->to('/productos');
    }

    public function delete($id)
    {
        $model = new ProductoModel();
        $model->delete($id);
        return redirect()->to('/productos');
    }
}