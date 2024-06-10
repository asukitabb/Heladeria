<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey = 'id';

    protected $returnType = 'array';
    protected $allowedFields = ['username', 'nombre', 'contrasena', 'rol'];

    // Deshabilitar timestamps si no deseas usarlos
    protected $useTimestamps = false;

    protected $validationRules = [
        'username'  => 'required|alpha_numeric_space|min_length[3]|is_unique[usuarios.username]',
        'contrasena'=> 'required|min_length[8]',
        'nombre'    => 'required|alpha_space',
        'rol'       => 'required|in_list[admin,cajero]'
    ];

    protected $validationMessages = [];
    protected $skipValidation = false;
}