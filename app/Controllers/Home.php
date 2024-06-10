<?php

namespace App\Controllers;

use App\Models\UsuarioModel;
use App\Models\ProductoModel;

class Home extends BaseController
{
    public function index()
    {
        $usuarioModel = new UsuarioModel();
        $productoModel = new ProductoModel();

        $data['usuarios'] = $usuarioModel->findAll();
        $data['productos'] = $productoModel->findAll();

        return view('home/index', $data);
    }
}