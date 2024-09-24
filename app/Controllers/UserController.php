<?php

namespace App\Controllers;

use App\Models\UserModel;

class UserController extends BaseController
{
  public function list_users()
  {
    $usermodel = new UserModel();
    $data = $usermodel->findAll();

    return view(
      'user_list',
      [
        'usuarios' => $data
      ]
    );
  }

  public function form_create()
  {
    echo view('register');
  }
  
  public function form_login() 
  {
    echo view('login');
  }

  public function create()
  {
    $userModel = new \App\Models\UserModel();

    $data = [
      'first_name' => $this->request->getPost('first_name'),
      'last_name' => $this->request->getPost('last_name'),
      'mail' => $this->request->getPost('mail'),
      'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT), // Exemplo de hash de senha
    ];

    if ($userModel->createUser($data)) {
      $stats = json_encode([
        'status_code' => 200,
        'status' => 'success'
      ]);

      return view('login', ['stats' => $stats]);
    } else {
      $stats = json_encode([
        'status_code' => 500,
        'status' => 'error',
        'message' => 'Falha ao criar o usuário'
      ]);

      return view('register', ['status' => $stats]);
    }
  }

  public function loginUser() {}
}
