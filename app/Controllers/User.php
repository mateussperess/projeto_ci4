<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;
use App\Models\ProfilePhotoModel;

class User extends Controller
{

  public function profile() {
    $session = session();

    if($session->has('user_id')) {
      $data = [
        'user_id' => $session->get('user_id'),
        'username' => $session->get('username'),
      ];
      return view('profile', $data);
    } else {
      return redirect()->to(base_url('public/login?code=401'));
    }
  }
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

    // Dados para a tabela 'users'
    $userData = [
      'username'    => strtolower($username),
      'first_name'  => ucfirst($first_name),
      'last_name'   => ucfirst($last_name),
      'email'       => $email,
      'password'    => password_hash($password, PASSWORD_DEFAULT), // Hash da senha
      'created_at'  => date('Y-m-d H:i:s'),
      'updated_at'  => date('Y-m-d H:i:s'),
      'is_deleted'  => 0,
      'message'     => null,
    ];

    $userModel = new UserModel();

    // Verificar se o nome de usuário já existe
    if ($userModel->checkUserNameExistence($username)) {
      return redirect()->to(base_url('public/register?code=409'));
    }

    // Verificar se o e-mail já existe
    if ($userModel->checkEmailExistence($email)) {
      return redirect()->to(base_url('public/register?code=422'));
    }

    // Insere usuário na tabela 'users'
    $userId = $userModel->insert($userData);

    if ($userId) {
      // Verificar se o arquivo de foto foi enviado
      $profile_photo = $this->request->getFile('profile_photo');
      if ($profile_photo && $profile_photo->isValid()) {
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

        // Dados para a tabela 'profile_photos'
        $photoData = [
          'user_id'   => $userId,
          'file_name' => $newName,
          'file_path' => $uploadPath . '/' . $newName,
          'mime_type' => $mimeType,
          'created_at' => date('Y-m-d H:i:s'),
        ];

        // ProfilePhotoModel para inserir
        $photoModel = new ProfilePhotoModel();
        $photoModel->addPhoto($photoData);
      }

    } else {
      return redirect()->back()->withInput()->with('error', 'Erro ao registrar usuário.');
    }
    return redirect()->to(base_url('public/login?code=200'));
  }

  public function login() {
    $email = $this->request->getPost('email');
    $password = $this->request->getPost('password');

    // $UserDataLogin = [
    //   'email' => $email,
    //   'password' => $password
    // ];

    $UserModel = new UserModel();
    
    $user = $UserModel->where('email', $email)->first();
    
    if ($user && password_verify($password, $user['password'])) {
      // Iniciar a sessão
      $session = session();
      $session->set('user_id', $user['id']);
      $session->set('username', $user['username']);
      $session->set('email', $user['email']);
      $session->set('logged_in', TRUE);

      return redirect()->to(base_url('public/profile'));
    } else {
      return redirect()->to(base_url('public/login?code=401'));
    }
  }

  public function logout() {
    $session = session();
    $session->destroy();
    return redirect()->to(base_url('public/login'));
  }
}
