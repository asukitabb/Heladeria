<?php

namespace App\Controllers;

use App\Models\UsuarioModel;
use CodeIgniter\Controller;

class Auth extends Controller
{
    public function login()
    {
        return view('auth/login');
    }

    public function attemptLogin()
    {
        $model = new UsuarioModel();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('contrasena');

        $user = $model->where('username', $username)->first();

        if ($user && $password === $user['contrasena']) { // Asegúrate de que la contraseña esté sin cifrar
            $session = session();
            $session->set([
                'id' => $user['id'],
                'username' => $user['username'],
                'rol' => $user['rol'],
                'isLoggedIn' => true
            ]);

            return redirect()->to('/');
        }

        return redirect()->back()->withInput()->with('error', 'Credenciales de inicio de sesión inválidas');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}