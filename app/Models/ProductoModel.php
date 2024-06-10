<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductoModel extends Model
{
    protected $table      = 'productos';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['nombre', 'descripcion', 'precio'];

    // Enable timestamps, so created_at and updated_at fields are automatically managed
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation rules
    protected $validationRules = [
        'nombre'      => 'required|string|min_length[3]',
        'descripcion' => 'required|string|min_length[10]',
        'precio'      => 'required|decimal',
    ];

    // Validation messages
    protected $validationMessages = [
        'nombre' => [
            'required'   => 'El nombre del producto es obligatorio.',
            'string'     => 'El nombre del producto debe ser una cadena de texto.',
            'min_length' => 'El nombre del producto debe tener al menos 3 caracteres.',
        ],
        'descripcion' => [
            'required'   => 'La descripción del producto es obligatoria.',
            'string'     => 'La descripción del producto debe ser una cadena de texto.',
            'min_length' => 'La descripción del producto debe tener al menos 10 caracteres.',
        ],
        'precio' => [
            'required' => 'El precio del producto es obligatorio.',
            'decimal'  => 'El precio del producto debe ser un número decimal.',
        ],
    ];

    protected $skipValidation = false;
}