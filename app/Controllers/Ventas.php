<?php

namespace App\Controllers;

use App\Models\VentaModel;
use App\Models\ProductoModel;
use App\Models\UsuarioModel;

class Ventas extends BaseController
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
        $model = new VentaModel();
        $data['ventas'] = $model->select('ventas.*, productos.nombre as producto_nombre, usuarios.username as usuario_nombre')
                                ->join('productos', 'productos.id = ventas.producto_id')
                                ->join('usuarios', 'usuarios.id = ventas.usuario_id')
                                ->findAll();
        return view('ventas/index', $data);
    }

    public function create()
    {
        $productoModel = new ProductoModel();
        $data['productos'] = $productoModel->findAll();

        return view('ventas/create', $data);
    }

    public function store()
    {
        $model = new VentaModel();
        $data = [
            'cliente'    => $this->request->getPost('cliente'),
            'producto_id'=> $this->request->getPost('producto_id'),
            'cantidad'   => $this->request->getPost('cantidad'),
            'total'      => $this->request->getPost('total'),
            'usuario_id' => session()->get('id'),
        ];

        if (!$model->insert($data)) {
            return redirect()->back()->withInput()->with('errors', $model->errors());
        }

        return redirect()->to('/ventas');
    }

    public function edit($id)
    {
        $model = new VentaModel();
        $data['venta'] = $model->find($id);

        if (empty($data['venta'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Venta no encontrada');
        }

        $productoModel = new ProductoModel();
        $data['productos'] = $productoModel->findAll();

        return view('ventas/edit', $data);
    }

    public function update($id)
    {
        $model = new VentaModel();
        $data = [
            'cliente'    => $this->request->getPost('cliente'),
            'producto_id'=> $this->request->getPost('producto_id'),
            'cantidad'   => $this->request->getPost('cantidad'),
            'total'      => $this->request->getPost('total'),
            'usuario_id' => session()->get('id'),
        ];

        if (!$model->update($id, $data)) {
            return redirect()->back()->withInput()->with('errors', $model->errors());
        }

        return redirect()->to('/ventas');
    }

    public function delete($id)
    {
        $model = new VentaModel();
        $model->delete($id);
        return redirect()->to('/ventas');
    }
}