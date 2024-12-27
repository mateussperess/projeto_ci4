<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;


class User extends Controller
{

  public function register_page()
  {
    return view('register');
  }

  public function login_page()
  {
    return view('login');
  }
  public function create()
  {
    $username = $this->request->getPost('username');
    $first_name = $this->request->getPost('first_name');
    $last_name = $this->request->getPost('last_name');
    $email = $this->request->getPost('email');
    $password = $this->request->getPost('password');
    $profile_photo = $this->request->getFile('profile_photo');

    $data = [
      'username'    => $username,
      'first_name'  => $first_name,
      'last_name'   => $last_name,
      'email'       => $email,
      'password'    => $password, // Lembre-se de hash a senha depois, se necessário
      'profile_photo' => $profile_photo->getName(), // Nome do arquivo da foto
      'created_at'  => date('Y-m-d H:i:s'),
      'updated_at'  => date('Y-m-d H:i:s'),
      'is_deleted'  => 0,
      'message'     => null,
    ];

    // Exibir os dados capturados com var_dump
    // var_dump($data);
    // exit();
    
    $UserModel = new UserModel();

    if($UserModel->checkUserNameExistence($username)) {
      return redirect()->to(base_url('public/register' . '?code=409'));
    }
    
    if($UserModel->checkEmailExistence($email)) {
      return redirect()->to(base_url('public/register' . '?code=422'));
    }

    if ($UserModel->insertUser($data)) {
      // success
      $UserModel->insert($data);
      return redirect()->to(base_url('public/login' . '?code=200'));
    } else {
      // error
      return redirect()->back()->withInput()->with('error', 'Erro ao registrar usuário.');
    }
  }
}
