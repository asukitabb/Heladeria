<?php

namespace App\Controllers;

use App\Models\UsuarioModel;
use App\Models\ProductoModel;
use App\Models\VentaModel;

class Home extends BaseController
{
    public function index()
    {
        $usuarioModel = new UsuarioModel();
        $productoModel = new ProductoModel();
        $ventaModel = new VentaModel();

        $data['usuarios'] = $usuarioModel->findAll();
        $data['productos'] = $productoModel->findAll();
        $data['ventas'] = $ventaModel->findAll();

        return view('home/index', $data);
    }
}