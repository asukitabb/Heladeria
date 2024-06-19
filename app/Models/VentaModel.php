<?php

namespace App\Models;

use CodeIgniter\Model;

class VentaModel extends Model
{
    protected $table = 'ventas';
    protected $primaryKey = 'id';

    protected $returnType = 'array';
    protected $allowedFields = ['cliente', 'producto_id', 'cantidad', 'total', 'usuario_id'];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    protected $validationRules = [
        'cliente'    => 'required|alpha_space|min_length[3]',
        'producto_id'=> 'required|integer',
        'cantidad'   => 'required|integer',
        'total'      => 'required|decimal',
        'usuario_id' => 'required|integer'
    ];

    protected $validationMessages = [];
    protected $skipValidation = false;
}