<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey = 'id';

    protected $returnType = 'array';
    protected $allowedFields = ['username', 'nombre', 'contrasena', 'rol'];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    protected $validationRules = [
        'username'   => 'required|alpha_numeric_space|min_length[3]',
        'nombre'     => 'required|alpha_space',
        'contrasena' => 'required',
        'rol'        => 'required|in_list[admin,cajero]'
    ];

    protected $validationMessages = [];
    protected $skipValidation = false;
}