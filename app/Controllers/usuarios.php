<?php

namespace App\Controllers;

use App\Models\UsuarioModel;

class Usuarios extends BaseController
{
    public function __construct()
    {
        $session = session();
        if (!$session->get('isLoggedIn')) {
            return redirect()->to('/login')->send();
        }
    }

    public function index()
    {
        $model = new UsuarioModel();
        $data['usuarios'] = $model->findAll();
        return view('usuarios/index', $data);
    }

    public function create()
    {
        return view('usuarios/create');
    }

    public function store()
    {
        $model = new UsuarioModel();
        $data = [
            'username'  => $this->request->getPost('username'),
            'nombre'    => $this->request->getPost('nombre'),
            'contrasena'=> $this->request->getPost('contrasena'),
            'rol'       => $this->request->getPost('rol'),
        ];

        if (!$model->insert($data)) {
            return redirect()->back()->withInput()->with('errors', $model->errors());
        }

        return redirect()->to('/usuarios');
    }

    public function edit($id)
    {
        $model = new UsuarioModel();
        $data['usuario'] = $model->find($id);

        if (empty($data['usuario'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Usuario no encontrado');
        }

        return view('usuarios/edit', $data);
    }

    public function update($id)
    {
        $model = new UsuarioModel();
        $data = [
            'username'  => $this->request->getPost('username'),
            'nombre'    => $this->request->getPost('nombre'),
            'contrasena'=> $this->request->getPost('contrasena'),
            'rol'       => $this->request->getPost('rol'),
        ];

        if (!$model->update($id, $data)) {
            return redirect()->back()->withInput()->with('errors', $model->errors());
        }

        return redirect()->to('/usuarios');
    }

    public function delete($id)
    {
        $model = new UsuarioModel();
        $model->delete($id);
        return redirect()->to('/usuarios');
    }
}