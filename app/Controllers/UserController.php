<?php

namespace App\Controllers;

use App\Models\UserModel;

class UserController extends BaseController
{
  public function __construct()
  {
    helper('url');
  }

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

    if($userModel->checkEmailExists($data['mail'])) {
      $stats = [
        'status_code' => 409,
        'status' => 'bad-request',
        'message' => 'Email already registered'
      ];

      return view('register', [
        'stats' => $stats
      ]);
    } else {
      if ($userModel->createUser($data)) {
        $stats = [
          'status_code' => 200,
          'status' => 'success'
        ];
      } else {
        $stats = [
          'status_code' => 500,
          'status' => 'error',
          'message' => 'Falha ao criar o usuário'
        ];
  
        redirect(site_url('register'));
      }
    }
    return view('login', ['status' => $stats]);
  }

  public function loginUser() {}
}
