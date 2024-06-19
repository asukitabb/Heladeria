<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductoModel extends Model
{
    protected $table = 'productos';
    protected $primaryKey = 'id';

    protected $returnType = 'array';
    protected $allowedFields = ['nombre', 'descripcion', 'precio', 'sabor'];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    protected $validationRules = [
        'nombre'      => 'required|alpha_numeric_space|min_length[3]',
        'descripcion' => 'required',
        'precio'      => 'required|decimal',
        'sabor'       => 'required|alpha_space'
    ];

    protected $validationMessages = [];
    protected $skipValidation = false;
}