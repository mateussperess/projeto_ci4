<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;
use App\Models\ProfilePhotoModel;

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

    // Verificar se o arquivo foi enviado corretamente
    if (!$profile_photo || !$profile_photo->isValid()) {
      return redirect()->back()->withInput()->with('error', 'Erro ao enviar foto de perfil.');
    }

    // Capturar o tipo MIME antes de mover o arquivo
    $mimeType = $profile_photo->getMimeType();

    // Salvar a foto em um diretório específico
    $newName = $profile_photo->getRandomName();
    $uploadPath = WRITEPATH . 'uploads/profile_photos';

    // Mover o arquivo para o local definitivo
    try {
      $profile_photo->move($uploadPath, $newName);
    } catch (\Exception $e) {
      return redirect()->back()->withInput()->with('error', 'Erro ao mover a foto de perfil: ' . $e->getMessage());
    }

    // Dados para a tabela 'users'
    $userData = [
      'username'    => $username,
      'first_name'  => $first_name,
      'last_name'   => $last_name,
      'email'       => $email,
      'password'    => password_hash($password, PASSWORD_DEFAULT), // Hash da senha
      'created_at'  => date('Y-m-d H:i:s'),
      'updated_at'  => date('Y-m-d H:i:s'),
      'is_deleted'  => 0,
      'message'     => null,
    ];

    $userModel = new UserModel();

    if ($userModel->checkUserNameExistence($username)) {
      return redirect()->to(base_url('public/register?code=409'));
    }

    if ($userModel->checkEmailExistence($email)) {
      return redirect()->to(base_url('public/register?code=422'));
    }

    // insere usuário na tabela 'users'
    $userId = $userModel->insert($userData);

    if ($userId) {
      // insere na tabela 'profile_photos'
      $photoData = [
        'user_id'   => $userId,
        'file_name' => $newName,
        'file_path' => $uploadPath . '/' . $newName,
        'mime_type' => $mimeType, // Usar o tipo MIME capturado anteriormente
        'created_at' => date('Y-m-d H:i:s'),
      ];

      // ProfilePhotoModel para inserir
      $photoModel = new ProfilePhotoModel();
      $photoModel->addPhoto($photoData);

      return redirect()->to(base_url('public/login?code=200'));
    } else {
      return redirect()->back()->withInput()->with('error', 'Erro ao registrar usuário.');
    }
  }
}
