<?php

namespace App\Controllers;

use App\Models\ProductoModel;
use App\Models\VentaModel;

class Reportes extends BaseController
{
    public function __construct()
    {
        $session = session();
        if (!$session->get('isLoggedIn')) {
            return redirect()->to('/login')->send();
        }
    }

    public function productosPorSabor()
    {
        $model = new ProductoModel();
        $data['productos'] = $model->select('sabor, COUNT(*) as total')
                                   ->groupBy('sabor')
                                   ->findAll();
        
        return view('reportes/productosSabor', $data);
    }
    public function ventasPorProducto()
    {
        $model = new VentaModel();
        $data['ventas'] = $model->select('productos.nombre, SUM(ventas.cantidad) as total_vendido, SUM(ventas.total) as ingresos')
                                ->join('productos', 'productos.id = ventas.producto_id')
                                ->groupBy('productos.nombre')
                                ->findAll();

        return view('reportes/VentasProducto', $data);
    }
}