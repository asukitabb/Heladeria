<?php

namespace App\Controllers;

use App\Models\ProductoModel;

class Productos extends BaseController
{
    public function __construct()
    {
        // Verificar autenticación en cada método
        $session = session();
        if (!$session->get('isLoggedIn')) {
            return redirect()->to('/login')->send();
        }

        if ($session->get('rol') != 'admin') {
            return redirect()->to('/')->send();
        }
    }

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
            'sabor'       => $this->request->getPost('sabor'),
        ];

        if ($model->insert($data) === false) {
            return redirect()->back()->withInput()->with('errors', $model->errors());
        }

        return redirect()->to('/productos');
    }

    public function edit($id)
    {
        $model = new ProductoModel();
        $data['producto'] = $model->find($id);

        if (empty($data['producto'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Producto no encontrado');
        }

        return view('productos/edit', $data);
    }

    public function update($id)
    {
        $model = new ProductoModel();
        $data = [
            'nombre'      => $this->request->getPost('nombre'),
            'descripcion' => $this->request->getPost('descripcion'),
            'precio'      => $this->request->getPost('precio'),
            'sabor'       => $this->request->getPost('sabor'),
        ];

        if ($model->update($id, $data) === false) {
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