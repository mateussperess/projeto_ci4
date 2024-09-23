<?php

namespace App\Controllers;

use App\Models\UserModel;

class UserController extends BaseController
{
    public function index()
    {
        $usermodel = new UserModel();
        $usuarios = $usermodel->findAll(); // ou o método apropriado para obter os usuários

        return view(
            'user_list',
            [
                'usuarios' => $usuarios
            ]
        ); 
    }
}
